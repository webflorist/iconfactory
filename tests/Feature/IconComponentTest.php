<?php

namespace IconFactoryTests\Feature\Elements;

use IconFactoryTests\TestCase;
use Icon;

class IconComponentTest extends TestCase
{
    public function testCamera()
    {
        $compare = [
            '<i class="fas fa-camera"></i>' => Icon::camera()->solid(),
            '<i class="far fa-camera"></i>' => Icon::camera()->regular(),
            '<i class="fal fa-camera"></i>' => Icon::camera()->light(),
            '<i class="fas fa-map-marker"></i>' => Icon::mapMarker(),
        ];

        foreach ($compare as $expectedHtml => $icon) {
            $this->assertHtmlEquals(
                $expectedHtml,
                $icon
            );
        }
    }
    public function testCameraInMaterialDesign()
    {
        $this->assertHtmlEquals(
            '<i class="material-icons">camera</i>',
            Icon::camera()->materialIcons()
        );
    }

}