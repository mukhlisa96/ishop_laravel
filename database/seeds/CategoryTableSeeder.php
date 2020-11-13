<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	[
	        	'name' => 'Mobile phones',
	        	'code' => 'mobiles',
	        	'description' => 'description of mobiles',
        		'image' => 'categories/c_img.png'
        	],

        	[
	        	'name' => 'Portable devices',
	        	'code' => 'portable',
	        	'description' => 'description of portable devices',
        		'image' => 'categories/c_img.png'
        	],

        	[
	        	'name' => 'BitoTech',
	        	'code' => 'technics',
	        	'description' => 'description of BitoTech',
        		'image' => 'categories/c_img.png'
        	],


        ]);    
    }
}
