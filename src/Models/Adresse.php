<?php

namespace Bios2000\Models;

use Eloquent;

/**
 * Class Adresse
 * @package Bios2000\Models
 * @mixin Eloquent
 */
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


//    /**
//     * Get contact persons of address
//     *
//     * @return ContactPerson
//     */
//    public function contactpersons()
//    {
//        return $this->hasMany('Bios2000\Models\Database\ContactPerson', 'KUNU', 'KUNU');
//    }

    public function ansprechpartner()
    {
        return $this->hasMany(Ansprechpartner::class, 'KUNU', 'KUNU');
    }
}
