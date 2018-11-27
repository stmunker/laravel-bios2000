<?php

namespace Bios2000;

use Illuminate\Support\ServiceProvider;

class Bios2000ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/bios2000.php' => config_path('bios2000.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/bios2000.php', 'bios2000'
        );
    }

    public function register()
    {
        $this->app->singleton('bios2000', function () {
            $Bios2000 = new Bios2000([
                'database' => env('BIOS_DB_M'),
                'driver' => env('BIOS_CONNECTION'),
                'host' => env('BIOS_HOST'),
                'port' => env('BIOS_PORT'),
                'username' => env('BIOS_USERNAME'),
                'password' => env('BIOS_PASSWORD'),
            ]);

            print_r($Bios2000);

            return $Bios2000;
        });
    }
}