<?php

namespace Webflorist\IconFactory;

use Illuminate\Support\ServiceProvider;
use Webflorist\HtmlFactory\Exceptions\DecoratorNotFoundException as DecoratorNotFoundExceptionAlias;
use Webflorist\HtmlFactory\HtmlFactory;

class IconFactoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     * @throws DecoratorNotFoundExceptionAlias
     */
    public function boot()
    {
        // Register included decorators.
        $this->registerHtmlFactoryDecorators();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IconFactory::class, function () {
            return new IconFactory();
        });

    }

    /**
     * Register included decorators with HtmlFactory.
     *
     * @throws DecoratorNotFoundExceptionAlias
     */
    private function registerHtmlFactoryDecorators()
    {
        /** @var HtmlFactory $htmlFactory */
        $htmlFactory = app(HtmlFactory::class);
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\IconFactory\Decorators\FontAwesome\v5',
            __DIR__ . '/Decorators/FontAwesome/v5'
        );
    }

}