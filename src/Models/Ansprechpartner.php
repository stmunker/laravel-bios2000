<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class Ansprechpartner
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class Ansprechpartner extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ANSPRECHPARTNER';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['NUMMER', 'KUERZEL'];

    public $incrementing = false;

    /**
     * Returns customer/supplier (address) relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'KUNU', 'KUNU');
    }

}
