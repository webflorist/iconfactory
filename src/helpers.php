<?php

use Webflorist\IconFactory\Components\IconComponent;
use Webflorist\IconFactory\IconFactory;
use Webflorist\IconFactory\Payload\IconPayload;

if (! function_exists('icon_factory')) {
    /**
     * Gets the IconFactory singleton
     * from Laravel's service-container,
     * or creates an icon-instance,
     * if parameter is a string
     * or an IconPayload.
     *
     * @param null|string|IconPayload $icon
     * @return IconFactory|IconComponent
     */
    function icon_factory($icon=null)
    {
        /** @var IconFactory $iconFactory */
        $iconFactory = app(IconFactory::class);

        if (is_null($icon)) {
            return $iconFactory;
        }

        if (is_string($icon)) {
            return $iconFactory->$icon();
        }

        if (is_a($icon, IconPayload::class)) {
            return $iconFactory->{$icon->name}()->payload($icon);
        }
    }
}