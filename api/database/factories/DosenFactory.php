<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => substr($this->faker->unique()->phoneNumber, 0, 15),
            'nama' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'alamat' => $this->faker->streetAddress,
        ];
    }
}
