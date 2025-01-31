<?php

namespace Bios2000\Models;

use Illuminate\Support\Facades\DB;

class Laender
{
    public static string $tablename;

    public static function init(): void
    {
        self::$tablename = config('database.connections.bios2000.dbs') . '.dbo.' . 'LAENDER';
    }

    public static function getCountryByLandNr(int $landNr): ?object
    {
        self::init();

        return DB::connection('bios2000')->table(self::$tablename)->where(['LAND_NR' => $landNr])->first();
    }
}
