<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class Land extends Bios2000Master
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
