<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::create([
            'name' => 'Holla Chica',
            'club_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quam iste numquam rerum, corrupti est fugiat ullam magni cumque optio, sint adipisci, hic inventore temporibus magnam quasi deserunt animi pariatur ea? Blanditiis commodi sunt ipsum iure, impedit, porro laboriosam architecto similique possimus exercitationem repellendus eaque quo fugit rem expedita voluptatem?',
            'contact_number' => '08954401019',
            'whatsapp_number' => '08954401019',
            'event_time_start' => '23:59:00',
            'event_time_end' => '02:59:00',
            'event_date' => '2024-10-10',
            'location' => 'Tambun', 
            'longitude' => '106.92640080950194',
            'latitude' => '-6.382285991351325',
            'banner' => 'http://localhost:8081/storage/profile_picture/Admins.png',
            'tags' => 'Party', 'Gracias', 'Sientra'
        ]);
    }
}
