<?php

namespace Bios2000\Controllers;

use Bios2000\Models\Procedures\BuchenChaotLager;
use Bios2000\Models\Procedures\BuchenLagerLmobile;
use Illuminate\Support\Facades\DB;

class Buchung
{
    static public function entryToMain(): void
    {
    }

    /**
     * @throws \Throwable
     */
    static public function transferMainToChaot(): void
    {
        $mainOut = new BuchenLagerLmobile('4124B5066B', 1, -40, 0, 0, 0, 'J', '25.09.2025 12:13:14', 99996, '');
        $chaotIn = new BuchenLagerLmobile('4124B5066B', 0, 40, 0, 0, 0, 'J', '25.09.2025 12:13:14', 99996, '');
        $chaotPlacement = new BuchenChaotLager('4124B5066B', '501', '1', '6', 40, '25.09.2025 12:13:14', '');
        $chaotRegister = null;

        DB::transaction(function ($mainOut, $chaotIn, $chaotPlacement) {
            DB::statement($mainOut->call());
            DB::statement($chaotIn->call());
            DB::statement($chaotPlacement->call());
            DB::statement(
                "INSERT INTO CHAOT_LAGER_KARTEI (ARTNR, DATUM, GANG, EBENE, FACH, MENGE, USER_NR, KUNU, NUMMER, VORGANGS_NUMMER, LS_NUMMER, DV_BARCODE, BUCHUNGS_KZ, CHARGE) VALUES ('4124B5066B', '25.09.2025 12:13:14', '501', 1, 6, 40, 68, 99996, 0, 0, '', 0, 10, '' )"
            );
        });
    }

    static public function transferMainToMain(): void
    {
    }

    static public function transferChaotToMain(): void
    {
        DB::transaction(function () {
            DB::statement("EXEC GP_BUCHEN_CHAOT_LAGER '4124B5066B', '501', '1', '6', '25.09.2025 15:11', -10, ''");
            DB::statement(
                "INSERT INTO CHAOT_LAGER_KARTEI (ARTNR, DATUM, GANG, EBENE, FACH, MENGE, USER_NR, KUNU, NUMMER, VORGANGS_NUMMER, LS_NUMMER, DV_BARCODE, BUCHUNGS_KZ, CHARGE) VALUES ('4124B5066B', '25.09.2025 15:11', '501', 1, 6, -10, 32, 99996, 0, 0, '', 0, 1, '' )"
            );
            DB::statement(
                "EXEC GP_BUCHEN_LAGER_LMOBILE '4124B5066B', 0, -10, 0, 0, 0, 'J', '25.09.2025 15:11', 99996, ''"
            );
            DB::statement(
                "EXEC GP_BUCHEN_LAGER_LMOBILE '4124B5066B', 1, 10, 0, 0, 0, 'J', '25.09.2025 15:11', 99996, ''"
            );
            DB::statement(
                "EXEC GP_BUCHEN_LAGER_LMOBILE '4124B5066B', 1, -10, 0, 0, 0, 'J', '25.09.2025 15:11', 99996, ''"
            );
        });
    }

    static public function transferChaotToChaot(): void
    {
        DB::transaction(function () {
            DB::statement("EXEC GP_BUCHEN_CHAOT_LAGER '4124B5066B', '501', '1', '5', '24.09.2025 10:11:45', -10, ''");
            DB::statement(
                "INSERT INTO CHAOT_LAGER_KARTEI (ARTNR, DATUM, GANG, EBENE, FACH, MENGE, USER_NR, KUNU, NUMMER, VORGANGS_NUMMER, LS_NUMMER, DV_BARCODE, BUCHUNGS_KZ, CHARGE) VALUES ('4124B5066B', '24.09.2025 10:53:59', '501', 1, 5, -10, 68, 99996, 0, 0, '', 0, 10, '' )"
            );
            DB::statement("EXEC GP_BUCHEN_CHAOT_LAGER '4124B5066B', '501', '1', '6', '24.09.2025 10:11:45', 10, ''");
            DB::statement(
                "INSERT INTO CHAOT_LAGER_KARTEI (ARTNR, DATUM, GANG, EBENE, FACH, MENGE, USER_NR, KUNU, NUMMER, VORGANGS_NUMMER, LS_NUMMER, DV_BARCODE, BUCHUNGS_KZ, CHARGE) VALUES ('4124B5066B', '24.09.2025 10:53:59', '501', 1, 6, 10, 68, 99996, 0, 0, '', 0, 10, '' )"
            );
        });
    }

    static public function removalFromMain(): void
    {
    }
}
