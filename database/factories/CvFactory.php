<?php

// database/factories/CvFactory.php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Crea un usuario asociado
            'full_name' => $this->faker->name,
            'contact_info' => $this->faker->email,
            'education' => $this->faker->sentence,
            'work_experience' => $this->faker->paragraph,
            'skills' => $this->faker->words(5, true),
            'languages' => $this->faker->words(3, true),
        ];
    }
}

