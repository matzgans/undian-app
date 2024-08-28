<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Prize;
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
        for ($i = 1; $i < 5; $i++) {
            Undian::create([
                "participant_id" => fake()->randomElement(Participant::pluck("id")),
                "prize_id" => fake()->randomElement(Prize::pluck("id")),
            ]);
        }
    }
}
