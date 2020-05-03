<?php

namespace Bios2000\Tests\Unit;

use Tests\TestCase;

class AdressenTest extends TestCase
{

    /** @test */
    function a_address_model_includes_bios_address_data()
    {
        $address = new Adresse;

        dd($address);
    }
}
