<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin
             [
                 'full_name'=>'Anukul Admin',
                 'username'=>'Admin',
                 'email'=>'admin@gmail.com',
                 'password'=>Hash::make('1111'),
                 'role'=>'admin',
                 'status'=>'active'

             ],
             //Vendor
             [
                'full_name'=>'Anukul Vendor',
                'username'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'vendor',
                'status'=>'active'

            ],
            //customer
            [
                'full_name'=>'Anukul Customer',
                'username'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'customer',
                'status'=>'active'

            ],
            ]);
    }
}
