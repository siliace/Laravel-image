<?php

namespace Siliace\LaravelImage;

use InvalidArgumentException;
use Illuminate\Contracts\Foundation\Application;

class ImageUrlGenerator
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function url($path, $modifiers = 'default')
    {
        if (is_string($modifiers)) {
            $modifiers = config('images.shortcuts.' . $modifiers) ?: [];
        }

        if (is_array($modifiers)) {
            $config = '';

            foreach ($modifiers as $modifier => $value) {
                $config .= $modifier . '-' . $value . '/';
            }

            $config = trim($config, '/');

            return route(config('images.route.name'), ['path' => $path, 'config' => $config]);
        }

        throw new InvalidArgumentException('Modifiers are either a string (see config.shortcut) or an array');
    }
}