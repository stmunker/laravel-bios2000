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
use Bios2000\Models\VertreterBewegung;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class VertreterBewegungTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'VT_NUMMER', 'RE_NUMMER', 'DATUM', 'KUNU', 'NETTO_WERT', 'DB_WERT', 'PROVISION_PROZ', 'PROVISION_WERT',
            'ABGERECHNET',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, VertreterBewegung::class);
    }
}
