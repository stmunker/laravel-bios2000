<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class Auftrag
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class Auftrag extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'AUFTRAG_KOPF';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ART', 'KUNU', 'NUMMER'];

    public $incrementing = false;

    /**
     * Returns posten relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posten()
    {
        return $this->hasMany(AuftragPosten::class, 'ART', 'ART')
            ->where('KUNU', $this->KUNU)
            ->where('NUMMER', $this->NUMMER);
    }

}
