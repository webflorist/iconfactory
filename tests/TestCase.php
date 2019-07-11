<?php

namespace IconFactoryTests;

use HtmlFactoryTests\Traits\AssertsHtml;
use Illuminate\Contracts\Config\Repository;
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
     * @var Repository
     */
    protected $config;

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
        $this->config = $app['config'];
    }


}