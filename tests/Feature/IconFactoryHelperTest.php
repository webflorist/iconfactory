<?php

namespace IconFactoryTests\Feature\Elements;

use IconFactoryTests\TestCase;
use Icon;
use Webflorist\IconFactory\IconFactory;
use Webflorist\IconFactory\Payload\IconPayload;

class IconFactoryHelperTest extends TestCase
{

    public function test_null_parameter()
    {
        $this->assertHtmlEquals(
            '<i class="fas fa-phone"></i>',
            icon_factory()->phone()
        );
    }

    public function test_string_parameter()
    {
        $this->assertHtmlEquals(
            '<i class="fas fa-phone"></i>',
            icon_factory('phone')
        );
    }

    public function test_payload_parameter()
    {
        $this->assertHtmlEquals(
            '<i class="far fa-phone"></i>',
            icon_factory(
                (new IconPayload)
                    ->name('phone')
                    ->style('regular')
            )
        );
    }

}