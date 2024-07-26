<?php

namespace Database\Seeders;

use App\Models\Clubs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clubs::create([
            'name' => 'Holywings',
            'location' => 'Kemang, Jakarta Selatan',
            'owner_id' => 1,
            'phone' => '089544109726',
            'logo' => 'test.jpg'
        ]);
    }
}
