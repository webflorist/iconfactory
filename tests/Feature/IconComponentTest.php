<?php

namespace IconFactoryTests\Feature\Elements;

use IconFactoryTests\TestCase;
use Icon;

class IconComponentTest extends TestCase
{
    public function testPhone()
    {
        $this->setDecorators(['fontAwesome:v5']);

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

}