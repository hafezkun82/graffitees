<?php

/*
*
*	@Author		:	Muhammad Hafez (Hafez_kun)
*	@Title		:	Constant.php
*	@Desc		:	This file is intended to group all constants
*
*/


/*============================================================================================================================================
*
* @Database Constant - these constants are required in order for there to be a successful connection to the MYSQL database
*
*=============================================================================================================================================*/

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "graffitees_db");


/*=============================================================================================================================================
 * 
 * @Table database constant - these constants hold the names of all the database tables 
 * 
 ==============================================================================================================================================*/
 
define("GRAFFITEES_USER_LOGIN", "userlogin");
define("GRAFFITEES_USER_IMG", "graffitees_user_img");
define("GRAFFITEES_PRODUCT", "product");
define("GRAFFITEES_USER_SHOP_CART", "graffitees_user_shop_cart"); 
define("BDE_ORDER", "order"); 

/*   the rest constant value put underneath here   */


?>