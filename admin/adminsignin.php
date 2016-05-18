<?php

include("../config.inc.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<TITLE>GRAFFITEES.com | Admin Login</TITLE>
<LINK rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<SCRIPT src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></SCRIPT>

<!-- Custom jquery scripts -->
<SCRIPT src="js/jquery/custom_jquery.js" type="text/javascript"></SCRIPT>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<SCRIPT src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</SCRIPT>
</HEAD>
<BODY id="login-bg"> 
 
<!-- Start: login-holder -->
<DIV id="login-holder">
	<!-- start logo -->
	<DIV id="logo-login">
		<!--<A HREF="index.html"><IMG SRC="images/shared/logo.png" WIDTH="156" HEIGHT="40" ALT="" /></A>-->
		GRAFFITEES.com | Admin Login
	</DIV>
	<!-- end logo -->
	<DIV class="clear"></DIV>
	<!--  start loginbox ................................................................................. -->
	<DIV id="loginbox">
	<!--  start login-inner -->
	<DIV id="login-inner">
		<FORM id="loginForm" name="loginForm" method="post" action="index.php">
		GRAFFITEES.com | Admin Login<br /><br />
    <TABLE border="0" cel
lpadding="0" cellspacing="0">
		<TR>
    	<TH>Username</TH>
			<TD><INPUT type="text"  class="login-inp" name="usernameTxt" /></TD></TR>
		<TR>
			<TH>Password</TH>
			<TD><INPUT type="password" value="************"  onfocus="this.value=''" class="login-inp" name="passwordTxt" /></TD></TR>
		<!--<TR>
			<TH></TH>
			<TD valign="top"><INPUT type="checkbox" class="checkbox-size" id="login-check" /><LABEL for="login-check">Remember me</LABEL></TD></TR>-->
		<TR>
			<TH></TH>
			<TD><INPUT type="submit" class="submit-login" value="Daftar Masuk" name="btnLogin" /></TD></TR>
		</TABLE>
		</FORM>
	</DIV>
 	<!--  end login-inner -->
	<!--<DIV class="clear"></DIV>
	<A href="" class="forgot-pwd">Forgot Password?</A>
 	</DIV>-->
 	<!--  end loginbox -->
	<!--  start forgotbox ................................................................................... -->
	<DIV id="forgotbox">
		<DIV id="forgotbox-text">Please send us your email and we'll reset your password.</DIV>
		<!--  start forgot-inner -->
		<DIV id="forgot-inner">
		<TABLE border="0" cellpadding="0" cellspacing="0">
		<TR>
			<TH>Email address:</TH>
			<TD><INPUT type="text" value="" class="login-inp" /></TD>
		</TR>
		<TR>
			<TH> </TH>
			<TD><INPUT type="button" class="submit-login" /></TD>
		</TR>
		</TABLE>
		</DIV>
		<!--  end forgot-inner -->
		<DIV class="clear"></DIV>
		<A href="" class="back-login">Back to login</A>
	</DIV>
	<!--  end forgotbox -->
</DIV>
<!-- End: login-holder -->
</BODY>
</HTML>