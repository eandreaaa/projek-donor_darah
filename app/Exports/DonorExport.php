<?php

namespace App\Exports;

use App\Models\Donor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DonorExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donor::with('penerimaan')->orderBy('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        return[
            'No.',
            'Nama',
            'No. WA',
            'Email',
            'Umur',
            'Berat Badan',
            'Gol. Darah',
            'Status',
        ];
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->nama,
            $data->hp,
            $data->email,
            $data->umur,
            $data->berat,
            $data->goldar,
            $data->penerimaan ? $data->penerimaan['status'] : '-',
            $data->penerimaan ? $data->penerimaan['jadwal'] : '-',
        ];
    }
}
