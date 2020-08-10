<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{

		\App\Category::create([
			'name' => 'Department of Raw Materials'
		]);
		
		\App\Item::create([
			'name' => 'Tobacco',
			'category_id' => 1,
			'unit' => 'KG',
			'danger_level' => 'normal'
		]);

		\App\User::create([
			'name'     => 'admin',
			'username' => 'admin',
			'email'    => 'admin@kamaran.com',
			'password' => bcrypt('kamaran'),
			'phone'    => '77777771',
			'status'   => 1,
			'gender'   => 'male',
			'level'    => 'admin',
			'address'  => 'Haddah St., XYZ Road, Sana\'a'
		]);
		\App\User::create([
			'name'        => 'yousef',
			'username'    => 'yousef',
			'email'       => 'yousef@kamaran.com',
			'password'    => bcrypt('kamaran'),
			'phone'       => '77772777',
			'status'      => 1,
			'gender'      => 'male',
			'category_id' => 1,
			'level'       => 'manager',
			'address'     => 'Haddah St., XYZ Road, Sana\'a'
		]);
		\App\User::create([
			'name'        => 'rashad',
			'username'    => 'rashad',
			'email'       => 'rashad@kamaran.com',
			'password'    => bcrypt('kamaran'),
			'phone'       => '77777773',
			'status'      => 1,
			'gender'      => 'male',
			'category_id' => 1,
			'level'       => 'employee',
			'address'     => 'Haddah St., XYZ Road, Sana\'a'
		]);
		\App\User::create([
			'name'     => 'anwar',
			'username' => 'anwar',
			'email'    => 'anwar@kamaran.com',
			'password' => bcrypt('kamaran'),
			'phone'    => '77777774',
			'status'   => 1,
			'gender'   => 'male',
			'level'    => 'inventory_employee',
			'address'  => 'Haddah St., XYZ Road, Sana\'a'
		]);
		\App\User::create([
			'name'     => 'employee',
			'username' => 'employee',
			'email'    => 'employee@kamaran.com',
			'password' => bcrypt('kamaran'),
			'phone'    => '77777775',
			'status'   => 1,
			'gender'   => 'male',
			'level'    => 'head_of_suppliers',
			'address'  => 'Haddah St., XYZ Road, Sana\'a'
		]);

//		factory(\App\Order::class, 10)->create();
//
//		factory(\App\Supplier::class, 2)->create()->each(function ($s) {
//			$s->items()->saveMany(factory(\App\Item::class, 5)->make());
//		});
//
//		foreach (\App\Order::where('order_status', 'approved')->get() as $order)
//		{
//			\App\Shipment::create([
//				'order_id'    => $order->id,
//				'user_id'     => 2,
//				'category_id' => 1,
//				'date'        => \Carbon\Carbon::now()->timestamp
//			]);
//		}

	}
}
