<?php

return [
    /*
     * The disk where images a stored
     */
    'source' => 'images',

    /**
     * The disk where images cache is stored
     */
    'cache' => 'glide',

    /**
     * Cache directory prefix
     */
    'cache_path_prefix' => '.cache',

    /**
     * The route to get images
     */
    'route' => [
        /**
         * The url of the route
         */
        'url' => 'api/images',

        /**
         * The name of the route
         */
        'name' => 'image.show',

        /**
         * The closure to call to get an image
         */
        'action' => 'Siliace\\LaravelImage\ImageController@show'
    ],

    'shortcuts' => [
        'default' => [

        ]
    ]
];