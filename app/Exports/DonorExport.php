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
            'Jadwal',
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
            is_null($data->penerimaan['status']) ? '-' : $data->penerimaan['status'],
            // is_null($data->penerimaan['jadwal']) ? '-' : $data->penerimaan['jadwal'],
            is_null($data->penerimaan['jadwal']) ? '-' : \Carbon\Carbon::parse($data->penerimaan['jadwal'])->format('d M, Y')
        ];
    }
}
