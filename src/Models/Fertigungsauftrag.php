<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class Fertigungsauftrag
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class Fertigungsauftrag extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_FE_KOPF';

    /**
     * Primary Keys
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'NUMMER', 'AUFTRAG_POSITION'];

    public $incrementing = false;

    /**
     * Returns posten relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posten()
    {
        return $this->hasMany(FertigungsauftragPosten::class, 'KUNU', 'KUNU')
            ->where('NUMMER', $this->NUMMER)
            ->where('AUFTRAG_POSITION', $this->AUFTRAG_POSITION);
    }

}
