# laravel-onesdk
One APP SDK to laravel binding service provider
## Prerequisite
- Laravel >= 5.5
## Installation

If you are using composer you could get it with `composer require kly/laravel-onesdk` and you are all set. Load up the autoloader and Call the classes or factory you need.

## Register the Service Provider
Add the Service Provider to your application's config/app.php file. Must be added to the providers array.

```
'providers' => [
    One\Provider\OneSdkServiceProvider::class
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
use Config;
use One\FactoryUri;
use One\Publisher;

$publisher = new Publisher(
			Config::get('one.client_id'),
			Config::get('one.client_secret'),
			array(
				'access_token' => Config::get('one.access_token'),
			)
		); 
$publisher->listArticle();

FactoryUri::create('https://username:password@www.example.com:85/kerap/254?page=1#idkomentar');


```

