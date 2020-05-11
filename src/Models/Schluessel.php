<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class Schluessel extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'SCHLUESSEL';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'NUMMER'];

    public $incrementing = false;
}
