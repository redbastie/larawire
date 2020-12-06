<?php

namespace Redbastie\Larawire\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Redbastie\Larawire\Traits\CreatesFiles;

class MakeAuthCommand extends Command
{
    use CreatesFiles;

    protected $signature = 'make:auth';

    public function handle()
    {
        $this->filesystem = new Filesystem;
        $this->stubDir = __DIR__ . '/../../resources/stubs/auth';
        $this->createFiles();

        $deleteFiles = [
            'database/migrations/2014_10_12_000000_create_users_table.php',
            'resources/views/welcome.blade.php',
        ];

        foreach ($deleteFiles as $deleteFile) {
            if ($this->filesystem->exists($deleteFile)) {
                $this->filesystem->delete($deleteFile);
                $this->warn('Deleted file: <info>' . $deleteFile . '</info>');
            }
        }

        Artisan::call('ide-helper:generate', [], $this->getOutput());
        Artisan::call('migrate:auto --fresh --seed', [], $this->getOutput());
        exec('npm install && npm run dev');

        $this->warn('Created user: <info>user@example.com:password</info>');
        $this->info('Auth UI scaffolded! <href=' . config('app.url') . '>' . config('app.url') . '</>');
    }
}
