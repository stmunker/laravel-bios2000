<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class Country
 * @package Bios2000\Models\Database
 * @deprecated
 */
class Country extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'S01.dbo.LAENDER';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "LAND_NR";
}
