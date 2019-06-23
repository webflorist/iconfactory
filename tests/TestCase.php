<?php

namespace IconFactoryTests;

use HtmlFactoryTests\Traits\AssertsHtml;
use Webflorist\HtmlFactory\HtmlFactoryFacade;
use Webflorist\HtmlFactory\HtmlFactoryServiceProvider;
use Webflorist\IconFactory\IconFactoryFacade;
use Webflorist\IconFactory\IconFactoryServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package IconFactoryTests
 */
class TestCase extends BaseTestCase
{

    use AssertsHtml;

    /**
     * Array of group-IDs of decorators, that should be loaded.
     *
     * @var string[]
     */
    protected $decorators = [
        'fontAwesome:v5'
    ];

    protected function getPackageProviders($app)
    {
        return [

            HtmlFactoryServiceProvider::class,
            IconFactoryServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Html' => HtmlFactoryFacade::class,
            'Icon' => IconFactoryFacade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('htmlfactory.decorators', $this->decorators);

    }

    protected function setDecorators(array $decorators)
    {
        $this->decorators = $decorators;
        $this->refreshApplication();
    }


}