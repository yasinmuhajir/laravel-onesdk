<?php declare(strict_types=1);

namespace One\Provider;

use Illuminate\Support\ServiceProvider;
use One\FactoryArticle;
use One\FactoryGallery;
use One\FactoryPhoto;
use One\FactoryUri;
use One\Publisher;

class OneSdkServiceProvider extends ServiceProvider
{
    /**
     * Register Onesdk instance in the container.
     */
    public function register(): void
    {
        $this->registerPublisher();
        $this->registerFactoryUri();
        $this->registerFactoryArticle();
        $this->registerFactoryGallery();
        $this->registerFactoryPhoto();
    }

    /**
     * Register Publisher class instance in the container.
     */
    public function registerPublisher(): void
    {
        $this->app->bind('One\Provider\Publisher', function ($app) {
            return new Publisher(
                (string) $app['config']['one.client_id'],
                (string) $app['config']['one.client_secret']
            );
        });
    }

    /**
     * Register FactoryUri class instance in the container.
     */
    public function registerFactoryUri(): void
    {
        $this->app->bind('One\Provider\FactoryUri', function () {
            return new FactoryUri();
        });
    }

    /**
     * Register FactoryArticle class instance in the container.
     */
    public function registerFactoryArticle(): void
    {
        $this->app->bind('One\Provider\FactoryArticle', function () {
            return new FactoryArticle();
        });
    }

    /**
     * Register FactoryGallery class instance in the container.
     */
    public function registerFactoryGallery(): void
    {
        $this->app->bind('One\Provider\FactoryGallery', function () {
            return new FactoryGallery();
        });
    }

    /**
     * Register FactoryPhoto class instance in the container.
     */
    public function registerFactoryPhoto(): void
    {
        $this->app->bind('One\Provider\FactoryPhoto', function () {
            return new FactoryPhoto();
        });
    }
}
