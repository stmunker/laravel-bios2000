<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class FertigungsauftragPosten extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_FE_POSTEN';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'NUMMER', 'AUFTRAG_POSITION', 'POS'];

    public $incrementing = false;

// TODO:
//    /**
//     * Get contact persons of address
//     *
//     * @return ProductionOrderHead
//     */
//    public function head()
//    {
//        return $this->belongsTo('Bios2000\Models\Database\ProductionOrderHead', 'KUNU', 'KUNU')
//            ->where('NUMMER', $this->NUMMER)->where('AUFTRAG_POSITION', $this->AUFTRAG_POSITION);
//    }
//
//    public function article()
//    {
//        if($this->ART == 'L')
//            return $this->hasOne('Bios2000\Models\Database\Article', 'ARTNR', 'ARTNR')->first();
//    }


}
