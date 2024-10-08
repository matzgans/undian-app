<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 200; $i++) {
            Participant::create([
                "name" => fake()->name(),
                'ktp_id' => fake()->unique()->numberBetween(1000000000000000, 9999999999999999),
                'address' => fake()->address(),
                "ticket_number" => 'DIARY' . str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT),
                'phone' => fake()->phoneNumber(),
                "ktp_image" => "assets/image.png",
            ]);
        }
    }
}
