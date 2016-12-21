<?php
namespace Siliace\LaravelImage;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Image', function($app) {
            return new ImageUrlGenerator($app);
        });
    }

    public function boot()
    {
        $this->app['router']->get('api/images/{path}/{config?}', 'Siliace\\LaravelImage\ImageController@show')
            ->name('image.show')
            ->where('path', '([a-z\/]+)([a-z0-9\-]+.(png|jpg|jpeg))')
            ->where('config', '.*');
    }
}