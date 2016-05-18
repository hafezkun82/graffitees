<?php

$status = $session->varIsRegistered("SESSIONID");
if($status){
	$ulvl = $session->getVar("USERLEVEL");
	if($ulvl=="ADMINISTRATOR"){
		include("menu_admin_config.php");
	}/*else if($ulvl=="customer"){
		include("menu_customer_config.php");
	}*/

?>
<DIV class="nav">
<DIV class="table">
<?php
foreach($itds_menu as $record){ ?>
	<UL class="select">
	<LI><A href="<?php echo $record['main_menu_link'];?>"><B><?php echo $record['main_menu_name'];?></B></A>
	<DIV class="select_sub">
		<UL class="sub"><?php
		foreach($record as $value){ 
			if(is_array($value)){
				if($value['sub_menu_name'] <> NULL){ ?>
					<LI><A href="<?php echo $value['sub_menu_link'];?>"><?php echo $value['sub_menu_name'];?></A></LI><?php
				}
			}
		} ?>
		</UL>
	</DIV>
	</LI>
	</UL>
	<DIV class="nav-divider">&nbsp;</DIV><?php
} ?>
<DIV class="clear"></DIV>
</DIV>
<DIV class="clear"></DIV>
</DIV><?php
}
?>