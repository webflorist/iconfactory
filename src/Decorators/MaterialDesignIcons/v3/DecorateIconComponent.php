<?php

namespace Webflorist\IconFactory\Decorators\MaterialDesignIcons\v3;

use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException as PayloadNotFoundExceptionAlias;
use Webflorist\IconFactory\Components\IconComponent;
use Webflorist\IconFactory\Decorators\Abstracts\IconComponentDecorator;

class DecorateIconComponent extends IconComponentDecorator
{

    /**
     * Return name of icon-family.
     * Decorator will only be applied,
     * if the icon's family is set to this string.
     *
     * @return string
     */
    public static function getIconFamily(): string
    {
        return 'material-icons';
    }

    /**
     * Perform icon-family-specific decorations on $this->element.
     *
     * @throws PayloadNotFoundExceptionAlias
     */
    public function decorateIcon() : void
    {
        $this->element->addClass('material-icons');
        $this->element->content($this->element->getPayload('icon.name'));
    }
}