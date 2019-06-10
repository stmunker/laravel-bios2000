<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;
use Illuminate\Support\Facades\DB;

class ArticleChaoticWarehouse extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CHAOT_LAGER';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "ARTNR";

    public $incrementing = false;
    
}
