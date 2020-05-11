<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class RepresentativeSales
 * @package Bios2000\Models\Database
 * @deprecated
 */
class RepresentativeSales extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'VERTRETER_BEWEGUNG';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "VT_NUMMER";

}
