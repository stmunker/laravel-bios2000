<?php

namespace Bios2000\Models;

use Eloquent;

/**
 * Class Adresse
 * @mixin Eloquent
 * @package Bios2000\Models
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
    protected $primaryKey = 'KUNU';

    public function ansprechpartner()
    {
        return $this->hasMany(Ansprechpartner::class, 'KUNU', 'KUNU');
    }
}
