<?php

namespace Bios2000\Dtos;

use Bios2000\Models\AuftragImportKopf;
use Carbon\CarbonInterface;

class AuftragImportKopfDto
{
    public int $IMPORT_NUMMER;

    public string $QUELLE;

    public string $ART;

    public int $KUNU;

    public int $NUMMER;

    public int $VORGANGS_NUMMER;

    public string $AU_DATUM;

    public string $ZUSATZ_KUERZEL_AB;

    public string $ZUSATZ_KUERZEL_RE;

    public string $VORLAGE_DATUM;

    public string $BRUTTO_NETTO;

    public string $SR_KZ;

    public int $EM_BERECHNUNG;

    public int $PC;

    public int $KS;

    public int $PROJEKT;

    public int $US_1;

    public int $US_2;

    public int $US_3;

    public int $E_KONTO1;

    public int $E_KONTO2;

    public int $E_KONTO3;

    public int $WS;

    public float $KURS;

    public int $RE_EMPF;

    public float $PORTO;

    public int $VERTRETER_1;

    public int $VERTRETER_2;

    public float $VPROV_1;

    public float $VPROV_2;

    public int $ZB;

    public int $VB;

    public int $PS;

    public int $SB;

    public string $C1;

    public string $C2;

    public string $C3;

    public string $C4;

    public string $C5;

    public string $C6;

    public string $C7;

    public string $C8;

    public string $C9;

    public string $C10;

    public string $AUFTRAG;

    public string $BEM_1;

    public string $BEM_2;

    public string $LADR_ANSCHRIFT_1;

    public string $LADR_ANSCHRIFT_2;

    public string $LADR_ANSCHRIFT_3;

    public string $LADR_ANSCHRIFT_4;

    public string $LADR_ANSCHRIFT_5;

    public string $LADR_STRASSE;

    public string $LADR_ADRESSE;

    public string $LADR_LAND;

    public int $LADR_LAND_NR;

    public string $LADR_UST_ID_NR;

    public string $MASTER_ARTNR;

    public string $MASTER_SERIAL;

    public int $SAMMLER_ID;

