<?php
namespace Niisan\LaravelAntiVirus;

use Illuminate\Support\ServiceProvider;
use Niisan\LaravelAntiVirus\AntiVirusImpl\ClamdLocal;
use Niisan\LaravelAntiVirus\AntiVirusImpl\Pass;

class AntiVirusServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(AntiVirus::class, function () {
            if ($this->app->environment() === 'testing') {
                return new Pass;
            }
            return new ClamdLocal;
        });
    }
}