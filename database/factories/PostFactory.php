<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'description' => 'PHP এর $ নিয়ে এত টানাটানি না করে চাইলেই কিন্তু PHP কে fork করে PoorPHP নামে নতুন ল্যাঙ্গুয়েজ বানানো যায়।
            সবই থাকবে, কেবল $ থাকবে না!

            আইডিয়াটা কেমন বন্ধুরা? 😁',
            'user_id' => 1,
            'no_views' => 12
        ];
    }
}
