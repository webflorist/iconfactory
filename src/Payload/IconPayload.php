<?php

namespace Webflorist\IconFactory\Payload;

use Webflorist\HtmlFactory\Payload\Abstracts\Payload;

class IconPayload extends Payload
{

    public function __construct(array $payloadArray = null)
    {
        parent::__construct($payloadArray);

        if (!is_null($this->name)) {
            if (is_null($this->style)) {
                $this->setDefaultIconStyle();
            }

            if (is_null($this->family)) {
                $this->setDefaultIconFamily();
            }
        }

    }

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $style;

    /**
     * @var string
     */
    public $family;

    /**
     * @var string
     */
    public $size;

    /**
     * @param string $style
     * @return IconPayload
     */
    public function style(string $style): IconPayload
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param string $family
     * @return IconPayload
     */
    public function family(string $family): IconPayload
    {
        $this->family = $family;
        return $this;
    }

    /**
     * @param string $size
     * @return IconPayload
     */
    public function size(string $size): IconPayload
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Sets the default-icon-family for this icon.
     */
    private function setDefaultIconFamily()
    {
        $defaultFamily = config('iconfactory.default_family');

        $iconFamilyMapping = "iconfactory.family_mappings.".$this->name;
        if (config()->has($iconFamilyMapping)) {
            $defaultFamily = config()->get($iconFamilyMapping);
        }

        $this->family = $defaultFamily;
    }

    /**
     * Sets the default-icon-style for this icon.
     */
    private function setDefaultIconStyle()
    {
        $defaultStyle = config('iconfactory.default_style');

        $iconStyleMapping = "iconfactory.style_mappings.".$this->name;
        if (config()->has($iconStyleMapping)) {
            $defaultStyle = config()->get($iconStyleMapping);
        }

        $this->style = $defaultStyle;
    }

    /**
     * @param string $name
     * @return IconPayload
     */
    public function name(string $name): IconPayload
    {
        parent::name($name);

        // Re-set default family and style
        if (is_null($this->style)) {
            $this->setDefaultIconStyle();
        }

        if (is_null($this->family)) {
            $this->setDefaultIconFamily();
        }

        return $this;
    }

}