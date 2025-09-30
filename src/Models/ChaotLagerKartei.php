<?php

namespace Bios2000\Models;

use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ChaotLagerKartei
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ChaotLagerKartei extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CHAOT_LAGER_KARTEI';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ARTNR', 'DATUM', 'GANG', 'EBENE', 'FACH', 'MENGE'];

    public $incrementing = false;
}
