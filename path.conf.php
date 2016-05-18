<?php

// select langguage
if (!$lang){
	$lang="my";
}
if (strtolower($lang)=="my"){
  $title="Graffitees";
}
// main image and color configuration
if (!$themePage){
	$themePage="default";
}
if ($themePage=="default") {
	//$bgcolor="#E6EEF9";
	$bgcolor="FFFFFF";
	$bgaccessbar="#2A9FFF";
	$bgleftmenu="#88BEE0";
	$bgticker="#DBEBF8";
	$bgservice="#CCE5F9";
	$bgtabs="#006699";
} 
 
$varThemeUrl 								=	$ROOT_URI . "img/theme/".$themePage."/";
$varScodeUrl 								=	$ROOT_URI . "etc/";

// library path configuration
$varModuleUrl     					=	$ROOT_URI . "_module/";
$varClassUrl 	     					=	$ROOT_PATH . "classes/";
$varEtcUrl 	     						=	$ROOT_PATH . "etc/";
$varScodeUrl 	   						=	$ROOT_PATH . "etc/";
$varNavUrl 	     						=	$ROOT_PATH . "nav\\";
$varJsUrl        						=	$ROOT_URI . "js/";
$varCssUrl       						=	$ROOT_URI . "css/";
$varImgUrl       						=	$ROOT_URI . "images/";
//$varCalendarUrl     			=	$ROOT_URI . "calendar/";
$varCalendarUrl     				=	$ROOT_URI . "jscalendar-1.0/";

// main class configuration
$varLoginClass							=	$varClassUrl . "Login.class.php";
$varSessionManagerClass			=	$varClassUrl . "SessionManager.class.php";
$varPageFactoryClass				=	$varClassUrl . "PageFactory.class.php";
$varDataBaseClass						=	$varClassUrl . "DataBase.class.php";
$varEscapeApostrophyClass		=	$varClassUrl . "EscapeApostrophy.class.php";
$varCurrSelfURLClass				=	$varClassUrl . "CurrSelfURL.class.php";
$varValidateStringClass			=	$varClassUrl . "ValidateString.class.php";
$varModelClass							=	$varClassUrl . "Model.class.php";
$varKeyValidationClass			=	$varClassUrl . "KeyValidation.class.php";

// navigation configuration
$varMenuNav 	    					=	$varNavUrl . "nav.menu.php";
$varSubMenuNav 	    				=	$varNavUrl . "nav.submenu.php";
$varRightNav 								=	$varNavUrl . "nav.right.php";
$varAccessBarNav 						=	$varNavUrl . "nav.accessbar.php";
$varClockNav 	    					=	$varNavUrl . "nav.clock.php";

// calendar configuration
$varCalUrl 	     						=	$ROOT_PATH . "_news\\cal\\";
$varCalConfigUrl 						=	$ROOT_PATH . "_news\\cal\\inc\\config.inc.php";

?>