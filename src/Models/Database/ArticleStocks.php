<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;
use Illuminate\Support\Facades\DB;

class ArticleStocks extends Bios2000Master
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
     * @var string
     */
    protected $primaryKey = "ARTNR";

    public $incrementing = false;
    
}
