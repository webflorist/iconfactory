<?php

namespace Webflorist\IconFactory;

use Webflorist\IconFactory\Components\IconComponent;

/**
 * The main class of this package.
 * Provides (magic) factory methods for all icons.
 *
 * Phones:
 * =======
 * @method static IconComponent phone
 * @method static IconComponent phoneAlt
 * @method static IconComponent phoneSquareAlt
 * @method static IconComponent phoneSquare
 *
 * Cameras:
 * ========
 * @method static IconComponent camera
 * @method static IconComponent cameraRetro
 * @method static IconComponent cameraAlt
 * @method static IconComponent video
 *
 * Mail:
 * =====
 * @method static IconComponent envelope
 * @method static IconComponent envelopeSquare
 *
 * Map-Pin:
 * ========
 * @method static IconComponent mapMarker
 * @method static IconComponent mapMarkerAlt
 *
 */
class IconFactory
{

    /**
     * Returns the IconFactory singleton from Laravel's Service Container.
     *
     * @return IconFactory
     */
    public static function singleton(): IconFactory
    {
        return app(IconFactory::class);
    }

    /**
     * Magic method to construct an Icon.
     * See '@method' declarations of class-phpdoc
     * for available methods.
     *
     * @param $accessor
     * @param $arguments
     * @return IconComponent
     */
    public function __call($accessor, $arguments)
    {
        return new IconComponent($accessor);

    }

}