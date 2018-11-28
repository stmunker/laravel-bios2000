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
     * Returns result filtered by $arguments of "Auftragswesen" (AW)
     *
     * @param array $arguments
     * @return Collection
     */
    private function aw(array $arguments)
    {
        return $this->archive('AW', $arguments);
    }

    /**
     * Returns result of all archives filtered by $arguments, selected by $archive
     *
     * @param string $archive
     * @param array $arguments
     * @return Collection
     */
    private function archive(string $archive, array $arguments)
    {
        $year = date('Y');

        $result = new Collection();

        while(1) {
            $tableName = env('BIOS_DB_A').'.dbo.'.$archive.'_ARCHIV_'.$year.'_KOPF';

            try {

                $result->push(DB::connection('bios2000')->table($tableName)->where($arguments)->get()->all());

            } catch (Exception $e) {
                break;
            }

            $year--;

        }

        return $result;
    }

}
