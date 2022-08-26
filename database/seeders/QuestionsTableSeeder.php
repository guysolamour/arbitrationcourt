<?php
namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class QuestionsTableSeeder extends Seeder
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
            Question::create([

                'title'  => $faker->text(50),
                'uuid'  => $faker->text(50),
                'answer'  => $faker->realText(150),
                'online'  => $faker->randomElement([true, false]),

            ]);

        }
    }
}
