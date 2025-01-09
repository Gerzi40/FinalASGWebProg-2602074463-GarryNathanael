<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 6; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'gender' => $faker->randomElement(['male', 'female']),
                'interests' => $faker->words(3),
                'linkedin_username' => 'https://www.linkedin.com/in/' . $faker->userName,
                'phone_number' => $faker->randomNumber(8, true),
                'age' => $faker->numberBetween(18, 60),
                'wallet' => 0,
                'coin_wallet' => 100,
                'registfee' => mt_rand(100000, 125000),
            ]);
        }
    }
}
