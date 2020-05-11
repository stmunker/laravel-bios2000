<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class ArtikelZusatztext extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_ZUSATZTEXT';

    /**
     * Primary Key
     *
     * @var array
     */
    protected $primaryKey = ['ARTNR', 'SPRACHE'];

    public $incrementing = false;

}
