<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ParticipantExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
     * Mengambil koleksi data yang akan diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Participant::all();
    }

    /**
     * Menyediakan header untuk setiap kolom.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Nomor KTP',
            'Alamat',
            'Nomor Tiket',
            'Nomor Telepon',
            'Gambar KTP'
        ];
    }

    /**
     * Memetakan data partisipan untuk setiap baris.
     *
     * @param mixed $participant
     * @return array
     */
    public function map($participant): array
    {
        return [
            $participant->name,
            // Menambahkan tanda petik tunggal untuk memastikan nomor KTP di Excel ditampilkan sebagai teks
            " " . $participant->ktp_id,
            $participant->address,
            $participant->ticket_number,
            $participant->phone,
            $participant->ktp_image,
        ];
    }

    /**
     * Mengatur format kolom.
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, // Format kolom B sebagai teks
        ];
    }
}
