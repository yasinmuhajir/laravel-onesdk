# laravel-onesdk
One APP SDK to laravel binding service provider
## Prerequisite
- Laravel >= 5.5
## Installation

If you are using composer you could get it with `composer require kly/laravel-onesdk` and you are all set. Load up the autoloader and Call the classes or factory you need.

## Register the Service Provider & Aliases
Add the Service Provider & Aliases to your application's config/app.php file. Must be added to the providers array.

```
'providers' => [
    One\Provider\OneSdkServiceProvider::class
]

'aliases' => [
    'One' => \One\Provider\Facade::class
]
```

## Publish the Package configuration
This will publish the configuration file to your app's config directory. The location will be config/one.php. Specify your API settings there.

```
<?php
return [
    'client-id' => 0,
    'client-secret' => 'some-secret-string-token',
    'access_token' => ''
       ];

php artisan vendor:publish
```
## Usage
```
One::FactoryUri('https://username:password@www.example.com:85/kerap/254?page=1#idkomentar');
One::FactoryArticle(
                array(
                  'title' => 'Recusandae natus ',
                  'body' => 'Nulla labore earum. Perspiciatis voluptatem quidem error. ', 
                  'source' => 'http://example.com/url-detail.html',
                  'unique_id' => 'dummy-1', 
                  'type_id' => 2,
                  'category_id' => 1,
                  'reporter' => 'earum'
                     )
                   );

 
One::FactoryGallery(
            'Est illum cupiditate quidem alias.',
            1,
            'http://jordan.biz/',
            'https://www.roemer.de/',
            'Ipsam quidem ut tempora incidunt officia sunt.'
            );


```

