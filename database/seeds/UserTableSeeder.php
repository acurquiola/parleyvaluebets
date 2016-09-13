<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('users')->insert(array (
            'username'    => 'Admin',
            'name'        => 'Administrador',
            'email'       => 'admin@parleyvaluebets.com',
            'password'    => \Hash::make('admin'),
            'tipoUsuario' => 'admin',
            'status'      => 1,		

    		));
    }
}
