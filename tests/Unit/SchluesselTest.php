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
use Bios2000\Models\Schluessel;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class SchluesselTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'ART', 'NUMMER', 'TEXT', 'WAEHRUNG_NAME', 'WAEHRUNG_KURS', 'WAEHRUNG_VKONTO', 'NETTOTAGE', 'SKONTOTAGE',
            'SKONTOSATZ', 'EU_KZ',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Schluessel::class);
    }
}
