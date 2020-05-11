<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class FertigungsauftragPosten
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class FertigungsauftragPosten extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_FE_POSTEN';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ART', 'NUMMER', 'AUFTRAG_POSITION', 'POS'];

    public $incrementing = false;

    /**
     * Return head of production order relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kopf()
    {
        return $this->belongsTo(Fertigungsauftrag::class, 'KUNU', 'KUNU')
            ->where('NUMMER', $this->NUMMER)
            ->where('AUFTRAG_POSITION', $this->AUFTRAG_POSITION);
    }

    /**
     * Returns article relationship if it is a article position.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function artikel()
    {
        if ($this->ART == 'L') {
            return $this->hasOne(Artikel::class, 'ARTNR', 'ARTNR');
        }
    }


}
