<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->create([
            'level_id' => 1,
            'name' => 'Yoni Widhi',
            'username' => 'yoniwidhi',
            'email' => 'admin@admin.com',
            'password' => bcrypt('thispassword'),
        ]);
        DB::table('users')->create([
            'level_id' => 2,
            'name' => 'Petugas 1',
            'username' => 'petugas1',
            'email' => 'petugas@petugas.com',
            'password' => bcrypt('thispassword'),
        ]);
    }
}
