<?php

namespace Database\Seeders;

use App\Models\Undian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UndianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Undian::create([
            'participant_id' => 1,
            'prize_id' => 1,
        ]);
    }
}
