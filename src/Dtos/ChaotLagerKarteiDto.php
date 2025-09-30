<?php

namespace Bios2000\Dtos;

use Bios2000\Models\ChaotLagerKartei;
use Carbon\CarbonInterface;

class ChaotLagerKarteiDto
{
    public string $ARTNR;

    /**
     * Stored as string (YYYY-MM-DD or datetime) to match existing DTO patterns.
     */
    public ?string $DATUM;

    public string $GANG;

    public int $EBENE;

    public int $FACH;

    public float $MENGE;

    public int $USER_NR;

    public int $KUNU;

    public int $NUMMER;

    public int $VORGANGS_NUMMER;

    public string $LS_NUMMER;

    public int $DV_BARCODE;

    public int $BUCHUNGS_KZ;

    public string $CHARGE;

    public function __construct(array $data)
    {
        $this->ARTNR = (string) ($data['ARTNR'] ?? '');
        $this->DATUM = $this->castDate($data['DATUM'] ?? null);
        $this->GANG = (string) ($data['GANG'] ?? '');
        $this->EBENE = (int) ($data['EBENE'] ?? 0);
        $this->FACH = (int) ($data['FACH'] ?? 0);
        $this->MENGE = (float) ($data['MENGE'] ?? 0);
        $this->USER_NR = (int) ($data['USER_NR'] ?? 0);
        $this->KUNU = (int) ($data['KUNU'] ?? 0);
        $this->NUMMER = (int) ($data['NUMMER'] ?? 0);
        $this->VORGANGS_NUMMER = (int) ($data['VORGANGS_NUMMER'] ?? 0);
        $this->LS_NUMMER = (string) ($data['LS_NUMMER'] ?? '');
        $this->DV_BARCODE = (int) ($data['DV_BARCODE'] ?? 0);
        $this->BUCHUNGS_KZ = (int) ($data['BUCHUNGS_KZ'] ?? 0);
        $this->CHARGE = (string) ($data['CHARGE'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'ARTNR' => $this->ARTNR,
            'DATUM' => $this->DATUM,
            'GANG' => $this->GANG,
            'EBENE' => $this->EBENE,
            'FACH' => $this->FACH,
            'MENGE' => $this->MENGE,
            'USER_NR' => $this->USER_NR,
            'KUNU' => $this->KUNU,
            'NUMMER' => $this->NUMMER,
            'VORGANGS_NUMMER' => $this->VORGANGS_NUMMER,
            'LS_NUMMER' => $this->LS_NUMMER,
            'DV_BARCODE' => $this->DV_BARCODE,
            'BUCHUNGS_KZ' => $this->BUCHUNGS_KZ,
            'CHARGE' => $this->CHARGE,
        ];
    }

    private function castDate($value): ?string
    {
        if ($value === null) {
            return null;
        }
        if ($value instanceof CarbonInterface) {
            return $value->toDateTimeString();
        }

        return (string) $value;
    }

    /**
     * Build an unsaved ChaotLagerKartei model from this DTO.
     */
    public function toModel(): ChaotLagerKartei
    {
        $model = new ChaotLagerKartei;
        foreach ($this->toArray() as $key => $value) {
            if ($value === null) {
                continue;
            }
            $model->{$key} = $value;
        }

        return $model;
    }

    /**
     * Create and persist a ChaotLagerKartei model from this DTO.
     */
    public function createModel(): ChaotLagerKartei
    {
        $model = $this->toModel();
        $model->save();

        return $model;
    }
}
