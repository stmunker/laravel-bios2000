<?php

namespace Bios2000\Models;

use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ChaotLagerParam
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class ChaotLagerParam extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CHAOT_LAGER_PARAM';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ART', 'GANG', 'EBENE', 'FACH'];

    public $incrementing = false;

    public function fachTyp(): BelongsTo
    {
        return $this->belongsTo(ChaotLagerFachtyp::class, 'FACH_TYP', 'NUMMER');
    }

    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('GANG')->orderBy('EBENE')->orderBy('FACH');
        });
    }
}
