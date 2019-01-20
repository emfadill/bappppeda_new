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
         $this->call(jabatan_table_seeder::class);
         $this->call(kabid_table_seeder::class);
         $this->call(subid_table_seeder::class);
         $this->call(user_table_seeder::class);
    }
}
