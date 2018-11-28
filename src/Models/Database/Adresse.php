<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

class Adresse extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ADRESSEN';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "KUNU";
}
