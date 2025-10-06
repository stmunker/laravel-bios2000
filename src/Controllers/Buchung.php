<?php

namespace Bios2000\Controllers;

use Bios2000\Dtos\ChaotLagerKarteiDto;
use Bios2000\Models\Procedures\BuchenChaotLager;
use Bios2000\Models\Procedures\BuchenLagerLmobile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class Buchung
{
    public static function entryToMain(string $artnr, int $lager, float $menge, string $datum, string $kunu): bool
    {
        // TODO: Die Prozedur BUCHEN_LAGER_LMOBILE bucht alles mit dem Buchungskennzeichen 10 (UMBUCHUNG). Prüfen ob es eine Möglichkeit gibt wie das im Nachgang verändert werden kann.
        $lagerEingang = new BuchenLagerLmobile($artnr, $lager, $menge, 0, 0, 0, 'J', $datum, $kunu, '');
        $connection = (string) Config::get('bios2000.database_connection');

        try {
            DB::connection($connection)->beginTransaction();
            DB::connection($connection)->statement($lagerEingang->getSqlStatement());
            DB::connection($connection)->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection($connection)->rollBack();

            return false;
        }

        return true;
    }

    public static function transferMainToChaot(
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
        if ($menge >= 0) {
            $negativeMenge = $menge * -1;
        } else {
            $negativeMenge = $menge;
            $menge = $menge * -1;
        }

        $connection = (string) Config::get('bios2000.database_connection');

        $lagerAusgang = new BuchenLagerLmobile($artnr, 1, $negativeMenge, 0, 0, 0, 'J', $datum, $kunu, $lagerort);
        $lagerEingang = new BuchenLagerLmobile($artnr, 0, $menge, 0, 0, 0, 'J', $datum, $kunu, $lagerort);
        $chaotLager = new BuchenChaotLager($artnr, $gang, $ebene, $fach, $menge, $datum, $charge);
        $chaotLagerKartei = $chaotLager->createChaotLagerKarteiDto([
            'ARTNR' => $artnr,
            'DATUM' => $datum,
            'GANG' => $gang,
            'EBENE' => $ebene,
            'FACH' => $fach,
            'MENGE' => $menge,
            'USER_NR' => $user,
            'KUNU' => $kunu,
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => $LSNummer,
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => $buchungsKz,
            'CHARGE' => $charge,
        ]);

        try {
            DB::connection($connection)->beginTransaction();

            DB::connection($connection)->statement($lagerAusgang->getSqlStatement());
            DB::connection($connection)->statement($lagerEingang->getSqlStatement());
            DB::connection($connection)->statement($chaotLager->getSqlStatement());
            $chaotLagerKartei->createModel();

            DB::connection($connection)->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection($connection)->rollBack();

            return false;
        }

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
        if ($menge >= 0) {
            $negativeMenge = $menge * -1;
        } else {
            $negativeMenge = $menge;
            $menge = $menge * -1;
        }

        $connection = (string) Config::get('bios2000.database_connection');

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
            DB::connection($connection)->beginTransaction();

            DB::connection($connection)->statement($chaotLager->getSqlStatement());
            $chaotLagerKartei->createModel();
            DB::connection($connection)->statement($lagerAusgang->getSqlStatement());
            DB::connection($connection)->statement($lagerEingang->getSqlStatement());

            DB::connection($connection)->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection($connection)->rollBack();

            return false;
        }

        return true;
    }

    public static function transferChaotToChaot(
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
        string $charge = ''
    ): bool {
        if ($menge >= 0) {
            $negativeMenge = $menge * -1;
        } else {
            $negativeMenge = $menge;
            $menge = $menge * -1;
        }

        $connection = (string) Config::get('bios2000.database_connection');

        $chaotAusgang = new BuchenChaotLager($artnr, $gang, $ebene, $fach, $negativeMenge, $datum, $charge);
        $chaotLagerKarteiAusgang = new ChaotLagerKarteiDto([
            'ARTNR' => $artnr,
            'DATUM' => $datum,
            'GANG' => $gang,
            'EBENE' => $ebene,
            'FACH' => $fach,
            'MENGE' => $negativeMenge,
            'USER_NR' => $user,
            'KUNU' => $kunu,
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => $LSNummer,
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => $buchungsKz,
            'CHARGE' => $charge,
        ]);
        $chaotEingang = new BuchenChaotLager($artnr, $gang, $ebene, $fach, $menge, $datum, $charge);
        $chaotLagerKarteiEingang = new ChaotLagerKarteiDto([
            'ARTNR' => $artnr,
            'DATUM' => $datum,
            'GANG' => $gang,
            'EBENE' => $ebene,
            'FACH' => $fach,
            'MENGE' => $menge,
            'USER_NR' => $user,
            'KUNU' => $kunu,
            'NUMMER' => '',
            'VORGANGS_NUMMER' => '',
            'LS_NUMMER' => $LSNummer,
            'DV_BARCODE' => 0,
            'BUCHUNGS_KZ' => $buchungsKz,
            'CHARGE' => $charge,
        ]);

        try {
            DB::connection($connection)->beginTransaction();

            DB::connection($connection)->statement($chaotAusgang->getSqlStatement());
            $chaotLagerKarteiAusgang->createModel();
            DB::connection($connection)->statement($chaotEingang->getSqlStatement());
            $chaotLagerKarteiEingang->createModel();

            DB::connection($connection)->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection($connection)->rollBack();

            return false;
        }

        return true;
    }

    public static function removalFromMain(string $artnr, int $lager, float $menge, string $datum, string $kunu): bool
    {
        // TODO: Die Prozedur BUCHEN_LAGER_LMOBILE bucht alles mit dem Buchungskennzeichen 10 (UMBUCHUNG). Prüfen ob es eine Möglichkeit gibt wie das im Nachgang verändert werden kann. Ggf. Kann die Funktion mit entryToMain zusammengefasst werden
        $negativeMenge = $menge * -1;
        $connection = (string) Config::get('bios2000.database_connection');
        $lagerAusgang = new BuchenLagerLmobile($artnr, $lager, $negativeMenge, 0, 0, 0, 'J', $datum, $kunu, '');

        try {
            DB::connection($connection)->beginTransaction();
            DB::connection($connection)->statement($lagerAusgang->getSqlStatement());
            DB::connection($connection)->commit();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            DB::connection($connection)->rollBack();

            return false;
        }

        return true;
    }
}
