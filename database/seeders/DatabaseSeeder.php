<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();


        $this->call([
            sportsSeeder::class,
            NationalitySeeder::class,
            AwardsSeeder::class,
            forcesSeeder::class,
            docsSeeder::class,
            GenderSeeder::class,
            categoriesSeeder::class,
            participantSeeder::class,
            CompetenceSeeder::class,
            ScoreSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'gabriel',
            'email' => 'test@test.com',
            'password' => bcrypt(12345678)
        ]);

        Artisan::call('passport:install');
    }
}
