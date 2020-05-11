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
use Bios2000\Models\FertigungsauftragPosten;
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

    /** @test */
    function a_posten_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'KUNU', 'NUMMER', 'AUFTRAG_POSITION', 'POS', 'BARCODE', 'ARTNR', 'PLAN_MENGE', 'IST_MENGE', 'PLAN_WERT',
            'IST_WERT', 'ANF_TERMIN', 'END_TERMIN', 'ANF_MINUTE', 'END_MINUTE', 'ART', 'REFA', 'DRUCK_FLAG', 'FB_KOPIE',
            'MEHR_PLATZ', 'TEXT_1', 'TEXT_2', 'TEXT_3', 'TEXT_4', 'TEXT_5', 'TEXT_6', 'TEXT_7', 'BEMERKUNG',
            'AUSSCHUSS', 'V_KZ', 'LEITSTAND', 'ART_EXT_AENDERUNG', 'HM1_NUMMER', 'HM2_NUMMER', 'HM3_NUMMER',
            'HM4_NUMMER', 'HM5_NUMMER', 'HM1_TEXT', 'HM2_TEXT', 'HM3_TEXT', 'HM4_TEXT', 'HM5_TEXT', 'C1', 'C2', 'C3',
            'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'FIX_TERMIN', 'BERECHNUNGS_ART', 'DURCHMESSER', 'LAENGE',
            'BREITE', 'HOEHE', 'PLAN_ENTNAHME', 'IST_ENTNAHME', 'EK', 'PE', 'EK_FLAG', 'ENTNAHME_AUSGEBUCHT',
            'ENTNAHME_LAGER', 'SL_SW', 'MASCH_SATZ', 'LOHN_RZ_SATZ', 'LOHN_LZ_SATZ', 'PLAN_RZ_SEK', 'PLAN_LZ_SEK',
            'PLAN_UZ_SEK', 'IST_RZ_SEK', 'IST_LZ_SEK', 'IST_SZ_SEK', 'IST_UZ_SEK', 'APID_INDEX', 'ZUSCHLAG',
            'ZUSCHLAG_BP', 'TERMNR_AV', 'VON_MC', 'D2_UEBERLAPPEN', 'D2_UEBERLAPPEN_PROZ', 'PLAN_BZ_SEK', 'MEILENSTEIN',
            'D2_RK1', 'D2_RK2', 'AUTO_PLANZEIT_SEK', 'IST_MDE_LZ_SEK', 'AUSSCHUSS_WERT_MAT', 'AUSSCHUSS_WERT_RZ',
            'AUSSCHUSS_WERT_LZ', 'NACHARBEIT', 'REKLAMATION', 'ANZAHL_BEDIENER', 'MMB', 'EINMALKOSTEN',
            'DISPO2000_PM_ANZAHL_PALETTEN', 'DISPO2000_PM_ANZAHL_TEILE', 'FF_ME', 'FF_ME_FAKTOR', 'FUELLMENGE',
            'SPLIT_ORGMENGE', 'SPLIT_PLAN_RUESTWERT', 'SPLIT_IST_RUESTWERT', 'D2_PERSONALQUOTE',
            'D2_BEVORZUGTE_SCHICHT', 'D2_ALTERNATE_KAP1', 'D2_ALTERNATE_KAP2', 'D2_ALTERNATE_KAP3', 'D2_KAP_SPLIT',
            'BIOS_ANF_TERMIN', 'BIOS_END_TERMIN', 'BIOS_ANF_MINUTE', 'BIOS_END_MINUTE', 'D2_PLANUNGS_KZ', 'D2_AG_FOLGE',
            'PRUEF_PFLICHTIG', 'HM_1_FEINPLANUNG', 'HM_2_FEINPLANUNG', 'HM_3_FEINPLANUNG', 'HM_4_FEINPLANUNG',
            'HM_5_FEINPLANUNG', 'HM_1_FP_ERLEDIGT', 'HM_2_FP_ERLEDIGT', 'HM_3_FP_ERLEDIGT', 'HM_4_FP_ERLEDIGT',
            'HM_5_FP_ERLEDIGT', 'FF_PLAN_WERT_FIX', 'FF_PLAN_WERT_VAR', 'FF_PLAN_WERT_MINDEST', 'FERTIGUNGSFOLGE',
            'ORIGINAL_START',
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, FertigungsauftragPosten::class);
    }

    /** @test */
    function it_has_items()
    {
        $item = FertigungsauftragPosten::first();

        $productionOrder = Fertigungsauftrag::where('KUNU', $item->KUNU)
            ->where('NUMMER', $item->NUMMER)
            ->where('AUFTRAG_POSITION', $item->AUFTRAG_POSITION)
            ->first();

        $this->assertInstanceOf(FertigungsauftragPosten::class, $productionOrder->posten()->first());
    }

    /** @test */
    function a_posten_has_a_head()
    {
        $item = FertigungsauftragPosten::first();

        $this->assertInstanceOf(Fertigungsauftrag::class, $item->kopf()->first());
    }

    /** @test */
    function a_article_posten_has_a_article()
    {
        $item = FertigungsauftragPosten::where('ART', 'L')->first();

        $this->assertInstanceOf(Artikel::class, $item->artikel()->first());
    }
}
