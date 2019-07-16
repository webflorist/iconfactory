<?php

namespace Webflorist\IconFactory\Decorators\FontAwesome\v5;

use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException as PayloadNotFoundExceptionAlias;
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
        return 'fa';
    }

    /**
     * Perform icon-family-specific decorations on $this->element.
     *
     * @throws PayloadNotFoundExceptionAlias
     */
    public function decorateIcon() : void
    {
        $styleToClass = [
            'solid' => 'fas',
            'regular' => 'far',
            'light' => 'fal'
        ];

        $this->element->addClasses([
            $styleToClass[$this->element->payload->style],
            'fa-' . Str::kebab($this->element->payload->name)
        ]);


    }
}