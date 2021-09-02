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
            'contact_num' => null,
            'address' => null,
            'gender' => 'Male',
            'password' => bcrypt('password'),   
            'Admin' => true,
        ]);

        User::create([
            'fname' => 'Paolo',
            'mname' => 'Paosho',
            'lname' => 'Palacio',
            'email' => 'secretary@gmail.com',
            'age' => null,
            'birth_date' => null,
            'contact_num' => null,
            'address' => null,
            'gender' => 'Male',
            'password' => bcrypt('password'),
            'Secretary' => true,
        ]);

        User::create([
            'fname' => 'Ken',
            'mname' => 'DigizDigiz',
            'lname' => 'Dignos',
            'email' => 'manager@gmail.com',
            'age' => null,
            'birth_date' => null,
            'contact_num' => null,
            'address' => null,
            'gender' => 'Male',
            'password' => bcrypt('password'),
            'Manager' => true,
        ]);

        User::create([
            'fname' => 'Seth',
            'mname' => 'Alfredo',
            'lname' => 'Pacaro',
            'email' => 'seth@gmail.com',
            'age' => null,
            'birth_date' => null,
            'contact_num' => null,
            'address' => null,
            'gender' => 'Male',
            'password' => bcrypt('password'),
            'Customer' => true
        ]);

    }
}
