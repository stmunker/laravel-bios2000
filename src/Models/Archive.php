<?php

namespace Bios2000\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Exception;

class Archive
{

    /**
     * Returns meta data of a single delivery note
     *
     * @param int $number
     * @return mixed
     */
    public function deliverynote(int $number)
    {
        $filter = [
            'ART' => 'LS',
            'BELEG' => $number,
        ];

        /*
         * Return only first Result
         */
        return $this->aw($filter)[0][0];
    }

    /**
     * Returns meta data of a single delivery note
     *
     * @param int $number
     * @return mixed
     */
    public function deliverynote_posten(int $number)
    {
        $filter = [
            'ART' => 'LS',
            'BELEG' => $number,
        ];

        /*
         * Return only first Result
         */
        return $this->aw($filter, false)[0];
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

        while(1) {
            if($kopf) {
                $tableName = env('BIOS_DB_A') . '.dbo.' . $archive . '_ARCHIV_' . $year . '_KOPF';
            } else {
                $tableName = env('BIOS_DB_A') . '.dbo.' . $archive . '_ARCHIV_' . $year . '_POSTEN';
            }

            try {

                if($kopf) {
                    $result->push(DB::connection('bios2000')->table($tableName)->where($arguments)->get()->all());
                } else {
                    $result->push(DB::connection('bios2000')->table($tableName)->where('POSITIONS_NR', '!=', null)->where($arguments)->get()->all());
                }

            } catch (Exception $e) {
                break;
            }

            $year--;

        }

        return $result;
    }

}