    public function __construct(array $data)
    {
        $this->IMPORT_NUMMER = $data['IMPORT_NUMMER'] ?? AuftragImportKopf::getImportNummer();
        $this->QUELLE = 'I';
        $this->ART = 'N';

        $KUNU = 22673;
        if (isset($data['KUNU']) && self::isKunuABiosCustomerNumber((int) $data['KUNU'])) {
            $KUNU = (int) $data['KUNU'];
        }

        $this->KUNU = $KUNU;
        $this->NUMMER = (int) ($data['NUMMER'] ?? -1);
        $this->VORGANGS_NUMMER = (int) ($data['VORGANGS_NUMMER'] ?? -1);
        $this->AU_DATUM = $this->castDate($data['AU_DATUM'] ?? '1950-01-01');
        $this->ZUSATZ_KUERZEL_AB = $data['ZUSATZ_KUERZEL_AB'] ?? '';
        $this->ZUSATZ_KUERZEL_RE = $data['ZUSATZ_KUERZEL_RE'] ?? '';
        $this->VORLAGE_DATUM = $this->castDate($data['VORLAGE_DATUM'] ?? '1950-01-01');
        $this->BRUTTO_NETTO = (string) ($data['BRUTTO_NETTO'] ?? 'N');
        $this->SR_KZ = (string) ($data['SR_KZ'] ?? 'V');
        $this->EM_BERECHNUNG = (int) ($data['EM_BERECHNUNG'] ?? -1);
        $this->PC = (int) ($data['PC'] ?? -1);
        $this->KS = (int) ($data['KS'] ?? -1);
        $this->PROJEKT = (int) ($data['PROJEKT'] ?? -1);
        $this->US_1 = (int) ($data['US_1'] ?? -1);
        $this->US_2 = (int) ($data['US_2'] ?? -1);
        $this->US_3 = (int) ($data['US_3'] ?? -1);
        $this->E_KONTO1 = (int) ($data['E_KONTO1'] ?? -1);
        $this->E_KONTO2 = (int) ($data['E_KONTO2'] ?? -1);
        $this->E_KONTO3 = (int) ($data['E_KONTO3'] ?? -1);
        $this->WS = (int) ($data['WS'] ?? -1);
        $this->KURS = (float) ($data['KURS'] ?? -1);

        $reEmpf = -1;
        if (isset($data['RE_EMPF']) && self::isKunuABiosCustomerNumber((int) $data['RE_EMPF'])) {
            $reEmpf = (int) $data['RE_EMPF'];
        }

        $this->RE_EMPF = $reEmpf;
        $this->PORTO = (float) ($data['PORTO'] ?? 0);
        $this->VERTRETER_1 = (int) ($data['VERTRETER_1'] ?? -1);
        $this->VERTRETER_2 = (int) ($data['VERTRETER_2'] ?? -1);
        $this->VPROV_1 = (float) ($data['VPROV_1'] ?? -1);
        $this->VPROV_2 = (float) ($data['VPROV_2'] ?? -1);
        $this->ZB = (int) ($data['ZB'] ?? -1);
        $this->VB = (int) ($data['VB'] ?? -1);
        $this->PS = (int) ($data['PS'] ?? -1);
        $this->SB = (int) ($data['SB'] ?? -1);
        $this->C1 = (string) ($data['C1'] ?? '');
        $this->C2 = (string) ($data['C2'] ?? '');
        $this->C3 = (string) ($data['C3'] ?? '');
        $this->C4 = (string) ($data['C4'] ?? '');
        $this->C5 = (string) ($data['C5'] ?? '');
        $this->C6 = (string) ($data['C6'] ?? '');
        $this->C7 = (string) ($data['C7'] ?? '');
        $this->C8 = (string) ($data['C8'] ?? '');
        $this->C9 = (string) ($data['C9'] ?? '');
        $this->C10 = (string) ($data['C10'] ?? '');
        $this->AUFTRAG = (string) ($data['AUFTRAG'] ?? '');
        $this->BEM_1 = (string) ($data['BEM_1'] ?? '');
        $this->BEM_2 = (string) ($data['BEM_2'] ?? '');
        $this->LADR_ANSCHRIFT_1 = (string) ($data['LADR_ANSCHRIFT_1'] ?? '');
        $this->LADR_ANSCHRIFT_2 = (string) ($data['LADR_ANSCHRIFT_2'] ?? '');
        $this->LADR_ANSCHRIFT_3 = (string) ($data['LADR_ANSCHRIFT_3'] ?? '');
        $this->LADR_ANSCHRIFT_4 = (string) ($data['LADR_ANSCHRIFT_4'] ?? '');
        $this->LADR_ANSCHRIFT_5 = (string) ($data['LADR_ANSCHRIFT_5'] ?? '');
        $this->LADR_STRASSE = (string) ($data['LADR_STRASSE'] ?? '');
        $this->LADR_ADRESSE = (string) ($data['LADR_ADRESSE'] ?? '');
        $this->LADR_LAND = (string) ($data['LADR_LAND'] ?? '');
        $this->LADR_LAND_NR = (int) ($data['LADR_LAND_NR'] ?? 0);
        $this->LADR_UST_ID_NR = (string) ($data['LADR_UST_ID_NR'] ?? '');
        $this->MASTER_ARTNR = (string) ($data['MASTER_ARTNR'] ?? '');
        $this->MASTER_SERIAL = (string) ($data['MASTER_SERIAL'] ?? '');
        $this->SAMMLER_ID = (int) ($data['SAMMLER_ID'] ?? 0);
    }

