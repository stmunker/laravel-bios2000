<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class ArtikelZusatztext
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ArtikelZusatztext extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_ZUSATZTEXT';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ARTNR', 'SPRACHE'];

    public $incrementing = false;

}
