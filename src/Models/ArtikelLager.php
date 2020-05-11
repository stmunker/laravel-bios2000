<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Illuminate\Support\Facades\DB;

class ArtikelLager extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_LAGER';

    /**
     * Primary Key
     *
     * @var array
     */
    protected $primaryKey = ['ARTNR', 'LAGER'];

    public $incrementing = false;

}
