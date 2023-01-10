<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemoireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre  ' => $this->faker->text(50),
            'description' =>$this->faker->text(300),
            'date_soutenance  ' => $this->faker->date(50),
            'couverture  ' => $this->faker->text(50),
            'count_views' => $this->faker->integer(50),
            'count_download' => $this->faker->integer(50),
            'resume' =>  $this->faker->text(300),
            'encadreur' => $this->faker->text(50),
            'key_word' => $this->faker->text(2300),
        ];
    }
}
