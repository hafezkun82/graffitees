<?php

/*
*
*	@Title 	- 	index.php
*	@Desc	-	Acts as a centralize processing...	
*
*/

ob_start();

include("../config.inc.php");
include "../".$varValidateStringClass;
include "../".$varLoginClass;
include "../".$varSessionManagerClass;
include "../".$varDataBaseClass;

if(isset($_POST['btnLogin'])){
	/*			After validation process was done in front end layer			*/
	$userName = ValidateString::validateStr($_POST['usernameTxt']);
	$userPass = ValidateString::validateStr($_POST['passwordTxt']);
		
	$userLogin = new Login();
	$userLogin->checkUserPass($userName,$userPass);
	if($userLogin->statusLogin()){
		if($userLogin->getUserLevel() == "ADMINISTRATOR"){
			header("Location: main.php?sid=".$userLogin->getSessionID()."&pg=dashboardadmin");
		}
	}
}else{
	header("Location: adminsignin.php");	
}

?>