<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class Keys
 * @package Bios2000\Models\Database
 * @deprecated
 */
class Keys extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'SCHLUESSEL';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "NUMMER";
}
