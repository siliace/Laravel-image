# Laravel-image
An easy to use image loader for Laravel

#Usage:

    Image::url('/path/to/image/in/storage');
    Image::url('/path/to/image/in/storage', 'shortcut');
    Image::url('/path/to/image/in/storage', ['w' => '250', 'or' => '90']);

#Configuration

source: The disk where images are stored (public by default)
cache: The disk where cache is stored (public by default)
cache_path_prefix: The name of the glide cache directory

#Shortcuts

Laravel-image provide a way to create shortcuts in the config file:

    'shortcuts' => [
        'small' => [
            'w'  => '150',
            'or' => '90'
        ]
    ]
    
Now, images loaded as follow will have a width of 150 px and a rotation of 90°

    Image::url('/path/to/image/in/storage', 'small');
    
In the config file you can find a default shortcut to define default transformations:

    'shortcuts' => [
        'default' => [
            'w' => '300'
            'h' => '300'
        ]
        'small' => [
            'w'  => '150',
            'or' => '90'
        ]
    ]
