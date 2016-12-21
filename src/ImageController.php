<?php

namespace Siliace\LaravelImage;

use Storage;
use Illuminate\Http\Request;
use League\Glide\ServerFactory;
use Illuminate\Routing\Controller;
use League\Glide\Responses\LaravelResponseFactory;

class ImageController extends Controller
{
    private $server;

    public function __construct(Request $request)
    {
        $this->server = ServerFactory::create([
            'response'          => new LaravelResponseFactory($request),
            'source'            => Storage::disk('images')->getDriver(),
            'cache'             => Storage::disk('glide')->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url'          => 'api/image',
        ]);
    }

    public function show($path, $config = '')
    {
        $modifiers = [];

        foreach (explode('/', $config) as $modifier) {
            $modifier = explode('-', $modifier);

            if(count($modifier) == 2) {
                $modifiers[$modifier[0]] = $modifier[1];
            }
        }

        return $this->server->getImageResponse($path, $modifiers);
    }
}