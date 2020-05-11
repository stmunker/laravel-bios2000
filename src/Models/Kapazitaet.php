<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Eloquent;

/**
 * Class Kapazitaet
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class Kapazitaet extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DV_KAP';

    /**
     * Primary Keys
     *
     * @var string
     */
    protected $primaryKey = 'ARTNR';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['ANLAGE_DATUM', 'AENDERUNG_DATUM'];

}
