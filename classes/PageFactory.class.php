<?php

/*
*
*	@Author			:		Muhammad Hafez Besharuddin (hafez_kun)
*	@Title			:		Abstract Module Factory pattern class 
*	@Date/time	:		10 December 2011
*	@desc				:		Handling tight coupling between Graffitees pagesite 
*
*/

//include("ValidateString.class.php");

class PageFactory{
 
    static function Create($pagename){	
		//$pagename = ValidateString::validateStr($pagename);
		  switch($pagename){
			  case "mainsite": 
				  return "inc/mainsite.php";
				/*case "dashboardadmin": 
				  return "../inc/dashboardadmin.php";*/
				case "productlist": 
				  return "../inc/productlist.php";
				case "vieworder": 
				  return "../inc/orderadmin1.php";
				case "vieworder1": 
				  return "../inc/vieworder1.php";
				case "ordera": 
				  return "../inc/orderadmin1.php";
				case "shop_tshirt": 
				  return "inc/shop_tshirt.php";
				case "shop_tshirt_details": 
				  return "inc/shop_tshirt_details.php";
			  /*case "shopcart": 
				  return "inc/cart.php";
			  case "productadmin": 
				  return "../inc/productadmin.php";
			  case "feedbackadmin": 
				  return "../inc/feedbackadmin.php";
			  case "ordera": 
				  return "../inc/orderadmin.php";
			  case "announce": 
				  return "../inc/announce.php";
			  case "report": 
				  return "../inc/report.php";
			  case "signin": 
				  return "inc/login.php";
			  case "about": 
				  return "inc/about.php";
			  case "contactus": 
				  return "inc/contactus.php";
			  case "order": 
				  return "inc/orderstatus.php";
			  case "feedback": 
				  return "inc/feedback.php";*/
			  default: 
				  return "inc/mainsite.php";
		  }
    }
	
}

?>