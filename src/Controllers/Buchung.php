<?php

namespace Bios2000\Controllers;

use Bios2000\Dtos\ChaotLagerKarteiDto;
use Bios2000\Models\Procedures\BuchenChaotLager;
use Bios2000\Models\Procedures\BuchenLagerLmobile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class Buchung
{
    public static function entryToMain(): bool
    {
        return true;
    }

    public static function transferMainToChaot(): bool
    {
        $lagerAusgang = new BuchenLagerLmobile('4124B5066B', 1, -40, 0, 0, 0, 'J', '25.09.2025 12:13:14', 99996, '');
        $lagerEingang = new BuchenLagerLmobile('4124B5066B', 0, 40, 0, 0, 0, 'J', '25.09.2025 12:13:14', 99996, '');
        $chaotLager = new BuchenChaotLager('4124B5066B', '501', '1', '6', 40, '25.09.2025 12:13:14', '');
        $chaotLagerKartei = new ChaotLagerKarteiDto([
            'ARTNR' => '4124B5066B',
            'DATUM' => '25.09.2025 12:13:14',
            'GANG' => '501',
            'EBENE' => '1',
            'FACH' => '6',
            'MENGE' => 40,
            'USER_NR' => 68,
            'KUNU' => '99996',
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => '',
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => 10,
            'CHARGE' => '',
        ]);

        try {
            DB::connection('bios2000')->beginTransaction();

            DB::connection('bios2000')->statement($lagerAusgang->getSqlStatement());
            DB::connection('bios2000')->statement($lagerEingang->getSqlStatement());
            DB::connection('bios2000')->statement($chaotLager->getSqlStatement());
            $chaotLagerKartei->createModel();

            DB::connection('bios2000')->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection('bios2000')->rollBack();

            return false;
        }

        return true;
    }

    public static function transferMainToMain(): bool
    {
        return true;
    }

    public static function transferChaotToMain(
        string $artnr,
        string $gang,
        string $ebene,
        string $fach,
        float $menge,
        string $datum,
        string $kunu,
        int $user,
        string $LSNummer = '',
        int $buchungsKz = 10,
        string $charge = '',
        string $lagerort = ''
    ): bool {
        $negativeMenge = $menge * -1;

        $chaotLager = new BuchenChaotLager($artnr, $gang, $ebene, $fach, $negativeMenge, $datum, $charge);
        $chaotLagerKartei = new ChaotLagerKarteiDto([
            'ARTNR' => $artnr,
            'DATUM' => $datum,
            'GANG' => $gang,
            'EBENE' => $ebene,
            'FACH' => $fach,
            'MENGE' => $negativeMenge,
            'USER_NR' => $user,
            'KUNU' => $kunu,
            'LS_NUMMER' => $LSNummer,
            'BUCHUNGS_KZ' => $buchungsKz,
            'CHARGE' => $charge,
        ]);
        $lagerAusgang = new BuchenLagerLmobile($artnr, 0, $negativeMenge, 0, 0, 0, 'J', $datum, $kunu, $lagerort);
        $lagerEingang = new BuchenLagerLmobile($artnr, 1, $menge, 0, 0, 0, 'J', $datum, $kunu, $lagerort);

        try {
            DB::connection('bios2000')->beginTransaction();

            DB::connection('bios2000')->statement($chaotLager->getSqlStatement());
            $chaotLagerKartei->createModel();
            DB::connection('bios2000')->statement($lagerAusgang->getSqlStatement());
            DB::connection('bios2000')->statement($lagerEingang->getSqlStatement());

            DB::connection('bios2000')->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection('bios2000')->rollBack();

            return false;
        }

        return true;
    }

    public static function transferChaotToChaot(): bool
    {
        $chaotAusgang = new BuchenChaotLager('4124B5066B', '501', '1', '5', -10, '24.09.2025 10:11:45', '');
        $chaotLagerKarteiAusgang = new ChaotLagerKarteiDto([
            'ARTNR' => '4124B5066B',
            'DATUM' => '24.09.2025 10:53:59',
            'GANG' => '501',
            'EBENE' => '1',
            'FACH' => '5',
            'MENGE' => -10,
            'USER_NR' => 68,
            'KUNU' => '99996',
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => '',
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => 10,
            'CHARGE' => '',
        ]);
        $chaotEingang = new BuchenChaotLager('4124B5066B', '501', '1', '6', 10, '24.09.2025 10:11:45', '');
        $chaotLagerKarteiEingang = new ChaotLagerKarteiDto([
            'ARTNR' => '4124B5066B',
            'DATUM' => '24.09.2025 10:53:59',
            'GANG' => '501',
            'EBENE' => '1',
            'FACH' => '6',
            'MENGE' => -10,
            'USER_NR' => 68,
            'KUNU' => '99996',
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => '',
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => 10,
            'CHARGE' => '',
        ]);

        try {
            DB::connection('bios2000')->beginTransaction();

            DB::connection('bios2000')->statement($chaotAusgang->getSqlStatement());
            $chaotLagerKarteiAusgang->createModel();
            DB::connection('bios2000')->statement($chaotEingang->getSqlStatement());
            $chaotLagerKarteiEingang->createModel();

            DB::connection('bios2000')->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection('bios2000')->rollBack();

            return false;
        }

        return true;
    }

    public static function removalFromMain(): bool {
        return true;
    }
}
