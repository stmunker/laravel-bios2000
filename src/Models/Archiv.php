<?php

namespace Bios2000\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Schema;
use function foo\func;

/*
 * TODO: This should be optimized.
 */

class Archiv
{

    /**
     * Returns meta data of a single delivery note
     *
     * @param int $number
     * @return mixed
     */
    public static function deliverynote(int $number)
    {
        $filter = [
            'ART' => 'LS',
            'BELEG' => $number,
        ];

        /*
         * Return only first Result
         */
        return (new Archiv)->aw($filter)[0][0];
    }

    /**
     * Returns meta data of a single delivery note
     *
     * @param int $number
     * @return mixed
     */
    public static function deliverynotePosten(int $number)
    {
        $filter = [
            'ART' => 'LS',
            'BELEG' => $number,
        ];

        /*
         * Return only first Result
         */
        return (new Archiv)->aw($filter, false)[0];
    }

    /**
     * Returns result filtered by $arguments of "Auftragswesen" (AW)
     *
     * @param array $arguments
     * @param bool $kopf
     * @return Collection
     */
    private function aw(array $arguments, bool $kopf = true)
    {
        return $this->archive('AW', $arguments, $kopf);
    }

    /**
     * Returns result of all archives filtered by $arguments, selected by $archive
     *
     * @param string $archive
     * @param array $arguments
     * @param bool $kopf (default: true) true = _KOPF, false = _POSTEN
     * @return Collection
     */
    private function archive(string $archive, array $arguments, bool $kopf = true)
    {
        $year = date('Y');

        $result = new Collection();

        while (1) {
            if ($kopf) {
                $tableName = config('database.connections.bios2000.dba') . '.dbo.' . $archive . '_ARCHIV_' . $year . '_KOPF';
            } else {
                $tableName = config('database.connections.bios2000.dba') . '.dbo.' . $archive . '_ARCHIV_' . $year . '_POSTEN';
            }

            try {
                DB::connection('bios2000')->table($tableName)->select('ART')->first();
            } catch (Exception $e) {
                if ($year == date('Y')) continue;
                break;
            }

            if ($kopf) {
                if (DB::connection('bios2000')->table($tableName)
                        ->where($arguments)
                        ->orderBy('VERSION', 'desc')
                        ->count() != 0) {

                    if ($year < date('Y')) {
                        $dbResult = Cache::rememberForever('bios2000_archive_' . $archive . '_' . $year . '_kopf_' . implode('-', $arguments),
                            function () use ($tableName, $arguments) {
                                return DB::connection('bios2000')->table($tableName)
                                    ->where($arguments)
                                    ->orderBy('VERSION', 'desc')->get()->all();
                            });
                    } else {
                        $dbResult = DB::connection('bios2000')->table($tableName)
                            ->where($arguments)
                            ->orderBy('VERSION', 'desc')->get()->all();
                    }

                    $result->push($dbResult);
                }

            } else {
                if (DB::connection('bios2000')->table($tableName)
                        ->where('POSITIONS_NR', '!=', null)
                        ->where($arguments)
                        ->orderBy('VERSION', 'desc')
                        ->count() != 0) {

                    if ($year < date('Y')) {
                        $dbResult = Cache::rememberForever('bios2000_archive_' . $archive . '_' . $year . '_posten_' . implode('-', $arguments),
                            function () use ($tableName, $arguments) {
                                return DB::connection('bios2000')->table($tableName)
                                    ->where('POSITIONS_NR', '!=', null)
                                    ->where($arguments)
                                    ->orderBy('VERSION', 'desc')->get()->all();
                            });

                    } else {
                        $dbResult = DB::connection('bios2000')->table($tableName)
                            ->where('POSITIONS_NR', '!=', null)
                            ->where($arguments)
                            ->orderBy('VERSION', 'desc')->get()->all();
                    }

                    $result->push($dbResult);

                }
            }

            $year--;
        }

        return $result;
    }

}
