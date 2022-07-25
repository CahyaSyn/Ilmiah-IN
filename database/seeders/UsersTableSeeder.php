<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'id' => 1,
                'name' => 'Azis',
                'email' => 'Azis@admin.com',
                'password' => bcrypt('development'),
                'role' => 'admin',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Cahya',
                'email' => 'Cahya@admin.com',
                'password' => bcrypt('development'),
                'role' => 'admin',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Saif',
                'email' => 'Saif@admin.com',
                'password' => bcrypt('development'),
                'role' => 'admin',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Danu',
                'email' => 'Danu@admin.com',
                'password' => bcrypt('development'),
                'role' => 'admin',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'Candia',
                'email' => 'Candia@admin.com',
                'password' => bcrypt('development'),
                'role' => 'admin',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'name' => 'Azis',
                'email' => 'Azis@user.com',
                'password' => bcrypt('development'),
                'role' => 'user',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'Cahya',
                'email' => 'Cahya@user.com',
                'password' => bcrypt('development'),
                'role' => 'user',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'Saif',
                'email' => 'Saif@user.com',
                'password' => bcrypt('development'),
                'role' => 'user',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'Danu',
                'email' => 'Danu@user.com',
                'password' => bcrypt('development'),
                'role' => 'user',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 10,
                'name' => 'Candia',
                'email' => 'Candia@user.com',
                'password' => bcrypt('development'),
                'role' => 'user',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
