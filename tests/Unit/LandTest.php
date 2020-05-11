<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Models\Artikel;
use Bios2000\Models\ArtikelLager;
use Bios2000\Models\ArtikelZusatztext;
use Bios2000\Models\ChaotLager;
use Bios2000\Models\Kapazitaet;
use Bios2000\Models\Land;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class LandTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'LAND_NR' ,'NAME', 'LAND_KUERZEL' ,'ISO3166' ,'INTRASTAT_NR' ,'EU_KZ' ,'TELEFON',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Land::class);
    }
}
