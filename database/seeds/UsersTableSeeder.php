<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Вася Пупкин',
                'email' => 'vasya@a.com',
                'password' => bcrypt(Str::random())
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@a.com',
                'password' => bcrypt(1234)
            ],
        ];

        DB::table('users')->insert($users);
    }
}
