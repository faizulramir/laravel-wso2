<?php

namespace FzlxTech\LaravelWso2\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use FzlxTech\LaravelWso2\LaravelWso2ServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelWso2ServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('wso2.jwks_url', 'https://mock-jwks-server.test/oauth2/jwks');
    }
}
