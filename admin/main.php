<?php

ob_start();

include("../config.inc.php");
include("../classes/constant.php");
include("../classes/ValidateString.class.php");
include("../classes/PageFactory.class.php");
include("../classes/SessionManager.class.php");
include("../classes/Model.class.php");
include("../classes/KeyValidation.class.php");

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
	header("Location: index.php");
	$LOGINFLAG = false;	
}

if($LOGINFLAG==false){
	header("Location: index.php");
	
}else{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<TITLE>GRAFFITEES.com | Graffity T-Shirts Online</TITLE>
<LINK rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--<LINK rel="stylesheet" href="css/screenbde.css" type="text/css" media="screen" title="default" />
--><LINK rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css">
<!--[if IE]>
<LINK REL="stylesheet" MEDIA="all" TYPE="text/css" HREF="css/pro_dropline_ie.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="js/jquery.ui.base.css" />
<link rel="stylesheet" type="text/css" href="js/jquery.ui.theme.css" />
<script type="text/javascript" src="js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.core.js"></script>

<script type="text/javascript">
  swfobject.embedSWF("_module/_product/bin/design.swf?<?php echo time(); ?>", "designeditor", "100%", "680", "9.0.0", "inc/expressInstall.swf");
</script>
<script type="text/javascript" >
  function jsPOPUP(o){
    //alert(o.sessionid+" || "+o.userid);	
    var centerWidth = (window.screen.width - 600) / 2;
      var centerHeight = (window.screen.height - 200) / 2;
    var url = "http://"+window.location.hostname+"/tshirt/inc/popup/uploadimage.php?sid="+o.sessionid+"&userid="+o.userid;
    newWindow = window.open(url, "IMAGE UPLOAD" ,"width=600,height=200,top='+centerHeight+',left='+centerWidth+',toolbar=no,location=yes,directories=no,status=no,menubar=no,scrollbars=no,resizable=0,copyhistory=no");
    newWindow.focus();
  }
</script>
<script type="text/javascript">
  var jsReady = false;
    
  function isReady() { return jsReady; }

  function pageInit() { jsReady = true; }

  function getUserDetails(){
    var userinfo;
    userinfo = "<?php echo $userInfo; ?>";
    return userinfo;
  }
</script>

<!--  jquery core -->
<SCRIPT src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></SCRIPT>
<!--<SCRIPT src="<?php// echo $varJsUrl;?>jquery-1.4.4.min.js" type="text/javascript"></SCRIPT>-->
<SCRIPT src="<?php echo $varJsUrl;?>jquery.validationEngine-bm.js" type="text/javascript" charset="utf-8"></SCRIPT>
<SCRIPT src="<?php echo $varJsUrl;?>jquery.validationEngine.js" type="text/javascript" charset="utf-8"></SCRIPT>
<SCRIPT language="javascript">
<!-- winBRopen BEGIN
function winBRopen(theURL, Name, popW, popH, scroll) { // V 1.0
var winleft = (screen.width - popW) / 2;
var winUp = (screen.height - popH) / 2;
winProp = 'width='+popW+',height='+popH+',left='+winleft+',top='+winUp+',scrollbars='+scroll+',resizable'
Win = window.open(theURL, Name, winProp)
if (parseInt(navigator.appVersion) >= 4) { Win.window.focus(); }

}
// winBRopen END -->

<!-- Validation BEGIN
jQuery(document).ready(function(){
  // binds form submission and fields to the validation engine
  jQuery("#formID").validationEngine();
});

/**
 *
 * @param {jqObject} the field where the validation applies
 * @param {Array[String]} validation rules for this field
 * @param {int} rule index
 * @param {Map} form options
 * @return an error string if validation failed
 */
function checkHELLO(field, rules, i, options){
  if (field.val() != "HELLO") {
    // this allows to use i18 for the error msgs
    return options.allrules.validate2fields.alertText;
  }
}
// Validation END -->
</SCRIPT>

<!--  checkbox styling script -->
<SCRIPT src="js/jquery/ui.core.js" type="text/javascript"></SCRIPT>
<SCRIPT src="js/jquery/ui.checkbox.js" type="text/javascript"></SCRIPT>
<SCRIPT src="js/jquery/jquery.bind.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(function(){
  $('input').checkBox();
  $('#toggle-all').click(function(){
  $('#toggle-all').toggleClass('toggle-checked');
  $('#mainform input[type=checkbox]').checkBox('toggle');
  return false;
  });
});
</SCRIPT>  
<![if !IE 7]>
<!--  styled select box script version 1 -->
<SCRIPT src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function() {
  $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</SCRIPT>
<![endif]>
<!--  styled select box script version 2 --> 
<SCRIPT src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function() {
  $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
  $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</SCRIPT>
<!--  styled select box script version 3 --> 
<SCRIPT src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function() {
  $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</SCRIPT>
<!--  styled file upload script --> 
<SCRIPT src="js/jquery/jquery.filestyle.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "img/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</SCRIPT>
<!-- Custom jquery scripts -->
<SCRIPT src="js/jquery/custom_jquery.js" type="text/javascript"></SCRIPT>
<!-- Tooltips -->
<SCRIPT src="js/jquery/jquery.tooltip.js" type="text/javascript"></SCRIPT>
<SCRIPT src="js/jquery/jquery.dimensions.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(function() {
  $('a.info-tooltip ').tooltip({
    track: true,
    delay: 0,
    fixPNG: true, 
    showURL: false,
    showBody: " - ",
    top: -35,
    left: 5
  });
});
</SCRIPT> 
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<SCRIPT src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</SCRIPT>
</HEAD>
<BODY onload="pageInit();"> 
<!-- Start: page-top-outer -->
<DIV id="page-top-outer">    
<!-- Start: page-top -->
<DIV id="page-top">
  <!-- start logo -->
  <DIV id="logo">
  GRAFFITEES.com | Graffity T-Shirts Online
  <!--<A href=""><IMG src="<?php //echo $varImgUrl;?>shared/logo.png" width="156" height="40" alt="" /></A>-->
  </DIV>
  <!-- end logo -->
  <!--  start top-search -->
  <!--<DIV id="top-search">
    <TABLE border="0" cellpadding="0" cellspacing="0">
    <TR>
    <TD><INPUT type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></TD>
    <TD>
    <SELECT  class="styledselect">
      <OPTION value="">All</OPTION>
      <OPTION value="">Products</OPTION>
      <OPTION value="">Categories</OPTION>
      <OPTION value="">Clients</OPTION>
      <OPTION value="">News</OPTION>
    </SELECT> 
    </TD>
    <TD>
    <INPUT type="image" src="img/shared/top_search_btn.gif"  />
    </TD>
    </TR>
    </TABLE>
  </DIV>-->
  <!--  end top-search -->
  <DIV class="clear"></DIV>
</DIV>
<!-- End: page-top -->
</DIV>
<!-- End: page-top-outer -->
<DIV class="clear">&nbsp;</DIV>
<!--  start nav-outer-repeat................................................................................................. START -->
<DIV class="nav-outer-repeat"> 
<!--  start nav-outer -->
<DIV class="nav-outer"> 
    <!-- start nav-right -->
    <?php include("nav/nav.right.php"); ?>
    <!-- end nav-right -->
    <!--  start nav -->
    <?php include("nav/nav.menu.php"); ?>
    <!--  start nav -->
</DIV>
<DIV class="clear"></DIV>
<!--  start nav-outer -->
</DIV>
<!--  start nav-outer-repeat................................................... END -->
<DIV class="clear"></DIV>
<!-- start content-outer ........................................................................................................................START -->

<!-- start content -->
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
<!--  end content -->
<DIV class="clear">&nbsp;</DIV>
</DIV>
<!--  end content-outer........................................................END -->
<DIV class="clear">&nbsp;</DIV>
<!-- start footer -->         
<DIV id="footer">
  <!--  start footer-left -->
  <DIV id="footer-left">
  All Rights Reserved by GRAFFITEES.com</DIV>
  <!--  end footer-left -->
  <DIV class="clear">&nbsp;</DIV>
</DIV>
<!-- end footer -->
</BODY>
</HTML>
<?php } ?>


