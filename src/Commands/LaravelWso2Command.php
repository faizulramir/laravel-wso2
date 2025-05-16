<?php

namespace FzlxTech\LaravelWso2\Commands;

use Illuminate\Console\Command;

class LaravelWso2Command extends Command
{
    public $signature = 'laravel-wso2';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
