<?php

namespace IconFactoryTests\Feature\Elements;

use IconFactoryTests\TestCase;
use Icon;
use Webflorist\IconFactory\IconFactory;

class IconComponentTest extends TestCase
{

    public function test_camera()
    {
        $compare = [
            '<i class="fas fa-camera"></i>' => icon_factory()->camera()->solid(),
            '<i class="far fa-camera"></i>' => Icon::camera()->regular(),
            '<i class="fal fa-camera"></i>' => app(IconFactory::class)->camera()->light(),
            '<i class="fas fa-map-marker"></i>' => Icon::mapMarker(),
        ];

        foreach ($compare as $expectedHtml => $icon) {
            $this->assertHtmlEquals(
                $expectedHtml,
                $icon
            );
        }
    }

    public function test_camera_in_material_design()
    {
        $this->assertHtmlEquals(
            '<i class="material-icons">camera</i>',
            Icon::camera()->fromMaterialIcons()
        );
    }

    public function test_camera_in_material_design_via_mapping_in_config()
    {
        $this->config->set('iconfactory.icon_mappings', [
            'phone' => 'material-icons'
        ]);

        $this->assertHtmlEquals(
            '<i class="fas fa-camera"></i>',
            Icon::camera()
        );

        $this->assertHtmlEquals(
            '<i class="material-icons">phone</i>',
            Icon::phone()
        );
    }

}