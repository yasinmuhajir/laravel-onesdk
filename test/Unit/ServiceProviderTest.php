<?php
namespace One\Provider\Test\Unit;

class ServiceProviderTest extends \Orchestra\Testbench\TestCase
{

    /**
     * check whether Publisher class is resolvable in the container
     *
     * @test
     * @return void
     */
    public function testPublisherResolvableInContainer()
    {
        $publisher = $this->app->make('One\Provider\Publisher');
        $this->assertInstanceOf('One\Publisher', $publisher);
    }

    /**
     * check methods defined in Publisher class
     *
     * @test
     * @return void
     */
    public function testMethodPublisherClass()
    {
        $publisher = $this->app->make('One\Provider\Publisher');
        $this->assertTrue(method_exists($publisher, 'recycleToken'));
        $this->assertTrue(method_exists($publisher, 'assessOptions'));
        $this->assertTrue(method_exists($publisher, 'requestGate'));
        $this->assertTrue(method_exists($publisher, 'sendRequest'));
        $this->assertTrue(method_exists($publisher, 'renewAuthToken'));
        $this->assertTrue(method_exists($publisher, 'setAuthorizationHeader'));
        $this->assertTrue(method_exists($publisher, 'getAttachmentEndPoint'));
        $this->assertTrue(method_exists($publisher, 'getArticleWithIdEndPoint'));
        $this->assertTrue(method_exists($publisher, 'replaceEndPointId'));
        $this->assertTrue(method_exists($publisher, 'normalizePayload'));
        $this->assertTrue(method_exists($publisher, 'submitArticle'));
    }

    /**
     * check whether FactoryUri class is resolvable in the container
     *
     * @test
     * @return void
     */

    public function testFactoryUriResolvableInContainer()
    {
        $uriFactory = $this->app->make('One\Provider\FactoryUri');
        $this->assertInstanceOf('One\FactoryUri', $uriFactory);
    }

    /**
     * check methods defined in FactoryUri class
     *
     * @test
     * @return void
     */
    public function testMethodFactoryUriClass()
    {
        $factoryUri = $this->app->make('One\Provider\FactoryUri');
        $this->assertTrue(method_exists($factoryUri, 'create'));
        $this->assertTrue(method_exists($factoryUri, 'createFromString'));
        $this->assertTrue(method_exists($factoryUri, 'createFromServer'));
        $this->assertTrue(method_exists($factoryUri, 'createUri'));
        $this->assertTrue(method_exists($factoryUri, 'validateString'));
    }

    /**
     * check whether FactoryArticle class is resolvable in the container
     *
     * @test
     * @return void
     */
    public function testFactoryArticleResolvableInContainer()
    {
        $articleFactory = $this->app->make('One\Provider\FactoryArticle');
        $this->assertInstanceOf('One\FactoryArticle', $articleFactory);
    }

    /**
     * check methods defined in FactoryArticle class
     *
     * @test
     * @return void
     */
    public function testMethodFactoryArticleClass()
    {
        $factoryArticle = $this->app->make('One\Provider\FactoryArticle');
        $this->assertTrue(method_exists($factoryArticle, 'create'));
        $this->assertTrue(method_exists($factoryArticle, 'checkData'));
        $this->assertTrue(method_exists($factoryArticle, 'createArticle'));
        $this->assertTrue(method_exists($factoryArticle, 'validateArray'));
        $this->assertTrue(method_exists($factoryArticle, 'validateUrl'));
        $this->assertTrue(method_exists($factoryArticle, 'validateInteger'));
        $this->assertTrue(method_exists($factoryArticle, 'validateString'));
    }

    /**
     * check whether FactoryGallery class is resolvable in the container
     *
     * @test
     * @return void
     */
    public function testFactoryGalleryResolvableInContainer()
    {
        $galleryFactory = $this->app->make('One\Provider\FactoryGallery');
        $this->assertInstanceOf('One\FactoryGallery', $galleryFactory);
    }

    /**
     * check methods defined in FactoryGallery class
     *
     * @test
     * @return void
     */
    public function testMethodFactoryGalleryClass()
    {
        $factoryGallery = $this->app->make('One\Provider\FactoryGallery');
        $this->assertTrue(method_exists($factoryGallery, 'create'));
        $this->assertTrue(method_exists($factoryGallery, 'checkData'));
        $this->assertTrue(method_exists($factoryGallery, 'createGallery'));
        $this->assertTrue(method_exists($factoryGallery, 'validateUrl'));
        $this->assertTrue(method_exists($factoryGallery, 'validateInteger'));
        $this->assertTrue(method_exists($factoryGallery, 'validateString'));
    }

    /**
     * check whether FactoryPhoto class is resolvable in the container
     *
     * @test
     * @return void
     */

    public function testFactoryPhotoResolvableInContainer()
    {
        $photoFactory = $this->app->make('One\Provider\FactoryPhoto');
        $this->assertInstanceOf('One\FactoryPhoto', $photoFactory);
    }

    /**
     * check methods defined in FactoryPhoto class
     *
     * @test
     * @return void
     */
    public function testMethodFactoryPhotoClass()
    {
        $factoryPhoto = $this->app->make('One\Provider\FactoryPhoto');
        $this->assertTrue(method_exists($factoryPhoto, 'create'));
        $this->assertTrue(method_exists($factoryPhoto, 'checkData'));
        $this->assertTrue(method_exists($factoryPhoto, 'createPhoto'));
        $this->assertTrue(method_exists($factoryPhoto, 'validateString'));
    }

    /**
     * @test
     */
    public function testConfigurationIsLoaded()
    {
        $config = $this->app['config']['one'];
        $this->assertSame($config['client_id'], 0);
        $this->assertSame($config['client_secret'], 'some-secret-string-token');
        $this->assertSame($config['access_token'], 'eyJ0eRwVzZX9a4MMGel9yrP');
    }

    /**
     * Load the service provider.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['One\Provider\OneSdkServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'One' => \One\Provider\Facade::class,
        ];
    }

  /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('one.client_id', 0);
        $app['config']->set('one.client_secret', 'some-secret-string-token');
        $app['config']->set('one.access_token', 'eyJ0eRwVzZX9a4MMGel9yrP');
    }
}
