<?php

namespace Bios2000\Dtos;

use Bios2000\Models\AuftragImportKopf;
use Bios2000\Models\AuftragImportPosten;
use Carbon\CarbonInterface;

class AuftragImportPostenDto
{
    public int $IMPORT_NUMMER;

    public int $LFD_NR;

    public int $POSITIONS_NR;

    public string $DISPO_INTERN;

    public string $DISPO_KUNDE;

    public string $ARTNR;

    public string $BEZ_1;

    public string $BEZ_2;

    public bool $BEZ_1_ALIGN;

    public float $BESTELLT;

    public float $GELIEFERT;

    public float $PREIS;

    public float $RABATT_1;

    public float $RABATT_2;

    public float $V_EINHEIT;

    public float $EM_PREIS;

    public float $EK;

    public string $ZEILEN_ART;

    public ?string $JUMBO_FLAG;

    public ?string $USER_MARKE;

    public int $LAGER;

    public int $PE;

    public int $US;

    public int $VARIANTE;

    public int $SW1;

    public int $SW2;

    public int $SW3;

    public string $BEMERKUNG;

    public string $EXTERNAL_ARTNR;

    public string $EXTERNAL_ARTNR_ART;

    public function __construct(array $data)
    {
        $this->IMPORT_NUMMER = (int) ($data['IMPORT_NUMMER'] ?? AuftragImportKopf::getImportNummer());
        $this->LFD_NR = (int) ($data['LFD_NR'] ?? 0);
        $this->POSITIONS_NR = (int) ($data['POSITIONS_NR'] ?? -1);
        $this->DISPO_INTERN = $this->castDate($data['DISPO_INTERN'] ?? '1950-01-01');
        $this->DISPO_KUNDE = $this->castDate($data['DISPO_KUNDE'] ?? '1950-01-01');
        $this->ARTNR = $data['ARTNR'] ?? '';
        $this->BEZ_1 = $data['BEZ_1'] ?? '';
        $this->BEZ_2 = $data['BEZ_2'] ?? '';
        $this->BEZ_1_ALIGN = (bool) ($data['BEZ_1_ALIGN'] ?? true);
        $this->BESTELLT = (float) ($data['BESTELLT'] ?? 0);
        $this->GELIEFERT = (float) ($data['GELIEFERT'] ?? -1);
        $this->PREIS = (float) ($data['PREIS'] ?? -1);
        $this->RABATT_1 = (float) ($data['RABATT_1'] ?? 0);
        $this->RABATT_2 = (float) ($data['RABATT_2'] ?? 0);
        $this->V_EINHEIT = (float) ($data['V_EINHEIT'] ?? -1);
        $this->EM_PREIS = (float) ($data['EM_PREIS'] ?? 0);
        $this->EK = (float) ($data['EK'] ?? -1);
        $this->ZEILEN_ART = (string) ($data['ZEILEN_ART'] ?? 'L');
        $this->JUMBO_FLAG = $data['JUMBO_FLAG'] ?? '';
        $this->USER_MARKE = $data['USER_MARKE'] ?? '';
        $this->LAGER = (int) ($data['LAGER'] ?? -1);
        $this->PE = (int) ($data['PE'] ?? 1);
        $this->US = (int) ($data['US'] ?? -1);
        $this->VARIANTE = (int) ($data['VARIANTE'] ?? 0);
        $this->SW1 = (int) ($data['SW1'] ?? 0);
        $this->SW2 = (int) ($data['SW2'] ?? 0);
        $this->SW3 = (int) ($data['SW3'] ?? 0);
        $this->BEMERKUNG = $data['BEMERKUNG'] ?? '';
        $this->EXTERNAL_ARTNR = $data['EXTERNAL_ARTNR'] ?? '';
        $this->EXTERNAL_ARTNR_ART = $data['EXTERNAL_ARTNR_ART'] ?? '';
    }

    public function toArray(): array
    {
        return [
            'IMPORT_NUMMER' => $this->IMPORT_NUMMER,
            'LFD_NR' => $this->LFD_NR,
            'POSITIONS_NR' => $this->POSITIONS_NR,
            'DISPO_INTERN' => $this->DISPO_INTERN,
            'DISPO_KUNDE' => $this->DISPO_KUNDE,
            'ARTNR' => $this->ARTNR,
            'BEZ_1' => $this->BEZ_1,
            'BEZ_2' => $this->BEZ_2,
            'BEZ_1_ALIGN' => $this->BEZ_1_ALIGN,
            'BESTELLT' => $this->BESTELLT,
            'GELIEFERT' => $this->GELIEFERT,
            'PREIS' => $this->PREIS,
            'RABATT_1' => $this->RABATT_1,
            'RABATT_2' => $this->RABATT_2,
            'V_EINHEIT' => $this->V_EINHEIT,
            'EM_PREIS' => $this->EM_PREIS,
            'EK' => $this->EK,
            'ZEILEN_ART' => $this->ZEILEN_ART,
            'JUMBO_FLAG' => $this->JUMBO_FLAG,
            'USER_MARKE' => $this->USER_MARKE,
            'LAGER' => $this->LAGER,
            'PE' => $this->PE,
            'US' => $this->US,
            'VARIANTE' => $this->VARIANTE,
            'SW1' => $this->SW1,
            'SW2' => $this->SW2,
            'SW3' => $this->SW3,
            'BEMERKUNG' => $this->BEMERKUNG,
            'EXTERNAL_ARTNR' => $this->EXTERNAL_ARTNR,
            'EXTERNAL_ARTNR_ART' => $this->EXTERNAL_ARTNR_ART,
        ];
    }

    private function castDate($value): ?string
    {
        if ($value === null) {
            return null;
        }
        if ($value instanceof CarbonInterface) {
            return $value->toDateString();
        }

        return (string) $value;
    }

    /**
     * Build an unsaved OrderimportPosition model from this DTO.
     */
    public function toModel(): AuftragImportPosten
    {
        $model = new AuftragImportPosten;
        foreach ($this->toArray() as $key => $value) {
            if ($value === null) {
                continue;
            }
            $model->{$key} = $value;
        }

        return $model;
    }

    /**
     * Create and persist an OrderimportPosition model from this DTO.
     */
    public function createModel(): AuftragImportPosten
    {
        $model = $this->toModel();
        $model->save();

        return $model;
    }
}
