<?php

namespace App\Presenter\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class HelperServiceProvider.
 */
class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {

        $helpersPath = app_path('Infrastructure'.DIRECTORY_SEPARATOR.'Helpers'.DIRECTORY_SEPARATOR.'Global');
        $rdi = new RecursiveDirectoryIterator($helpersPath);
        $it = new RecursiveIteratorIterator($rdi);

        while ($it->valid()) {
            if (
                !$it->isDot() &&
                $it->isFile() &&
                $it->isReadable() &&
                $it->current()->getExtension() === 'php' &&
                strpos($it->current()->getFilename(), 'Helper')
            ) {
                require $it->key();
            }

            $it->next();
        }
    }
}
