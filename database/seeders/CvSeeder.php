<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cv::factory()->create([
            'user_id' => 1,
            'full_name' => 'John Doe',
            'contact_info' => 'johndoe@example.com',
            'education' => 'Bachelor in Computer Science',
            'work_experience' => 'Software Developer at XYZ Corp.',
            'skills' => 'PHP, JavaScript, Laravel, MySQL',
            'languages' => 'English, Spanish',
        ]);
    }
}
