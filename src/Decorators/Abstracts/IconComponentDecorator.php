<?php

namespace Webflorist\IconFactory\Decorators\Abstracts;

use Illuminate\Support\Str;
use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException as PayloadNotFoundExceptionAlias;
use Webflorist\IconFactory\Components\IconComponent;

abstract class IconComponentDecorator extends Decorator
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
    public static final function getGroupId()
    {
        return null;
    }

    /**
     * Returns an array of class-names of elements, that should be decorated by this decorator.
     *
     * @return string[]
     */
    public static final function getSupportedElements(): array
    {
        return [IconComponent::class];
    }

    /**
     * Return name of icon-family.
     *
     * Decorator will only be applied,
     * if the icon's family is set to this string.
     *
     * @return string
     */
    abstract public static function getIconFamily(): string;

    /**
     * Perform icon-family-specific decorations on $this->element.
     *
     * @throws PayloadNotFoundExceptionAlias
     */
    abstract public function decorateIcon(): void;

    /**
     * Perform decorations on $this->element.
     *
     * @throws PayloadNotFoundExceptionAlias
     */
    public final function decorate()
    {
        if ($this->element->getPayload('icon.family') === $this::getIconFamily()) {
            $this->decorateIcon();
        }

    }
}