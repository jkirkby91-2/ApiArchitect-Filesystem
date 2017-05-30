<?php

namespace ApiArchitect\FileSystem\Providers;

/**
 * Class FileSystemServiceProvider
 *
 * Service provider for ApiArchitect\FileSystem 
 *
 * @package ApiArchitect\Log
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class FileSystemServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadFilesystem();
        $this->app->configure('filesystems');        
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function loadFilesystem()
    {
        //bind the file illuminate system
        $this->app->singleton('filesystem', function ($app) {
            return $app->loadComponent('filesystems',\Illuminate\Filesystem\FilesystemServiceProvider::class,'filesystem');
        });

        //create an alias
        $this->app->alias('filesystem', 'Illuminate\Filesystem\FilesystemManager');
    }
}