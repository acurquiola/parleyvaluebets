<?php

use Illuminate\Database\Seeder;

class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('clases')->insert(array (
			'claseID'         => '15',
			'name'           => 'Baseball',
			'maxRepDate' => '2016-04-06',
			'maxRepTime' => '01:54:06'
			
    		));
    }
}
