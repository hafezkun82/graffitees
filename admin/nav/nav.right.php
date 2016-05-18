<?php 
/*$urlPersonalDetails = $ROOT_URI."?sid=".$param['sid']."&main=MUSRP&contain=viewProfile";
$userLvl = $session->getVar("USERLEVEL");
if($userLvl=="admin"){
	$userRank = "Administrator";
}else{
	$userRank = "Customer";
}*/
?>
<DIV id="nav-right">
<DIV class="nav-divider">&nbsp;</DIV>
<DIV class="showhide-account">
<IMG src="img/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></DIV>
<DIV class="nav-divider">&nbsp;</DIV>
<A href="<?php echo $ROOT_URI;?>?action=logout" id="logout">
<IMG src="img/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></A>
<DIV class="clear">&nbsp;</DIV>
<!--  start account-content -->	
<DIV class="account-content">
<DIV class="account-drop-inner">
	<!--<A href="" id="acc-settings">Settings</A>
	<DIV class="clear">&nbsp;</DIV>
	<DIV class="acc-line">&nbsp;</DIV>-->
	<A href="<?php /*echo $urlPersonalDetails;?>" id="acc-details"><?php echo $userRank;*/?>'s Profile</A>
	<DIV class="clear">&nbsp;</DIV>
	<DIV class="acc-line">&nbsp;</DIV>
	<A href="" id="acc-inbox">Inbox</A><BR />
	<!--<DIV class="clear">&nbsp;</DIV>
	<DIV class="acc-line">&nbsp;</DIV>
	<A href="" id="acc-project">Project details</A>
	<DIV class="clear">&nbsp;</DIV>
	<DIV class="acc-line">&nbsp;</DIV>
	<A href="" id="acc-stats">Statistics</A>-->
</DIV>
</DIV>
<!--  end account-content -->
</DIV>