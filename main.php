<?php

ob_start();

include("config.inc.php");
include("classes/constant.php");
include $varSessionManagerClass;
include $varPageFactoryClass;
include $varValidateStringClass;
include $varModelClass;
include $varKeyValidationClass;
include $varDataBaseClass;

$LOGINFLAG = false;
$session = NULL;

$session = SessionManager::getInstance();
	
if($session->isStarted()){
	if($session->varIsRegistered("SESSIONID")){
		//echo "TRUE";	
		$LOGINFLAG = true;
	}else{
		//echo "FALSE";
		$LOGINFLAG = false;
	}
}

$action = ValidateString::validateStr($_GET['action']);

if($action == "logout"){
	$session->unRegisterVar("SESSIONID");
	$session->destroy();
	header("Location:index.php");
	$LOGINFLAG = false;	
}

?>
<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="robots" content="noodp,noydir">
<title>GraffiTees | Buy Graffiti T Shirts</title>
<meta name="description" content="Shirts with swagger, designed by humans, voted on daily, from MYR10 up!  Emerging designers &amp; artists submit new designs to be rated by the Design By Humans community.">

<?php
include("inc/header_config.php");
?>
</head>

<body>
<div style="display: none;" id="loading"><img alt="Loading..." src="img/loading.gif" height="32" width="32"></div>
<div id="context-header"></div>

<!-- Container start -->
<div id="container">
	<?php include("inc/header.php"); ?>
	
  <div class="show_verification_msg"></div>
  
	<?php
	$page = ValidateString::validateStr($_GET['pg']);
	
	try{
		$pagesite = PageFactory::Create($page);
		$model = Model::getInstance();
		$model->setObjKey(keyValidation::startValidateKeyDate(),$pagesite);
		if($model->getObjKey()){
			header("Location: inc/acknowledge.php");
		}else{
			include($model->getPgName());	
		}
		
	}catch(Exception $e){
		throw new Exception("Message :".$e->getMessage());
		exit();
	}
	?>
	
  <!-- Login Account start -->
	<?php include("inc/login_account.php"); ?>
  <!-- Login Account end -->
  
  <!-- Register Account start -->
	<?php include("inc/register_account.php"); ?>
	<!-- Register Account end -->
</div>
<!-- Container end -->

<!-- Footer start -->
<?php include("inc/footer.php"); ?>
<!-- Footer end -->

<ul style="z-index: 1; top: 0px; left: 0px; display: none;" aria-activedescendant="ui-active-menuitem" role="listbox" class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all"></ul></body></html>

<?php// include("inc/footer_config.php"); ?>





