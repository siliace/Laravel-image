<?php

namespace Siliace\LaravelImage;

use Illuminate\Contracts\Foundation\Application;

class ImageUrlGenerator
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function url($path, array $modifiers = [])
    {
        $config = '';

        foreach ($modifiers as $modifier => $value) {
            $config .= $modifier . '-' . $value . '/';
        }

        $config = trim($config, '/');

        return route('image.show', ['path' => $path, 'config' => $config]);
    }
}