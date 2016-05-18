<?php

$status = $session->varIsRegistered("USERNAME");
if($status){
	$ulvl = $session->getVar("userlevel");
	if($ulvl==1){
		include("menu_admin_config.php");
	}else if($ulvl==2){
		include("menu_moderator_config.php");
	}else if($ulvl==3){
		include("menu_member_config.php");
	}

?>
<LINK rel="stylesheet" media="all" type="text/css" href="<?php echo $varThemeUrl;?>tree_frog_vertical.css" />
<SCRIPT src="<?php echo $varThemeUrl;?>click_hover.js" type="text/javascript"></SCRIPT>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD>
		<!--<BODY onLoad="clickMenu('menu')">-->
		<DIV id="outer">
		  <UL id="menu">
		  <?php
		  foreach($itds_menu as $record){
			if($record['main_menu_code'] == $param['main']){
			  foreach($record as $value){ 
				if(is_array($value)){
				  if($value['sub_menu_name'] <> NULL){ ?>
					<LI class="sub"><A href="<?php echo $ROOT_URI;?>?sid=<?php echo $param['sid'];?>&amp;main=<?php echo $record['main_menu_code'];?>&amp;contain=<?php echo $value['sub_menu_link'];?>"><?php echo $value['sub_menu_name'];?></A></LI><?php
				  }
				}
			  }
			}
		  } ?>
		  </UL>
		</DIV>
</TD></TR></TABLE>
		