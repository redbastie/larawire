<?php

namespace Redbastie\Larawire\Providers;

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
    }
}
