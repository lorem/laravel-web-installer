<?php

namespace Lorem\WebInstaller;

use Lorem\WebInstaller\Middleware\IsInstallable;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class WebInstallerServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $packageName = 'installer';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     */
    public function boot(Router $router)
    {
        $router->middlewareGroup('IsInstallable', [IsInstallable::class]);

        $this->loadViewsFrom(__DIR__ . '/views', $this->packageName);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();

        $this->loadRoutesFrom(__DIR__ . '/routes/installer.php');
    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/config/installer.php' => base_path('config/installer.php'),
        ], $this->packageName);

        $this->publishes([
            __DIR__ . '/assets' => public_path('vendor/' . $this->packageName),
        ], $this->packageName);
    }
}
