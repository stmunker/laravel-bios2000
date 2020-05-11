<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class Schluessel
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class Schluessel extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'SCHLUESSEL';

    /**
     * Primary Keys
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'NUMMER'];

    public $incrementing = false;
}
