<?php
$day=date("l");
switch($day){
  case "Monday":
	$day="Isnin";
	break;
  case "Tuesday":
    $day="Selasa";
	break;
  case "Wednesday":
    $day="Rabu";
	break;
  case "Thursday":
    $day="Khamis";
	break;
  case "Friday":
    $day="Jumaat";
	break;
  case "Saturday":
    $day="Sabtu";
	break;
  case "Sunday":
    $day="Ahad";
	break;
}
$mth=date("m");
switch($mth){
  case "01":
  	$mth="Januari";
	break;
  case "02":
    $mth="Februari";
	break;
  case "03":
    $mth="Mac";
	break;
  case "04":
    $mth="April";
	break;
  case "05":
    $mth="Mei";
	break;
  case "06":
    $mth="Jun";
	break;
  case "07":
    $mth="Julai";
	break;
  case "08":
    $mth="Ogos";
	break;
  case "09":
    $mth="September";
	break;
  case "10":
    $mth="Oktober";
	break;
  case "11":
    $mth="November";
	break;
  case "12":
  	$mth="Disember";
	break;
}
if (!$lang){
	$lang="my";
}
if ($lang=="my"){
	$tarikh=$day.", ".date("d")." ".$mth." ".date("Y");
	$contact="Hotline";
	$help="Bantuan";
	$fback="Maklumbalas Portal";
	$smap="Peta Laman";
	$color="Warna";
	$dict="English";
	$link="en";
	} else {
	$tarikh=date("l, d F Y");
	$contact="Hotline";
	$help="Helpdesk";
	$fback="Portal Feedback";
	$smap="Sitemap";
	$color="Color";
	$dict="Bahasa Malaysia";
	$link="my";
}
$status = $session->varIsRegistered("USERNAME");

if($status){
$ulvl = $session->getVar("userlevel");
if($ulvl==1){
	$level = "Administrator";
}else if($ulvl==2){
	$level = "Moderator";
}else if($ulvl==3){
	$level = "Guest";
}
?>
<TABLE width="100%" height="20" border="0" cellpadding="0" cellspacing="5" background="<?php echo $varThemeUrl;?>blue_transparent.png">
  <TR>
    <TD><DIV align="left" class="sectionHeader"><?php echo $tarikh;?> | <?php include $varClockNav; ?><br />
      Welcome <b><?php echo $level;?></b>, you are logged in.</DIV></TD>
    <TD><DIV align="right" class="sectionHeader">
      <a class="abar" href="<?php echo $ROOT_URI;?>?action=logout">Logout</a></DIV></TD>
  </TR>
</TABLE><?php
}else{ ?>
<TABLE width="100%" height="20" border="0" cellpadding="0" cellspacing="5" background="<?php echo $varThemeUrl;?>blue_transparent.png">
  <TR>
    <TD><DIV align="left" class="sectionHeader"><?php echo $tarikh;?> | <?php include $varClockNav; ?></DIV></TD>
    <TD><DIV align="right" class="sectionHeader">
      <a class="abar" href="<?php echo $ROOT_URI;?>_wmtool/faq.php?lang=<?php echo $lang;?>&themePage=<?php echo $themePage;?>"><?php echo $help;?></a></DIV></TD>
  </TR>
</TABLE><?php
}
