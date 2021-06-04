<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            [
                'name' => 'Abdul Mozid',
                'email' => 'mozid.it@gmail.com',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'Samira Bithi',
                'email' => 'samirabithi0648@gmail.com',
                'password' => Hash::make('123456')
            ]
        ]);
    }
}
