<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Models\Artikel;
use Bios2000\Models\ChaotLager;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class ChaotLagerTest extends TestCase
{
    /** @test */
    function a_chaotlager_model_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'GANG', 'EBENE', 'FACH', 'ARTNR', 'DATUM', 'BESTAND', 'CHARGE'
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, ChaotLager::class);
    }

    /** @test */
    function a_chaotlager_datum_is_carbon_instance()
    {
        $chaotlager = ChaotLager::first();

        $this->assertInstanceOf(Carbon::class, $chaotlager->DATUM);
    }
}
