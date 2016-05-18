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
	<LI><?php
	if($record['main_menu_code'] == 'MDASH'){ ?>
		<A href="main.php?sid=<?php echo $param['sid'];?>"><B><?php echo $record['main_menu_name'];?></B></A><?php
	}else{ ?>
		<A href="<?php echo $record['main_menu_link'];?>"><B><?php echo $record['main_menu_name'];?></B></A><?php
	} ?>
	<DIV class="select_sub">
		<UL class="sub"><?php
		foreach($record as $value){ 
			if(is_array($value)){
				if($value['sub_menu_name'] <> NULL){ ?>
					<LI><A href="<?php echo $ROOT_URI;?>?sid=<?php echo $param['sid'];?>&amp;main=<?php echo $record['main_menu_code'];?>&amp;contain=<?php echo $value['sub_menu_link'];?>"><?php echo $value['sub_menu_name'];?></A></LI><?php
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
/*
<DIV class="nav">
<DIV class="table">
<UL class="current">
<LI><A href="#nogo"><B>Products</B><!--[if IE 7]><!--></A><!--<![endif]-->
<!--[if lte IE 6]><TABLE><TR><TD><![endif]-->
<DIV class="select_sub show">
	<UL class="sub">
		<LI><A href="#nogo">View all products</A></LI>
		<LI class="sub_show"><A href="#nogo">Add product</A></LI>
		<LI><A href="#nogo">Delete products</A></LI>
	</UL>
</DIV>
<!--[if lte IE 6]></TD></TR></TABLE></A><![endif]-->
</LI>
</UL>
<DIV class="nav-divider">&nbsp;</DIV>
<UL class="select">
<LI><A href="#nogo"><B>Categories</B><!--[if IE 7]><!--></A><!--<![endif]-->
<!--[if lte IE 6]><TABLE><TR><TD><![endif]-->
<DIV class="select_sub">
	<UL class="sub">
		<LI><A href="#nogo">Categories Details 1</A></LI>
		<LI><A href="#nogo">Categories Details 2</A></LI>
		<LI><A href="#nogo">Categories Details 3</A></LI>
	</UL>
</DIV>
<!--[if lte IE 6]></TD></TR></TABLE></A><![endif]-->
</LI>
</UL>
<DIV class="nav-divider">&nbsp;</DIV>
<UL class="select">
<LI><A href="#nogo"><B>Clients</B><!--[if IE 7]><!--></A><!--<![endif]-->
<!--[if lte IE 6]><TABLE><TR><TD><![endif]-->
<DIV class="select_sub">
	<UL class="sub">
		<LI><A href="#nogo">Clients Details 1</A></LI>
		<LI><A href="#nogo">Clients Details 2</A></LI>
		<LI><A href="#nogo">Clients Details 3</A></LI>
	</UL>
</DIV>
<!--[if lte IE 6]></TD></TR></TABLE></A><![endif]-->
</LI>
</UL>
<DIV class="nav-divider">&nbsp;</DIV>
<UL class="select">
<LI><A href="#nogo"><B>News</B><!--[if IE 7]><!--></A><!--<![endif]-->
<!--[if lte IE 6]><TABLE><TR><TD><![endif]-->
<DIV class="select_sub">
	<UL class="sub">
		<LI><A href="#nogo">News details 1</A></LI>
		<LI><A href="#nogo">News details 2</A></LI>
		<LI><A href="#nogo">News details 3</A></LI>
	</UL>
</DIV>
<!--[if lte IE 6]></TD></TR></TABLE></A><![endif]-->
</LI>
</UL>
<DIV class="clear"></DIV>
</DIV>
<DIV class="clear"></DIV>
</DIV>


<LINK rel="stylesheet" type="text/css" href="<?php echo $varThemeUrl;?>pro_dropdown.css" />
<SCRIPT src="<?php echo $varThemeUrl;?>stuHover.js" type="text/javascript"></SCRIPT>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#d1d1d1">
  <TR>
    <TD><SPAN class="preload1"></SPAN> <SPAN class="preload2"></SPAN>
        <UL id="nav">
		<?php
		foreach($itds_menu as $record){
		  if($record['main_menu_code'] == 'MHOM'){ ?>
		  	<LI class="top"><A href="main.php?sid=<?php echo $param['sid'];?>" id="kes" class="top_link"><SPAN class="down"><?php echo $record['main_menu_name'];?></SPAN></A><?php
		  }else{ ?>
		    <LI class="top"><A href="<?php echo $record['main_menu_link'];?>" id="kes" class="top_link"><SPAN class="down"><?php echo $record['main_menu_name'];?></SPAN></A><?php
		  } ?>
		  	  <UL class="sub"><?php
			  foreach($record as $value){ 
			    if(is_array($value)){
				  if($value['sub_menu_name'] <> NULL){ ?>	  
				    <LI><A href="<?php echo $ROOT_URI;?>?sid=<?php echo $param['sid'];?>&amp;main=<?php echo $record['main_menu_code'];?>&amp;contain=<?php echo $value['sub_menu_link'];?>" class="fly"><?php echo $value['sub_menu_name'];?></A></LI><?php
				  }
			    }
			  } ?>
			  </UL>
            </LI><?php
		} ?>
        </UL></TD>
  </TR>
</TABLE><?php
}*/ ?>