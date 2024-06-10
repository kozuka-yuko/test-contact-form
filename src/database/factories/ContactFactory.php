<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=> \App\Models\Category::inRandomOrder()->first()->id,
            'first_name' => $this->faker->name(),
            'last_name'
            => $this->faker->name(),
            'gender'  => $this->faker->gender(),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'building' => $this->faker->text(10),
            'detail' => $this->faker->sentence(),
        ];
    }
}
