<?php
namespace Database\Seeders;

use App\Models\Refere;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ReferesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            Refere::create([
                'name'  => $faker->name(),
                'email'  => $faker->safeEmail(),
                'phone_number'  => $faker->phoneNumber(),
                'job'  => $faker->jobTitle(),
                'about'  => $faker->realText(150),
            ]);

        }
    }
}
