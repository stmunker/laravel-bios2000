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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['ANLAGE_DATUM', 'AENDERUNG_DATUM'];

    /**
     * Returns contact persons relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ansprechpartner()
    {
        return $this->hasMany(Ansprechpartner::class, 'KUNU', 'KUNU');
    }
}
