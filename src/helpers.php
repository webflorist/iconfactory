<?php

use Webflorist\IconFactory\Components\IconComponent;
use Webflorist\IconFactory\IconFactory;

if (! function_exists('icon_factory')) {
    /**
     * Gets the IconFactory singleton
     * from Laravel's service-container,
     * or creates an icon-instance,
     * if parameter is a string.
     *
     * @param string|null $iconName
     * @return IconFactory|IconComponent
     */
    function icon_factory($iconName=null)
    {
        /** @var IconFactory $iconFactory */
        $iconFactory = app(IconFactory::class);

        if (is_null($iconName)) {
            return $iconFactory;
        }

        return $iconFactory->$iconName();
    }
}