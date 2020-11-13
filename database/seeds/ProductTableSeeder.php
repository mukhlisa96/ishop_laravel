<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    	DB::table('products')->insert([

			[	'code'=> 'iphone_x_64', 
				'description'=> 'Отличный продвинутый телефон с памятью на 64 gb', 
				'image'=>'products/p_img.jpg',
				'name'=>'iPhone X 64GB',
				'price'=> 71990,
				'category_id'=> 1,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'iphone_x_256', 
				'description'=> 'Отличный продвинутый телефон с памятью на 256 gb', 
				'image'=>'products/p_img.jpg',
				'name'=>'iPhone X 256GB',
				'price'=> 89990,
				'category_id'=> 1,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'htc_one_s', 
				'description'=> 'Зачем платить за лишнее? Легендарный HTC One S', 
				'image'=>'products/p_img.jpg',
				'name'=>'HTC One S',
				'price'=> 12490,
				'category_id'=> 2,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'iphone_5se', 
				'description'=> 'Отличный классический iPhone', 
				'image'=>'products/p_img.jpg',
				'name'=>'iPhone 5SE',
				'price'=> 17221,
				'category_id'=> 1,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'beats_audio', 
				'description'=> 'Отличный звук от Dr. Dre', 
				'image'=>'products/p_img.jpg',
				'name'=>'Наушники Beats Audio',
				'price'=> 20221,
				'category_id'=> 2,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'gopro', 
				'description'=> 'Снимай самые яркие моменты с помощью этой камеры', 
				'image'=>'products/p_img.jpg',
				'name'=>'Камера GoPro',
				'price'=> 12000,
				'category_id'=> 2,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'delongi', 
				'description'=> 'Хорошее утро начинается с хорошего кофе!', 
				'image'=>'products/p_img.jpg',
				'name'=>'Кофемашина DeLongi',
				'price'=> 25200,
				'category_id'=> 3,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'haier', 
				'description'=> 'Для большой семьи большой холодильник!', 
				'image'=>'products/p_img.jpg',
				'name'=>'Холодильник Haier',
				'price'=> 40200,
				'category_id'=> 3,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'moulinex', 
				'description'=> 'Для самых смелых идей', 
				'image'=>'products/p_img.jpg',
				'name'=>'Блендер Moulinex',
				'price'=> 4200,
				'category_id'=> 3,
				'count'=>rand(0, 10),
			],

			[	'code'=> 'bosch', 
				'description'=> 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!', 
				'image'=>'products/p_img.jpg',
				'name'=>'Мясорубка Bosch',
				'price'=> 9200,
				'category_id'=> 3,
				'count'=>rand(0, 10),
			],


			[	'code' =>'panasonic_hc-v770',  
				'description'=>'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!', 
				'image'=>'products/p_img.jpg',
				'name'=>'Камера Panasonic HC-V770', 
				'price'=> 27900,
				'category_id'=> 2,
				'count'=>rand(0, 10),
			],

		]);
	}
}
