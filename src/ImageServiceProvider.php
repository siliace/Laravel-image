<?php
namespace Siliace\LaravelImage;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../config/images.php' => config_path('images.php')
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/images.php', 'images');

        $this->app->bind('Image', function($app) {
            return new ImageUrlGenerator($app);
        });
    }

    public function boot()
    {
        $this->app['router']->get(config('images.route.url') . '/{path}/{config?}', config('images.route.action'))
            ->name(config('images.route.name'))
            ->where('path', '([a-z\/]+)([a-z0-9\-]+.(png|jpg|jpeg))')
            ->where('config', '.*');
    }
}