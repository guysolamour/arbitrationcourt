<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ReferesTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(RequestsTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
         $this->call(PagesTableSeeder::class);
         $this->call(ConfigurationsTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
