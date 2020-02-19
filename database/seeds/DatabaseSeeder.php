<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(levelSeeder::class);
        $this->call(petugasSeeder::class);
        $this->call(masyarakatSeeder::class);
        $this->call(barangSeeder::class);
    }
}
