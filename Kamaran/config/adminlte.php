<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Title
	|--------------------------------------------------------------------------
	|
	| The default title of your admin panel, this goes into the title tag
	| of your page. You can override it per page with the title section.
	| You can optionally also specify a title prefix and/or postfix.
	|
	*/

	'title' => 'Kamaran SIMS',

	'title_prefix' => '',

	'title_postfix' => '',

	/*
	|--------------------------------------------------------------------------
	| Logo
	|--------------------------------------------------------------------------
	|
	| This logo is displayed at the upper left corner of your admin panel.
	| You can use basic HTML here if you want. The logo has also a mini
	| variant, used for the mini side bar. Make it 3 letters or so
	|
	*/

	'logo' => '<b>Kamaran</b>SIMS',

	'logo_mini' => '<b>K</b>SIMS',

	/*
	|--------------------------------------------------------------------------
	| Skin Color
	|--------------------------------------------------------------------------
	|
	| Choose a skin color for your admin panel. The available skin colors:
	| blue, black, purple, yellow, red, and green. Each skin also has a
	| ligth variant: blue-light, purple-light, purple-light, etc.
	|
	*/

	'skin' => 'blue-light',

	/*
	|--------------------------------------------------------------------------
	| Layout
	|--------------------------------------------------------------------------
	|
	| Choose a layout for your admin panel. The available layout options:
	| null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
	| removes the sidebar and places your menu in the top navbar
	|
	*/

	'layout' => null,

	/*
	|--------------------------------------------------------------------------
	| Collapse Sidebar
	|--------------------------------------------------------------------------
	|
	| Here we choose and option to be able to start with a collapsed side
	| bar. To adjust your sidebar layout simply set this  either true
	| this is compatible with layouts except top-nav layout option
	|
	*/

	'collapse_sidebar' => false,

	/*
	|--------------------------------------------------------------------------
	| URLs
	|--------------------------------------------------------------------------
	|
	| Register here your dashboard, logout, login and register URLs. The
	| logout URL automatically sends a POST request in Laravel 5.3 or higher.
	| You can set the request to a GET or POST with logout_method.
	| Set register_url to null if you don't want a register link.
	|
	*/

	'dashboard_url' => '',

	'logout_url' => 'logout',

	'logout_method' => null,

	'login_url' => 'login',

	'register_url' => 'register',

	/*
	|--------------------------------------------------------------------------
	| Menu Items
	|--------------------------------------------------------------------------
	|
	| Specify your menu items to display in the left sidebar. Each menu item
	| should have a text and and a URL. You can also specify an icon from
	| Font Awesome. A string instead of an array represents a header in sidebar
	| layout. The 'can' is a filter on Laravel's built in Gate functionality.
	|
	*/

	// if user is Manager
	'menu'         => [
		'MAIN NAVIGATION',
		[
			'text'    => 'Dashboard', // manager
			'icon'    => 'tachometer',
			'can'     => 'admin||manager',
			'submenu' => [
				[
					'text' => 'Overview', // manager
					'icon' => 'eye',
					'url'  => '/',
				],
                [
                    'text' => 'Inventory Balance', // manager
                    'icon' => 'archive',
                    'url'  => '/inventory_balance'
                ],
			]

		],
		[
			'text'    => 'Apps', // manager + employee + employee_of_suppliers
			'icon'    => 'wrench',
			'submenu' => [

				[
					'text'    => 'Categories',
					'icon'    => 'archive',
					'can'  => 'admin',
					'submenu' => [
						[
							'text' => 'Add Category', // Admin
							'icon' => 'archive',
							'url'  => '/category/create',
							'can'  => 'admin'
						],
						[
							'text' => 'Manage Categories', // Admin
							'icon' => 'archive',
							'url'  => '/category',
							'can'  => 'admin'
						],
					]
				],
				[
					'text'    => 'Items',
					'icon'    => 'gears',
					'can'  => 'admin||supplier',
					'submenu' => [
						[
							'text' => 'Add Item', // manager + employee + employee_of_suppliers
							'icon' => 'gears',
							'url'  => '/item/create',
							'can'  => 'admin||supplier'
						],
						[
							'text' => 'Manage Items', // manager + employee + employee_of_suppliers
							'icon' => 'gears',
							'url'  => '/item',
							'can'  => 'admin||supplier'
						],
					]
				],
				[
					'text'    => 'Orders',
					'icon'    => 'file',
					'can'  => 'admin||manager||employee',
					'submenu' => [

						[
							'text' => 'Fill Order', // manager
							'icon' => 'file',
							'url'  => '/fill_order',
							'can'  => 'admin||manager||employee'
						],
						[
							'text' => 'Review Orders', // manager
							'icon' => 'file',
							'url'  => '/review_orders',
							'can'  => 'admin||manager||employee'
						],
					]
				],
                [
                    'text'    => 'Shipments',
                    'icon'    => 'ship',
                    'can'  => 'admin||manager||employee',
                    'submenu' => [
                        [
                            'text' => 'Track Shipments', // manager
                            'icon' => 'ship',
                            'url'  => '/track_shipments',
                            'can'  => 'admin||manager||employee'
                        ],
                        [
                            'text' => 'Shipments Status', // manager
                            'icon' => 'ship',
                            'url'  => '/shipments_status',
                            'can'  => 'admin||manager||employee'
                        ],
                    ],
                ],
                [
                    'text'    => 'Inventory',
                    'icon'    => 'cubes',
                    'can'  => 'admin||manager||employee||inventory',
                    'submenu' => [
                        [
                            'text' => 'Incoming Shipments',
                            'icon' => 'cubes',
                            'url'  => '/inventory_incoming_shipments',
                            'can'  => 'admin||inventory'
                        ],
                        [
                            'text' => 'Make Transaction', // manager(adds stuff) + employee (adds stuff) + inventory_employee
                            'icon' => 'cubes',
                            'url'  => '/inventory_transaction',
                            'can'  => 'admin||inventory'
                        ],
                        [
                            'text' => 'Inventory Reports', // manager(adds stuff) + employee (adds stuff) + inventory_employee
                            'icon' => 'cubes',
                            'url'  => '/inventory',
                            'can'  => 'admin||manager||employee||inventory'
                        ],
                    ]
                ],
                [
                    'text'    => 'Suppliers',
                    'icon'    => 'users',
                    'can'  => 'admin||supplier',
                    'submenu' => [
                        [
                            'text' => 'Add Supplier', // manager + employee + employee_of_suppliers
                            'icon' => 'users',
                            'url'  => '/supplier/create',
                            'can'  => 'admin||supplier'
                        ],

                        [
                            'text' => 'Manage Suppliers', // manager + employee + employee_of_suppliers
                            'icon' => 'users',
                            'url'  => '/supplier',
                            'can'  => 'admin||supplier'
                        ],
                    ]
                ],

			]

		],
		[
			'text'    => 'Staff Management',
			'icon'    => 'cog',
			'submenu' => [
				[
					'text' => 'My Profile', // manager + employee + employee_of_suppliers
					'icon' => 'user',
					'url'  => '/profile'
				],
				[
					'text' => 'Add Employee', // manager + employee_of_suppliers + employee
					'icon' => 'users',
					'url'  => '/employee',
					'can'  => 'admin||manager'
				],
				[
					'text' => 'Manage Employees', // manager + employee_of_suppliers
					'icon' => 'users',
					'url'  => '/manage_employees',
					'can'  => 'admin||manager'
				],

				[
					'text' => 'My Manager', // employee
					'icon' => 'users',
					'url'  => '/my_manager',
					'can'  => 'employee'
				]

			]
		],
        [
            'text' => 'About/Help', // employee
            'icon' => 'info-circle',
            'url'  => '/about'

        ]
	],

	/*
	|--------------------------------------------------------------------------
	| Menu Filters
	|--------------------------------------------------------------------------
	|
	| Choose what filters you want to include for rendering the menu.
	| You can add your own filters to this array after you've created them.
	| You can comment out the GateFilter if you don't want to use Laravel's
	| built in Gate functionality
	|
	*/

	'filters' => [
		JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
	],

	/*
	|--------------------------------------------------------------------------
	| Plugins Initialization
	|--------------------------------------------------------------------------
	|
	| Choose which JavaScript plugins should be included. At this moment,
	| only DataTables is supported as a plugin. Set the value to true
	| to include the JavaScript file from a CDN via a script tag.
	|
	*/

	'plugins' => [
		'datatables' => true,
		'select2'    => true,
		'chartjs'    => true,
	],
];
