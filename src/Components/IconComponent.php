<?php

namespace Webflorist\IconFactory\Components;

use Webflorist\HtmlFactory\Elements\IElement;
use Webflorist\HtmlFactory\Exceptions\InvalidPayloadException;
use Webflorist\IconFactory\Payload\IconPayload;

class IconComponent extends IElement
{

    /**
     * IconComponent constructor.
     *
     * @param string $iconName
     * @throws InvalidPayloadException
     */
    public function __construct(string $iconName)
    {
        parent::__construct();

        // Set default payload for icons.
        $this->payload(
            (new IconPayload)->name($iconName)
        );
    }

    /**
     * Set Icon-Style.
     *
     * @param string $style
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    protected function setIconStyle(string $style): IconComponent
    {
        $this->payload($style, 'style');
        return $this;
    }

    /**
     * Set Icon-Style to 'solid'.
     *
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function solid(): IconComponent
    {
        $this->setIconStyle('solid');
        return $this;
    }

    /**
     * Set Icon-Style to 'regular'.
     *
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function regular(): IconComponent
    {
        $this->setIconStyle('regular');
        return $this;
    }

    /**
     * Set Icon-Style to 'light'.
     *
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function light(): IconComponent
    {
        $this->setIconStyle('light');
        return $this;
    }

    /**
     * Set the icon-family.
     *
     * @param string $family
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function family(string $family): IconComponent
    {
        $this->payload($family, 'family');
        return $this;
    }

    /**
     * Set the icon-family to 'fa'
     * to use font-awesome-fonts.
     *
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function fromFontAwesome(): IconComponent
    {
        $this->family('fa');
        return $this;
    }

    /**
     * Set the icon-family to 'material-icons'
     * to use Google's material design icon-fonts.
     *
     * @return IconComponent
     * @throws InvalidPayloadException
     */
    public function fromMaterialIcons(): IconComponent
    {
        $this->family('material-icons');
        return $this;
    }

}