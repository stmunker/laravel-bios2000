<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Ansprechpartner;
use Bios2000\Tests\TestCase;

class AnsprechpartnerTest extends TestCase
{

    /** @test */
    function a_address_model_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'IDCOL', 'KUNU', 'KUERZEL', 'VORNAME', 'NAME', 'ZUSATZ', 'TELEFON', 'TELEFON2', 'TELEFON_PRIVAT',
            'FAX', 'GESCHLECHT', 'ANREDE', 'EMAIL_ADRESSE', 'GEBURTSDATUM', 'BEMERKUNG', 'BEMERKUNG_2',
            'ABTEILUNG', 'FUNKTION', 'HANDY'
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Ansprechpartner::class);
    }

    /*
     * TODO:
     * - Relationship > ADRESSE
     */
}
