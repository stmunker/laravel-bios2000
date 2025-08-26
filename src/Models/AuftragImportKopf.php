<?php

namespace Bios2000\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class AuftragImportKopf extends Bios2000Master
{
    protected $table = 'AUFTRAG_IMPORT_KOPF';

    public function posten(): HasMany
    {
        return $this->hasMany(AuftragImportPosten::class, 'IMPORT_NUMMER', 'IMPORT_NUMMER');
    }

    public static function getImportNummer(): int
    {
        $max = static::query()->max('IMPORT_NUMMER');
        $current = $max === null ? 0 : (int) $max;
        return $current + 1;
    }
}
