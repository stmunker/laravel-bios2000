<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class ContactPerson
 * @package Bios2000\Models\Database
 * @deprecated
 */
class ContactPerson extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ANSPRECHPARTNER';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "KUERZEL";


}
