<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    $filesystem = new Filesystem;
    $dir = app_path('Http/Livewire');

    if ($filesystem->exists($dir)) {
        foreach ($filesystem->allFiles($dir) as $file) {
            $namespace = 'App\\Http\\Livewire\\' . str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname());
            $class = app($namespace);

            if (property_exists($class, 'routeUri')) {
                $route = Route::get($class->routeUri, $namespace);

                if (property_exists($class, 'routeDomain')) {
                    $route->domain($class->routeDomain);
                }

                if (property_exists($class, 'routeMiddleware')) {
                    $route->middleware($class->routeMiddleware);
                }

                if (property_exists($class, 'routeName')) {
                    $route->name($class->routeName);
                }
            }
        }
    }
});
