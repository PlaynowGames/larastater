<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@laravel.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('roles')->insert([
            'name' => "admin",
            'display_name' => 'User Administrator',
            'description' => 'User is allowed to manage and edit other users',
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
