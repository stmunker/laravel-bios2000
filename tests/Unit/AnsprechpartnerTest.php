<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Adresse;
use Bios2000\Models\Ansprechpartner;
use Bios2000\Tests\TestCase;

class AnsprechpartnerTest extends TestCase
{

    /** @test */
    function a_ansprechpartner_model_has_needed_columns()
    {
        $expectedDatabaseColumns = [
            'IDCOL', 'KUNU', 'KUERZEL', 'VORNAME', 'NAME', 'ZUSATZ', 'TELEFON', 'TELEFON2', 'TELEFON_PRIVAT',
            'FAX', 'GESCHLECHT', 'ANREDE', 'EMAIL_ADRESSE', 'GEBURTSDATUM', 'BEMERKUNG', 'BEMERKUNG_2',
            'ABTEILUNG', 'FUNKTION', 'HANDY'
        ];

        $this->assertModelHasColumns($expectedDatabaseColumns, Ansprechpartner::class);
    }

    /** @test */
    function a_ansprechartner_has_a_address_relationship()
    {
        $adresse = Ansprechpartner::first()->adresse()->first();

        $this->assertInstanceOf(Adresse::class, $adresse);
    }

    /*
     * TODO:
     * - Datumsfelder als Carbon
     */
}
