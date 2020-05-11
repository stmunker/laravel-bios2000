<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class Fertigungsauftrag extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_FE_KOPF';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'NUMMER', 'AUFTRAG_POSITION'];

    public $incrementing = false;

    public function posten()
    {
        return $this->hasMany(FertigungsauftragPosten::class, 'KUNU', 'KUNU')
            ->where('NUMMER', $this->NUMMER)
            ->where('AUFTRAG_POSITION', $this->AUFTRAG_POSITION);
    }

}
