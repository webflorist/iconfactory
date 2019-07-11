<?php

use Webflorist\IconFactory\IconFactory;

if (! function_exists('icon_factory')) {
    /**
     * Gets the IconFactory singleton from Laravel's service-container
     *
     * @return IconFactory
     */
    function icon_factory()
    {
        return app(IconFactory::class);
    }
}