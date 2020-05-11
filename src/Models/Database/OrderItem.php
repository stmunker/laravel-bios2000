<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class OrderItem
 * @package Bios2000\Models\Database
 * @deprecated
 */
class OrderItem extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'AUFTRAG_POSTEN';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "NUMMER";

}
