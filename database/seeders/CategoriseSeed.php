<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CategoriseSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Category::insert([
                'id' => Str::random(6),
                'name' => $faker->word,
                'user_id' => $faker->randomElement(User::pluck('id')),
            ]);
        }
    }
}
