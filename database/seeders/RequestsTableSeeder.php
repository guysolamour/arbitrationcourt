<?php
namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RequestsTableSeeder extends Seeder
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
            Request::create([

                'title'  => $faker->text(50),
                'uuid'  => $faker->text(50),
                'content'  => $faker->realText(150),
                'defender'  => $faker->realText(150),
                'amount'  => $faker->text(50),
                'online'  => $faker->randomElement([true, false]),
                'applicant_id'  => $faker->text(),
                'defender_id'  => $faker->text(),

            ]);

        }
    }
}
