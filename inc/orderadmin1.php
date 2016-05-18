<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("../classes/Order.class.php");
include("../classes/DataBase.class.php");

$row = array();
$neworder = new Order();
//$row = $neworder->getAllNewOrder();

?>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" type="text/css" href="../js/jquery.ui.base.css" />
<link rel="stylesheet" type="text/css" href="../js/jquery.ui.theme.css" />
<script type="text/javascript" src="../js/jquery-1.5.min.js"></script>
<script  type="text/javascript" src="../js/jquery-ui-1.8.5.custom.min.js"></script>
<script  type="text/javascript" src="../js/ui/jquery.ui.datepicker.js"></script>
<script  type="text/javascript" src="../js/ui/jquery.ui.core.js"></script>

<DIV id="content">
	<!--  start page-heading -->
	<DIV id="page-heading">
		<H1><?php //echo $mainTitle;?></H1>
	</DIV>
	<!-- end page-heading -->
	<TABLE border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<TR>
		<TH rowspan="3" class="sized"><IMG src="../admin/img/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></TH>
		<TH class="topleft"></TH>
		<TD id="tbl-border-top">&nbsp;</TD>
		<TH class="topright"></TH>
		<TH rowspan="3" class="sized"><IMG src="../admin/img/shared/side_shadowright.jpg" width="20" height="300" alt="" /></TH>
	</TR>
	<TR>
		<TD id="tbl-border-left"></TD>
		<TD>
		<!--  start content-table-inner ...................................................................... START -->
		<DIV id="content-table-inner">
			<!--  start table-content  -->
			<DIV id="table-content">
			<script type="text/javascript">
		
		function winPopUp(url){
			window.open(url, "BDE" ,"width=400px,height=200px,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no");
		}
	
</script>
<h1><a href="<?php echo $_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=ordera"; ?>">Order</a></h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="wrapperpageadmin">
  <div id="neworderdiv">
  	<h2>Paid Order</h2>
   <br/>
<table id="tableproductadmin" border="0">
  <tr>
    <th class="rowHeadertable">CUSTOMER</th>
    <th class="rowHeadertable">ORDER ID</th>
    <th class="rowHeadertable">TOTAL AMOUNT</th>
    <th class="rowHeadertable">TOTAL PYMT</th>
    <th class="rowHeadertable">PYMT METHOD</th>
    <th class="rowHeadertable">PYMT REF ID</th>
    <th class="rowHeadertable">STATUS DELIVERY</th>
    <th class="rowHeadertable">&nbsp;</th>
  </tr>
  <?php
	
	if(is_array($row)){	
		$len = count($row);
  		for($i=0;$i<$len;$i++){
  			
			
		$urlViewInPopup = "../inc/popup/updateorder.php?sid=".$session->getVar("SESSIONID")."&orderid=".$row[$i]['O_ID'];
  ?>
  <tr>
    <td class="rowResulttable"><?php echo $row[$i]['O_USERNAME']; ?></td>
    <td class="rowResulttable"><?php echo $row[$i]['O_ORDER_ID']; ?></td>
    <td class="rowResulttable"><?php echo "RM".$row[$i]['O_BIG_TOTAL_AMOUNT']; ?></td>
    <td class="rowResulttable">
		<?php 
		
			if($row[$i]['O_AMOUNT_PAID'] != "NULL"){
				echo "RM".$row[$i]['O_AMOUNT_PAID']; 
			}else{
				echo "";
			}
			
		?>
    </td>
    <td class="rowResulttable"><?php echo $row[$i]['O_PYMT_METHOD']; ?></td>
    <td class="rowResulttable"><?php echo $row[$i]['O_REF_PYMT_ID']; ?></td>
    <td class="rowResulttable"><?php echo $row[$i]['O_STATUS_DELIVERY']; ?></td>
    <td class="rowResulttable">
    <?php
	
		echo "<a href=\"javascript:winPopUp('".$urlViewInPopup."')\">UPDATE DELIVERY STATUS</a>"; 	
			
	?>
    </td>
  </tr>
  <?php
  
		}
	}else if(is_bool($row)){
  
  ?>
  <tr>
    <td colspan="8" class="rowResulttable">Empty record</td>
    </tr>
  <?php
  
		}
		
  ?>
</table>
	</div>
    <br/>
  <div id="oldorderdiv">
   	  <h2>Order Progress</h2>
   		<br/>
<?php

	$progorder = new Order();
	$rowAll = $progorder->getAllProgressOrder();
	
	//echo gettype($rowAll);

?>
<table id="tableproductadmin" border="0">
  <tr>
    <th class="rowHeadertable">CUSTOMER</th>
    <th class="rowHeadertable">ORDER ID</th>
    <th class="rowHeadertable">TOTAL AMOUNT</th>
    <th class="rowHeadertable">TOTAL PYMT</th>
    <th class="rowHeadertable">PYMT METHOD</th>
    <th class="rowHeadertable">PYMT REF ID</th>
    <th class="rowHeadertable">STATUS DELIVERY</th>
    <th class="rowHeadertable">&nbsp;</th>
  </tr>
   <?php
  		
		
		if(is_array($rowAll)){
			$len2 = count($rowAll);
		
  			for($j=0;$j<$len2;$j++){
				
				$urlUpdateDeliveryStatus = "../inc/popup/updateorder.php?sid=".$session->getVar("SESSIONID")."&orderid=".$row[$j]['O_ID'];
  			
  ?>
  <tr>
    <td class="rowResulttable"><?php echo $rowAll[$j]['O_USERNAME']; ?></td>
    <td class="rowResulttable"><?php echo $rowAll[$j]['O_ORDER_ID']; ?></td>
    <td class="rowResulttable"><?php echo "RM".$rowAll[$j]['O_BIG_TOTAL_AMOUNT']; ?></td>
    <td class="rowResulttable">
    	<?php 
		
			if($rowAll[$j]['O_AMOUNT_PAID'] != "NULL"){
				echo "RM".$rowAll[$j]['O_AMOUNT_PAID']; 
			}else{
				echo "";
			}
			
		?>
    </td>
    <td class="rowResulttable"><?php echo $rowAll[$j]['O_PYMT_METHOD']; ?></td>
    <td class="rowResulttable"><?php echo $rowAll[$j]['O_REF_PYMT_ID']; ?></td>
    <td class="rowResulttable"><?php echo $rowAll[$j]['O_STATUS_DELIVERY']; ?></td>
    <td class="rowResulttable">
    <?php
	
		echo "<a href=\"javascript:winPopUp('".$urlViewInPopup."')\">UPDATE DELIVERY STATUS</a>"; 	
			
	?>
    </td>
  </tr>
  <?php
  	
			}
		}else if(is_bool($rowAll)){
  
  ?>
  <tr>
    <td colspan="8" class="rowResulttable">Empty record</td>
    </tr>
  <?php
  
		}
  
  ?>
</table>
    </div>
    <br/>
</div>


			</DIV>
			<!--  end table-content  -->
			<DIV class="clear"></DIV>
		</DIV>
		<!--  end content-table-inner ............................................END  -->
		</TD>
		<TD id="tbl-border-right"></TD>
	</TR>
	<TR>
		<TH class="sized bottomleft"></TH>
		<TD id="tbl-border-bottom">&nbsp;</TD>
		<TH class="sized bottomright"></TH>
	</TR>
	</TABLE>
	<DIV class="clear">&nbsp;</DIV>
</DIV>
