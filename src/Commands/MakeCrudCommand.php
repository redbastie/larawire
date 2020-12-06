<?php

namespace Redbastie\Larawire\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Redbastie\Larawire\Traits\CreatesFiles;

class MakeCrudCommand extends Command
{
    use CreatesFiles;

    protected $signature = 'make:crud {model}';

    public function handle()
    {
        $this->filesystem = new Filesystem;
        $this->stubDir = __DIR__ . '/../../resources/stubs/crud';
        $this->argument = $this->argument('model');
        $this->setReplaces();
        $this->createFiles();

        $layoutFile = 'resources/views/layouts/app.blade.php';
        $layoutContents = $this->filesystem->get($layoutFile);
        $navItemStub = rtrim($this->replace($this->filesystem->get(__DIR__ . '/../../resources/stubs/nav-item.blade.php.stub')));
        $navItemHook = '{{--crud command hook--}}';

        if (!Str::contains($layoutContents, $navItemStub)) {
            $newContents = str_replace($navItemHook, $navItemHook . PHP_EOL . $navItemStub, $layoutContents);
            $this->filesystem->put($layoutFile, $newContents);
            $this->warn('Nav item inserted: <info>' . $layoutFile . '</info>');
        }

        $this->info($this->argument . ' CRUD scaffolded!');
        $this->warn('Remember to update the new model migrations, definitions, and CRUD rules.');
        $this->warn('Then run the <info>migrate:auto</info> command afterwards.');
    }
}
