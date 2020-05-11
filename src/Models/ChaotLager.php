<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;
use Illuminate\Support\Facades\DB;

/**
 * Class ChaotLager
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ChaotLager extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CHAOT_LAGER';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['GANG', 'EBENE', 'FACH', 'ARTNR'];

    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['DATUM'];

}
