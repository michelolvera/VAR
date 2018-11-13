<?php

use Illuminate\Database\Seeder;
use ArticulosReligiosos\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Crear administrador
    	$user = new User();
    	$user->name = "Administrador";
    	$user->paternal_surname = "NA";
    	$user->maternal_surname = "NA";
    	$user->email = "admin@mail.com";
    	$user->password = bcrypt('12345678');
    	$user->rfc = "NA";
    	$user->phone_number = "1234567890";
        $user->admin = true;
    	$user->slug = 'admin-account';
    	$user->save();
    }
}
