<?php

namespace Redbastie\Larawire\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Redbastie\Larawire\Commands\MakeAuthCommand;
use Redbastie\Larawire\Commands\MakeCrudCommand;
use Redbastie\Larawire\Commands\MigrateAutoCommand;

class LarawireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAuthCommand::class,
                MakeCrudCommand::class,
                MigrateAutoCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->resolveRelationships();
    }

    public function resolveRelationships()
    {
        foreach ((new Filesystem)->allFiles(app_path('Models')) as $file) {
            $class = app('App\\Models\\' . str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname()));

            if (method_exists($class, 'relationships')) {
                foreach ($class->relationships() as $key => $relationship) {
                    $class->resolveRelationUsing($key, function () use ($class, $key) {
                        return $class->relationships()[$key];
                    });
                }
            }
        }
    }
}
