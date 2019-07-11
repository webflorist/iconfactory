<?php

namespace Webflorist\IconFactory\Components;

use Webflorist\HtmlFactory\Elements\IElement;

class IconComponent extends IElement
{

    /**
     * IconComponent constructor.
     *
     * @param string $iconName
     */
    public function __construct(string $iconName)
    {
        parent::__construct();
        $this->payload(
            [
                'name' => $iconName,
                'style' => 'solid',
                'family' =>config('iconfactory.default_family')
            ],
            'icon');
    }

    /**
     * Set Icon-Style
     *
     * @param string $style
     * @return IconComponent
     */
    protected function setIconStyle(string $style): IconComponent
    {
        $this->payload($style, 'icon.style');
        return $this;
    }

    /**
     * Set Icon-Style to 'solid'.
     *
     * @return IconComponent
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
     */
    public function family(string $family): IconComponent
    {
        $this->payload($family, 'icon.family');
        return $this;
    }

    /**
     * Set the icon-family to 'fa'
     * to use font-awesome-fonts.
     *
     * @return IconComponent
     */
    public function fontAwesome(): IconComponent
    {
        $this->family('fa');
        return $this;
    }

    /**
     * Set the icon-family to 'material-icons'
     * to use Google's material design icon-fonts.
     *
     * @return IconComponent
     */
    public function materialIcons(): IconComponent
    {
        $this->family('material-icons');
        return $this;
    }

}