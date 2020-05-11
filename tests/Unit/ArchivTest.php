<?php

namespace Bios2000\Tests\Unit;

use Bios2000\Models\Archiv;
use Bios2000\Tests\TestCase;
use DB;

class ArchivTest extends TestCase
{
    /** @test */
    function a_deliverynote_can_be_found_in_archive()
    {
        $deliverynote = DB::connection('bios2000')
            ->table(config('database.connections.bios2000.dba') . '.dbo.' . 'AW_ARCHIV_2018_KOPF')
            ->where('ART', 'LS')
            ->first();

        $archivedDeliverynote = Archiv::deliverynote($deliverynote->BELEG);

        $this->assertEquals($deliverynote->KUNU, $archivedDeliverynote->KUNU);
    }

    /** @test */
    function a_deliverynote_posten_can_be_found_in_archive()
    {
        $deliverynotePosten = DB::connection('bios2000')
            ->table(config('database.connections.bios2000.dba') . '.dbo.' . 'AW_ARCHIV_2018_POSTEN')
            ->where('ART', 'LS')
            ->first();

        $archivedDeliverynotePosten = Archiv::deliverynotePosten($deliverynotePosten->BELEG);

        $this->assertEquals($deliverynotePosten->ARTNR, $archivedDeliverynotePosten[0]->ARTNR);
    }
}