    public function toArray(): array
    {
        return [
            'IMPORT_NUMMER' => $this->IMPORT_NUMMER,
            'QUELLE' => $this->QUELLE,
            'ART' => $this->ART,
            'KUNU' => $this->KUNU,
            'NUMMER' => $this->NUMMER,
            'VORGANGS_NUMMER' => $this->VORGANGS_NUMMER,
            'AU_DATUM' => $this->AU_DATUM,
            'ZUSATZ_KUERZEL_AB' => $this->ZUSATZ_KUERZEL_AB,
            'ZUSATZ_KUERZEL_RE' => $this->ZUSATZ_KUERZEL_RE,
            'VORLAGE_DATUM' => $this->VORLAGE_DATUM,
            'BRUTTO_NETTO' => $this->BRUTTO_NETTO,
            'SR_KZ' => $this->SR_KZ,
            'EM_BERECHNUNG' => $this->EM_BERECHNUNG,
            'PC' => $this->PC,
            'KS' => $this->KS,
            'PROJEKT' => $this->PROJEKT,
            'US_1' => $this->US_1,
            'US_2' => $this->US_2,
            'US_3' => $this->US_3,
            'E_KONTO1' => $this->E_KONTO1,
            'E_KONTO2' => $this->E_KONTO2,
            'E_KONTO3' => $this->E_KONTO3,
            'WS' => $this->WS,
            'KURS' => $this->KURS,
            'RE_EMPF' => $this->RE_EMPF,
            'PORTO' => $this->PORTO,
            'VERTRETER_1' => $this->VERTRETER_1,
            'VERTRETER_2' => $this->VERTRETER_2,
            'VPROV_1' => $this->VPROV_1,
            'VPROV_2' => $this->VPROV_2,
            'ZB' => $this->ZB,
            'VB' => $this->VB,
            'PS' => $this->PS,
            'SB' => $this->SB,
            'C1' => $this->C1,
            'C2' => $this->C2,
            'C3' => $this->C3,
            'C4' => $this->C4,
            'C5' => $this->C5,
            'C6' => $this->C6,
            'C7' => $this->C7,
            'C8' => $this->C8,
            'C9' => $this->C9,
            'C10' => $this->C10,
            'AUFTRAG' => $this->AUFTRAG,
            'BEM_1' => $this->BEM_1,
            'BEM_2' => $this->BEM_2,
            'LADR_ANSCHRIFT_1' => $this->LADR_ANSCHRIFT_1,
            'LADR_ANSCHRIFT_2' => $this->LADR_ANSCHRIFT_2,
            'LADR_ANSCHRIFT_3' => $this->LADR_ANSCHRIFT_3,
            'LADR_ANSCHRIFT_4' => $this->LADR_ANSCHRIFT_4,
            'LADR_ANSCHRIFT_5' => $this->LADR_ANSCHRIFT_5,
            'LADR_STRASSE' => $this->LADR_STRASSE,
            'LADR_ADRESSE' => $this->LADR_ADRESSE,
            'LADR_LAND' => $this->LADR_LAND,
            'LADR_LAND_NR' => $this->LADR_LAND_NR,
            'LADR_UST_ID_NR' => $this->LADR_UST_ID_NR,
            'MASTER_ARTNR' => $this->MASTER_ARTNR,
            'MASTER_SERIAL' => $this->MASTER_SERIAL,
            'SAMMLER_ID' => $this->SAMMLER_ID,
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
     * Build an unsaved OrderimportHead model from this DTO.
     */
    public function toModel(): AuftragImportKopf
    {
        $head = new AuftragImportKopf;
        foreach ($this->toArray() as $key => $value) {
            if ($value === null) {
                continue;
            }
            $head->{$key} = $value;
        }

        return $head;
    }

    /**
     * Create and persist an OrderimportHead model from this DTO.
     */
    public function createModel(): AuftragImportKopf
    {
        $model = $this->toModel();
        $model->save();

        return $model;
    }

    /**
     * Check if the provided $kunu is between 10000 and 69999 (inclusive).
     */
    public static function isKunuABiosCustomerNumber(int $kunu): bool
    {
        return $kunu >= 10000 && $kunu <= 69999;
    }
}
