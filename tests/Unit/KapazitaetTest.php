<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Models\Artikel;
use Bios2000\Models\ArtikelLager;
use Bios2000\Models\ArtikelZusatztext;
use Bios2000\Models\ChaotLager;
use Bios2000\Models\Kapazitaet;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class KapazitaetTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'ARTNR' ,'KB' ,'TEXT_1' ,'TEXT_2' ,'TEXT_3' ,'TEXT_4' ,'TEXT_5' ,'TEXT_6' ,'TEXT_7' ,'KAP_GRUPPE'
            ,'MASCH_SATZ' ,'LOHN_RZ_SATZ' ,'LOHN_LZ_SATZ' ,'KAP_ART' ,'KALENDER' ,'ANZAHL_MASCH'
            ,'UEBERGANGS_ZEIT_MIN' ,'UEBERGANGS_ZEIT_PROZ' ,'C1' ,'C2' ,'C3', 'C4' ,'C5' ,'C6' ,'C7' ,'C8' ,'C9' ,'C10'
            ,'STARTZEIT' ,'RESOURCEN' ,'D2_FEINPLANEN' ,'DYN_MELDEN_JN' ,'TERMNR_AV' ,'PM_JN' ,'RESERVE_JN'
            ,'NACHARBEIT' ,'REKLAMATION' ,'HM1_NUMMER' ,'HM1_TEXT' ,'HM2_NUMMER' ,'HM2_TEXT' ,'HM3_NUMMER' ,'HM3_TEXT'
            ,'HM4_NUMMER' ,'HM4_TEXT' ,'HM5_NUMMER' ,'HM5_TEXT' ,'DISPO2000_USEAS_PM' ,'EINMALKOSTEN' ,'MEILENSTEIN'
            ,'DISPO2000_MB' ,'DISPO2000_VM' ,'NO' ,'STATUS' ,'FUELLMENGE' ,'START_ZEIT_SEK' ,'D2_ALTERNATE_KAP1'
            ,'D2_ALTERNATE_KAP2' ,'D2_ALTERNATE_KAP3' ,'MMB' ,'ZUSTAENDIG_SB' ,'ZUSTAENDIG_GRUPPE' ,'RESSOURCE'
            ,'FF_PLAN_RZ_SEK' ,'FF_PLAN_LZ_SEK' ,'ANLAGE_DATUM' ,'AENDERUNG_DATUM'
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Kapazitaet::class);
    }

    /** @test */
    function anlage_datum_and_aenderung_datum_are_carbon_objects()
    {
        $capacity = Kapazitaet::first();

        $this->assertInstanceOf(Carbon::class, $capacity->ANLAGE_DATUM);
        $this->assertInstanceOf(Carbon::class, $capacity->AENDERUNG_DATUM);
    }
}
