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
            'password' => bcrypt('password'),
            'Admin' => true,
        ]);

        User::create([
            'fname' => 'Paolo',
            'mname' => 'Paosho',
            'lname' => 'Palacio',
            'email' => 'secretary@gmail.com',
            'password' => bcrypt('password'),
            'Secretary' => true,
        ]);

        User::create([
            'fname' => 'Ken',
            'mname' => 'DigizDigiz',
            'lname' => 'Dignos',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('password'),
            'Manager' => true,
        ]);

        User::create([
            'fname' => 'Seth',
            'mname' => 'Alfredo',
            'lname' => 'Pacaro',
            'email' => 'seth@gmail.com',
            'password' => bcrypt('password'),
            'Customer' => true
        ]);

    }
}
