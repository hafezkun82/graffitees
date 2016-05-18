<?php

$itds_menu[1] = array(
	'main_menu_name' => 'Home',
	'main_menu_code' => 'MDASH',
	'main_menu_link' => $ROOT_URI."?sid=".$param['sid']."&main=MDASH&contain=home"
);
$itds_menu[2] = array(
	'main_menu_name' => 'Product',
	'main_menu_code' => 'MPROD',
	'main_menu_link' => '',
	'arr1'     		 	=> array(
		'sub_menu_name'	=> 'Browse Product Catalog',
		'sub_menu_link' => 'browsecatalog'
	),
	'arr2'     		 	=> array(
		'sub_menu_name'	=> 'Design New Product',
		'sub_menu_link' => 'bin/design'
	),
	'arr3'     		 	=> array(
		'sub_menu_name'	=> 'View My Product',
		'sub_menu_link' => 'myproduct'
	),
	'arr4'     		 	=> array(
		'sub_menu_name'	=> 'View My Image',
		'sub_menu_link' => 'myimage'
	)
);

$itds_menu[3] = array(
	'main_menu_name' => 'Shopping Cart',
	'main_menu_code' => 'MCART',
	'main_menu_link' => '',
	'arr1'     		 	=> array(
		'sub_menu_name'	=> 'View Shopping Cart',
		'sub_menu_link' => 'shopcart'
	)
);

$itds_menu[4] = array(
	'main_menu_name' => 'Track Order',
	'main_menu_code' => 'MORDER',
	'main_menu_link' => '',
	'arr1'     		 	=> array(
		'sub_menu_name'	=> 'Track Order',
		'sub_menu_link' => 'trackorder'
	)
);

?>