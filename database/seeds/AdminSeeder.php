<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Vincent',
            'mname' => 'Capangpangan',
            'lname' => 'Enriquez',
            'email' => 'admin@gmail.com',
            'age' => null,
            'birth_date' => null,
            'gender' => 'Male',
            'contact_num' => '9334824185',
            'address' => 'Danao',
            'password' => bcrypt('password'),   
            'Admin' => true,
            'is_verified' => true,
        ]);

        User::create([
            'fname' => 'Paolo',
            'mname' => 'Paosho',
            'lname' => 'Palacio',
            'email' => 'secretary@gmail.com',
            'age' => null,
            'birth_date' => null,
            'gender' => 'Male',
            'contact_num' => '9334824185',
            'address' => 'Urgello',
            'password' => bcrypt('password'),
            'Secretary' => true,
            'is_verified' => true,
        ]);

        User::create([
            'fname' => 'Ken',
            'mname' => 'DigizDigiz',
            'lname' => 'Dignos',
            'email' => 'manager@gmail.com',
            'age' => null,
            'birth_date' => null,
            'gender' => 'Male',
            'contact_num' => '9334824185',
            'address' => 'Davao',
            'password' => bcrypt('password'),
            'Manager' => true,
            'is_verified' => true,
        ]);

        User::create([
            'fname' => 'Seth',
            'mname' => 'Alfredo',
            'lname' => 'Pacaro',
            'email' => 'seth@gmail.com',
            'age' => null,
            'birth_date' => null,
            'gender' => 'Male',
            'contact_num' => '9334824185',
            'address' => 'Lapu-Lapu',
            'password' => bcrypt('password'),
            'Customer' => true,
            'is_verified' => false,
        ]);

    }
}
