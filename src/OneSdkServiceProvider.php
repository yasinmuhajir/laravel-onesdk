<?php

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
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublisher();
        $this->registerFactoryUri();
        $this->registerFactoryArticle();
        $this->registerFactoryGallery();
        $this->registerFactoryPhoto();
    }

    /**
     * Register Publisher class instance in the container.
     *
     * @return void
     */
    public function registerPublisher()
    {
        $this->app->bind('One\Provider\Publisher', function ($app) {
            return new Publisher(
                $app['config']['app.client_id'],
                $app['config']['app.client_secret'],
                $app['config']['app.options']
            );
        });
    }

    /**
     * Register FactoryUri class instance in the container.
     *
     * @return void
     */
    public function registerFactoryUri()
    {
        $this->app->bind('One\Provider\FactoryUri', function () {
            return new FactoryUri();
        });
    }

    /**
     * Register FactoryArticle class instance in the container.
     *
     * @return void
     */
    public function registerFactoryArticle()
    {
        $this->app->bind('One\Provider\FactoryArticle', function () {
            return new FactoryArticle();
        });
    }

    /**
     * Register FactoryGallery class instance in the container.
     *
     * @return void
     */
    public function registerFactoryGallery()
    {
        $this->app->bind('One\Provider\FactoryGallery', function () {
            return new FactoryGallery();
        });
    }

    /**
     * Register FactoryPhoto class instance in the container.
     *
     * @return void
     */
    public function registerFactoryPhoto()
    {
        $this->app->bind('One\Provider\FactoryPhoto', function () {
            return new FactoryPhoto();
        });
    }
}
