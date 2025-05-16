<?php

namespace FzlxTech\LaravelWso2;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FzlxTech\LaravelWso2\Commands\LaravelWso2Command;
use Illuminate\Routing\Router;
use FzlxTech\LaravelWso2\Middleware\ValidateWso2Token;

class LaravelWso2ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-wso2')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_wso2_table')
            ->hasCommand(LaravelWso2Command::class);
    }

    public function packageBooted(): void
    {
        /** @var Router $router */
        $router = $this->app->make(Router::class);

        $router->aliasMiddleware('wso2.auth', ValidateWso2Token::class);
    }
}
