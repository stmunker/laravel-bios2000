<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;
use Illuminate\Support\Facades\DB;

/**
 * Class ArtikelLager
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ArtikelLager extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_LAGER';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ARTNR', 'LAGER'];

    public $incrementing = false;

}
