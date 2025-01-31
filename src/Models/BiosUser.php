<?php

namespace Bios2000\Models;

use Illuminate\Support\Facades\DB;

class BiosUser
{
    public static string $tablename;

    public static function init(): void
    {
        self::$tablename = config('database.connections.bios2000.dbs') . '.dbo.' . 'BIOSUSER';
    }

    public static function getUserByUserNr(int $userNr): ?object
    {
        self::init();

        return DB::connection('bios2000')->table(self::$tablename)->where(['USER_NR' => $userNr])->first();
    }
}
