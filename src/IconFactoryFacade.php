<?php

namespace Webflorist\IconFactory;

use Illuminate\Support\Facades\Facade;

class IconFactoryFacade extends Facade {

    /**
     * Static access-proxy for the IconFactory
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return IconFactory::class; }

}