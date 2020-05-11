<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class Kapazitaet extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_KAP';

    protected $primaryKey = 'ARTNR';

    protected $dates = ['ANLAGE_DATUM', 'AENDERUNG_DATUM'];

}
