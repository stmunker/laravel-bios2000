<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class Address
 * @package Bios2000\Models\Database
 * @deprecated
 */
class Address extends Bios2000Master
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


    /**
     * Get contact persons of address
     *
     * @return ContactPerson
     */
    public function contactpersons()
    {
        return $this->hasMany('Bios2000\Models\Database\ContactPerson', 'KUNU', 'KUNU');
    }
}
