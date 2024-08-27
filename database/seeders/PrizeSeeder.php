<?php

namespace Database\Seeders;

use App\Models\Prize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prizes = [
            'Nasi Goreng',
            'Mie Goreng',
            'Ayam Bakar',
            'Sate Ayam',
            'Soto Ayam',
            'Rendang',
            'Gado-Gado',
            'Bakso',
            'Pempek',
            'Martabak Manis'
        ];

        foreach ($prizes as $prize) {
            Prize::create([
                'name' => $prize,
            ]);
        }
    }
}
