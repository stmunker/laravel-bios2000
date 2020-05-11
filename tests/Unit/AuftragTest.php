<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Models\Artikel;
use Bios2000\Models\ArtikelLager;
use Bios2000\Models\ArtikelZusatztext;
use Bios2000\Models\Auftrag;
use Bios2000\Models\AuftragPosten;
use Bios2000\Models\ChaotLager;
use Bios2000\Models\Kapazitaet;
use Bios2000\Models\Land;
use Bios2000\Models\Schluessel;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class AuftragTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'ART', 'KUNU', 'NUMMER', 'VORGANGS_NUMMER', 'RS_COUNTER', 'POSTEN_COUNTER', 'AU_DATUM', 'AG_DATUM',
            'AB_DATUM', 'LS_DATUM', 'AG_NUMMER', 'AB_NUMMER', 'LS_NUMMER', 'DISPO_FLAG', 'AB_FLAG', 'LS_FLAG',
            'AF_FLAG', 'TS_FLAG', 'NEXT_AB', 'NEXT_LS', 'NEXT_FA', 'ZUSATZ_KUERZEL_AB', 'ZUSATZ_KUERZEL_RE',
            'VORLAGE_DATUM', 'UPS_JOB', 'BRUTTO_NETTO', 'SR_KZ', 'EM_BERECHNUNG', 'PC', 'KS', 'PROJEKT', 'US_1',
            'US_2', 'US_3', 'E_KONTO1', 'E_KONTO2', 'E_KONTO3', 'WS', 'KURS', 'RE_EMPF', 'PORTO', 'VERTRETER_1',
            'VERTRETER_2', 'VPROV_1', 'VPROV_2', 'ZB', 'VB', 'PS', 'SB', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7',
            'C8', 'C9', 'C10', 'AUFTRAG', 'BEM_1', 'BEM_2', 'LADR_ANSCHRIFT_1', 'LADR_ANSCHRIFT_2', 'LADR_ANSCHRIFT_3',
            'LADR_ANSCHRIFT_4', 'LADR_ANSCHRIFT_5', 'LADR_STRASSE', 'LADR_ADRESSE', 'LADR_LAND', 'MASTER_ARTNR',
            'MASTER_SERIAL', 'SUMME_NETTO', 'SUMME_DB', 'END_SUMME', 'ANLAGE_DATUM', 'AENDERUNG_DATUM', 'ANLAGE_USER',
            'AENDERUNG_USER', 'SAMMLER_ID', 'LADR_LAND_NR', 'LADR_UST_ID_NR', 'SPEZ_EU_SW', 'USER_SPEZ1',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Auftrag::class);
    }

    /** @test */
    function a_posten_has_needed_columns()
    {
        $expectedDatabaseColumns = [
             'ART', 'KUNU', 'NUMMER', 'LFD_NR', 'POSITIONS_NR', 'VORGANGS_NUMMER', 'DISPO_INTERN', 'DISPO_KUNDE',
            'ARTNR', 'BEZ_1', 'BEZ_2', 'BEZ_1_ALIGN', 'BESTELLT', 'GELIEFERT', 'PREIS', 'RABATT_1', 'RABATT_2', 'EK',
            'EK_FLAG', 'GEWICHT', 'V_EINHEIT', 'EM_PREIS', 'LS_FLAG', 'ZEILEN_ART', 'JUMBO_FLAG', 'DRUCK_FLAG',
            'USER_MARKE', 'BRUTTO_NETTO', 'LS_NUMMER', 'LS_DATUM', 'LAGER', 'WG', 'WS', 'PE', 'US', 'VARIANTE', 'SW1',
            'SW2', 'SW3', 'BEMERKUNG', 'ZEILEN_SUMME', 'ZEILEN_DB', 'ORG_MENGE', 'ZN_REV', 'VIRTUELLER_AUFTRAG',
            'DISPO_ORG_WUNSCHTERMIN',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, AuftragPosten::class);
    }

    /** @test */
    function it_has_items()
    {
        $item = AuftragPosten::first();

        $order = Auftrag::where('ART', $item->ART)
            ->where('KUNU', $item->KUNU)
            ->where('NUMMER', $item->NUMMER)
            ->first();

        $this->assertInstanceOf(AuftragPosten::class, $order->posten()->first());
    }
}
