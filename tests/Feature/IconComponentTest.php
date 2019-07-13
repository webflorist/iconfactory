<?php

namespace IconFactoryTests\Feature\Elements;

use Icon;
use IconFactoryTests\TestCase;
use Webflorist\IconFactory\IconFactory;

class IconComponentTest extends TestCase
{

    public function test_camera()
    {
        $compare = [
            '<i class="fal fa-camera"></i>' => Icon::camera()->light(),
            '<i class="fas fa-camera"></i>' => icon_factory('camera')->solid(),
            '<i class="far fa-camera"></i>' => icon_factory()->camera()->regular(),
            '<i class="fas fa-map-marker"></i>' => app(IconFactory::class)->mapMarker(),
        ];

        foreach ($compare as $expectedHtml => $icon) {
            $this->assertHtmlEquals(
                $expectedHtml,
                $icon
            );
        }
    }

    public function test_camera_in_regular_via_style_mapping_in_config()
    {
        $this->config->set('iconfactory.style_mappings', [
            'phone' => 'regular'
        ]);

        $this->assertHtmlEquals(
            '<i class="fas fa-camera"></i>',
            Icon::camera()
        );

        $this->assertHtmlEquals(
            '<i class="far fa-phone"></i>',
            Icon::phone()
        );
    }

    public function test_camera_in_material_design()
    {
        $this->assertHtmlEquals(
            '<i class="material-icons">camera</i>',
            Icon::camera()->fromMaterialIcons()
        );
    }

    public function test_camera_in_material_design_via_family_mapping_in_config()
    {
        $this->config->set('iconfactory.family_mappings', [
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