<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

class ProductionOrderPositions extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_FE_POSTEN';

    /**
     * Get contact persons of address
     *
     * @return ProductionOrderHead
     */
    public function head()
    {
        return $this->belongsTo('Bios2000\Models\Database\ProductionOrderHead', 'KUNU', 'KUNU')
            ->where('NUMMER', $this->NUMMER)->where('AUFTRAG_POSITION', $this->AUFTRAG_POSITION);
    }

    public function article()
    {
        if($this->ART == 'L')
            return $this->hasOne('Bios2000\Models\Database\Article', 'ARTNR', 'ARTNR')->first();
    }


}
