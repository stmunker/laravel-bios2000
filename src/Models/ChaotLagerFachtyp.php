<?php

namespace Bios2000\Models;

use Eloquent;

/**
 * Class ChaotLagerFachtyp
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ChaotLagerFachtyp extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CHAOT_LAGER_FACHTYP';

    /**
     * Primary Keys
     *
     * @var string
     */
    protected $primaryKey = 'NUMMER';

    public $incrementing = false;
}
