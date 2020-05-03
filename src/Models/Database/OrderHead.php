<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class OrderHead
 * @package Bios2000\Models\Database
 * @deprecated
 */
class OrderHead extends Bios2000Master
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
    protected $primaryKey = "NUMMER";

    public function items()
    {
        return $this->hasMany('Bios2000\Models\Database\OrderItem', 'ART', 'ART')->where('KUNU', $this->KUNU)->where('NUMMER', $this->NUMMER);
    }

}
