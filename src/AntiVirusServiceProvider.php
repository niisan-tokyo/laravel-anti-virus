<?php

use Illuminate\Support\ServiceProvider;
use Niisan\LaravelAntiVirus\AntiVirusImpl\ClamdLocal;
use Niisan\LaravelAntiVirus\AntiVirusImpl\Pass;

class AntiVirusServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(AntiVirus::class, function () {
            $driver = config('anti_virus.driver');
            if ($driver === 'pass') {
                return new Pass;
            }

            if ($driver === 'local') {
                return new ClamdLocal;
            }
        });
    }
}