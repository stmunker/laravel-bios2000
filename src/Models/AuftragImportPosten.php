<?php

namespace Bios2000\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuftragImportPosten extends Bios2000Master
{
    protected $table = 'AUFTRAG_IMPORT_POSTEN';

    public function head(): BelongsTo
    {
        return $this->belongsTo(AuftragImportKopf::class, 'IMPORT_NUMMER', 'IMPORT_NUMMER');
    }
}
