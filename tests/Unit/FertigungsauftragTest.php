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
use Bios2000\Models\Fertigungsauftrag;
use Bios2000\Models\Kapazitaet;
use Bios2000\Models\Land;
use Bios2000\Models\Schluessel;
use Bios2000\Tests\TestCase;
use Carbon\Carbon;

class FertigungsauftragTest extends TestCase
{
    /** @test */
    function it_has_needed_columns()
    {
        $expectedDatabaseColumns = [
             'KUNU', 'NUMMER', 'AUFTRAG_POSITION', 'BARCODE', 'PLAN_MENGE', 'IST_MENGE', 'PLAN_WERT', 'IST_WERT',
            'ZUSATZ_DISPO', 'ANF_TERMIN', 'END_TERMIN', 'WUNSCH_TERMIN', 'ARTNR', 'STATUS', 'REVISION',
            'VORGANGS_NUMMER', 'SB', 'LAGER', 'P_KZ', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10',
            'BEMERKUNG', 'EILIG', 'UEBERLAPPUNG_PROZ', 'V_R_FLAG', 'SL_JN', 'VARIANTE', 'SW1', 'SW2', 'SW3', 'ZN',
            'ORG_MENGE', 'ORG_TERMIN', 'D2_MASTER_ARTNR', 'D2_VORGAENGER_ARTNR', 'D2_SL_LEVEL', 'D2_FRUEHESTER_TERMIN',
            'D2_PRIORITAET', 'BDE_VERTEILTE_MELDUNGEN', 'AUSSCHUSS_WERT_MAT', 'AUSSCHUSS_WERT_RZ', 'AUSSCHUSS_WERT_LZ',
            'NACHARBEIT_WERT', 'REKLAMATION_WERT', 'FARBE_DISPO2000', 'VK', 'ANLAGE_DATUM', 'AENDERUNG_DATUM',
            'ANLAGE_USER', 'AENDERUNG_USER', 'ZN_REV', 'SPLIT_KZ', 'SPLIT_SLEK_MITGK', 'D2_MAN_OPT_ZIEL',
            'SL_EINZELMODE', 'WERKZEUGKOSTEN', 'FE_AUFTRAG_PRINTED', 'IS_SL_LEVEL',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Fertigungsauftrag::class);
    }

//    /** @test */
//    function a_posten_has_needed_columns()
//    {
//        $expectedDatabaseColumns = [
//             'ART', 'KUNU', 'NUMMER', 'LFD_NR', 'POSITIONS_NR', 'VORGANGS_NUMMER', 'DISPO_INTERN', 'DISPO_KUNDE',
//            'ARTNR', 'BEZ_1', 'BEZ_2', 'BEZ_1_ALIGN', 'BESTELLT', 'GELIEFERT', 'PREIS', 'RABATT_1', 'RABATT_2', 'EK',
//            'EK_FLAG', 'GEWICHT', 'V_EINHEIT', 'EM_PREIS', 'LS_FLAG', 'ZEILEN_ART', 'JUMBO_FLAG', 'DRUCK_FLAG',
//            'USER_MARKE', 'BRUTTO_NETTO', 'LS_NUMMER', 'LS_DATUM', 'LAGER', 'WG', 'WS', 'PE', 'US', 'VARIANTE', 'SW1',
//            'SW2', 'SW3', 'BEMERKUNG', 'ZEILEN_SUMME', 'ZEILEN_DB', 'ORG_MENGE', 'ZN_REV', 'VIRTUELLER_AUFTRAG',
//            'DISPO_ORG_WUNSCHTERMIN',
//        ];
//
//        $this->assertModelHasColumns($expectedDatabaseColumns, AuftragPosten::class);
//    }
//
//    /** @test */
//    function it_has_items()
//    {
//        $item = AuftragPosten::first();
//
//        $order = Auftrag::where('ART', $item->ART)
//            ->where('KUNU', $item->KUNU)
//            ->where('NUMMER', $item->NUMMER)
//            ->first();
//
//        $this->assertInstanceOf(AuftragPosten::class, $order->posten()->first());
//    }
}
