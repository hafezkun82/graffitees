<?php
$sessionid = $session->getVar("SESSIONID");

$itds_menu[1] = array(
	'main_menu_name' => 'Home',
	'main_menu_link' => $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=productlist"
);
$itds_menu[2] = array(
	'main_menu_name' => 'Order',
	'main_menu_link' => $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=vieworder"
);
$itds_menu[3] = array(
	'main_menu_name' => 'Stock',
	'main_menu_link' => $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=vieworder"
);
$itds_menu[4] = array(
	'main_menu_name' => 'Customer',
	'main_menu_link' => $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=vieworder"
);
$itds_menu[5] = array(
	'main_menu_name' => 'Report',
	'main_menu_link' => $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=vieworder"
);

?>