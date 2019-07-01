<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'unknow author',
                'email'     => 'author_unknow@g.g',
                'password'  => bcrypt(str::random(16)),
            ],
            [
                'name'      => 'author',
                'email'     => 'author1@g.g',
                'password'  => bcrypt('123123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
