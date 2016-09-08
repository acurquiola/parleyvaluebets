<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('types')->insert(array (
			'typeID'         => '226',
			'name'           => 'MLB',
			'lastUpdateDate' => '2016-04-06',
			'lastUpdateTime' => '01:54:06',
			'clase_id'       => '1',
			
    		));
    }
}
