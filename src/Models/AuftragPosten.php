<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;

class AuftragPosten extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'AUFTRAG_POSTEN';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['ART', 'KUNU', 'NUMMER', 'LFD_NR'];

    public $incrementing = false;

}
