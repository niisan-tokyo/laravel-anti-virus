<?php
namespace Niisan\LaravelAntiVirus;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Niisan\ClamAV\ScannerFactory;
use Niisan\LaravelAntiVirus\AntiVirusImpl\ClamdLocal;
use Niisan\LaravelAntiVirus\AntiVirusImpl\Pass;

class AntiVirusServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(AntiVirus::class, function () {
            if (Config::get('anti_virus.driver') === 'clamd') {
                return ScannerFactory::create(Config::get('anti_virus.clamd'));
            }
            
            if (Config::get('anti_virus.driver') === 'pass') {
                return new Pass;
            }
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/anti_virus.php' => config_path('anti_virus.php'),
        ]);
    }
}