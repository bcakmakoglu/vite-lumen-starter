<?php

namespace App\Providers\Vite;

use Illuminate\Support\ServiceProvider;

class ViteServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Vite::class, function ($app) {
            return new Vite();
        });
    }
}
