<?php

namespace Webflorist\IconFactory\Decorators\FontAwesome\v5;

use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException as PayloadNotFoundExceptionAlias;
use Webflorist\IconFactory\Components\IconComponent;

class DecorateIconComponent extends Decorator
{

    /**
     * The element to be decorated.
     *
     * @var IconComponent
     */
    protected $element;

    /**
     * Returns the group-ID of this decorator.
     *
     * Returning null means this decorator will always be applied.
     *
     * @return string|null
     */
    public static function getGroupId()
    {
        return 'fontAwesome:v5';
    }

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public static function getSupportedElements(): array
    {
        return [IconComponent::class];
    }

    /**
     * Perform decorations on $this->element.
     * @throws PayloadNotFoundExceptionAlias
     */
    public function decorate()
    {
        $styleToClass = [
            'solid' => 'fas',
            'regular' => 'far',
            'light' => 'fal'
        ];

        $this->element->addClasses([
            $styleToClass[$this->element->getPayload('icon.style')],
            'fa-' . Str::kebab($this->element->getPayload('icon.name'))
        ]);


    }
}