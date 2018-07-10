<?php

namespace MrAtiebatie\GenerateLanguageFile;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\GenerateLanguageFile;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateLanguageFile::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
