<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Tests\TestCase;

class AdressenTest extends TestCase
{

    /** @test */
    function a_address_model_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'KUNU', 'KB', 'ANSCHRIFT_1', 'ANSCHRIFT_2', 'ANSCHRIFT_3', 'ZUSATZ', 'STRASSE', 'ADRESSE', 'LAND',
            'POSTFACH', 'POSTFACH_ADRESSE', 'BEMERKUNG', 'TELEFON', 'TELEFAX', 'BTX', 'ISDN_NUMMER', 'FUNKTELEFON',
            'EMAIL_ADRESSE', 'RE_EMPF', 'FIBU_SA_KONTO', 'UST_ID_NR', 'EXT_KUNU', 'BANK', 'KONTO_NUMMER', 'BLZ',
            'KREDIT_LIMIT', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'SPRACHE', 'VERTRETER_1',
            'VERTRETER_2', 'ZB', 'VB', 'PS', 'BS_1', 'BS_2', 'MAHNSPERRE', 'LASTSCHRIFT_KZ', 'SR_KZ', 'WS',
            'ANLAGE_DATUM', 'AENDERUNG_DATUM', 'ANLAGE_USER_NR', 'AENDERUNG_USER_NR', 'KOND_KUNU', 'RESERVE_INTEGER',
            'RESERVE_CURRENCY', 'RESERVE_STRING', 'STATUS', 'BIC', 'IBAN', 'BEMERKUNG_2', 'ILN_NUMMER', 'STD_BANK',
            'WEEE', 'ADR_PLZ', 'ADR_ORT', 'IS_SAMMLER'
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Adresse::class);
    }

    /** @test */
    function a_address_has_contactperson_relationship()
    {
        $contactperson = Ansprechpartner::first();

        $contactperson = Adresse::find($contactperson->KUNU)->ansprechpartner()->first();

        $this->assertInstanceOf(Ansprechpartner::class, $contactperson);
    }

    /*
     * TODO:
     * - Relationship > ANSPRECHPARTNER
     * - Attribut VERTRETER_1_NAME
     * - Attribut ZB_NAME
     * - Attribut VB_NAME
     * - Attribut ANLAGE_USER_NAME
     * - Attribut AENDERUNG_USER_NAME
     * - Attribut STATUS
     * - Attribut isLiefersperre (englisch!) (KREDIT_LIMIT == 1.11)
     */
}
