<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class Auftrag extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'AUFTRAG_KOPF';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'KUNU', 'NUMMER'];

    public $incrementing = false;

    public function posten()
    {
        return $this->hasMany(AuftragPosten::class, 'ART', 'ART')
            ->where('KUNU', $this->KUNU)
            ->where('NUMMER', $this->NUMMER);
    }

}
