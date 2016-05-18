<?php


ob_start();

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include("../../classes/DataBase.class.php");
include("../../classes/Product.class.php");
include("../../classes/Order.class.php");

$db = DataBase::getInstance();


$typeReport = $_GET['type'];
$category = $_GET['category'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.headerreport {
	text-align: center;
	font-size: 24px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.headerreport2 {
	text-align: center;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	color: #900;
	font-weight: bold;
}
.headerreport3 {
	text-align: center;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.rowemp {
	font-size: 12px;
	font-weight: bold;
	color: #c3c3c3;
}


#rowlineblack{
	border-bottom:1px solid #000000;	
}

.labelreport {
	font-size: 14px;
	font-family: Tahoma, Geneva, sans-serif;
	background-color:#CCCCCC;
	padding:15px;
	font-weight:bold;
}

</style>
</head>
<body>
<?php

	if($typeReport == "category"){
		
		$proObj = new Product();
		$rowpro = $proObj->getProductByCategory($category);

?>
<table width="100%" border="0">
  <tr>
    <td colspan="6" class="headerreport">BUTIK D'SERI </td>
  </tr>
  <tr>
    <td colspan="6" class="headerreport2">Report</td>
  </tr>
  <tr>
    <td colspan="6" class="headerreport3">&nbsp;</td>
  </tr>
  <tr>
    <td width="24%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
    	<div id="rowlineblack">
        
        </div>
    </td>
  </tr>
  <tr>
    <td class="labelreport">Items </td>
    <td class="labelreport">Product Code</td>
    <td class="labelreport">Product Category</td>
    <td class="labelreport">Product Price</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  		
		$len = count($rowpro);
  		for($i=0;$i<$len;$i++){
			
		
  ?>
  <tr>
    <td class="rowemp"><?php echo $rowpro[$i]['P_NAME']; ?></td>
    <td class="rowemp"><?php echo $rowpro[$i]['P_CODE']; ?></td>
    <td  class="rowemp"><?php echo $rowpro[$i]['P_CATEGORY']; ?></td>
    <td  class="rowemp"><?php echo $rowpro[$i]['P_PRICE']; ?></td>
    <td  class="rowemp">&nbsp;</td>
    <td  class="rowemp">&nbsp;</td>
  </tr>
  <?php
  		
		}
  
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
    	<div id="rowlineblack">
        
        </div>
    </td>
  </tr>
</table>
<?php
	
	}else if($typeReport == "delivery"){
		$orderObj = new Order();

		$deliverystatus = $_GET['deliverystatus'];
		
		if($deliverystatus == "Delivery"){
			$roworder = $orderObj->getAllOrderDelivery();
		}else if($deliverystatus == "Pending"){
			$roworder = $orderObj->getAllOrderPending();
		}

?>
<table width="100%" border="0">
  <tr>
    <td colspan="6" class="headerreport">BUTIK D'SERI </td>
  </tr>
  <tr>
    <td colspan="6" class="headerreport2">Report</td>
  </tr>
  <tr>
    <td colspan="6" class="headerreport3">&nbsp;</td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="39%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
    	<div id="rowlineblack">
        
        </div>
    </td>
  </tr>
  <tr>
    <td class="labelreport">Order ID</td>
    <td class="labelreport">User</td>
    <td class="labelreport">Payment Status</td>
    <td class="labelreport">Payment Method</td>
    <td class="labelreport">Status Delivery</td>
    <td class="labelreport">&nbsp;</td>
  </tr>
  <?php
  		
		$len = count($roworder);
  		for($i=0;$i<$len;$i++){
			
		
  ?>
  <tr>
    <td  class="rowemp"><?php echo $roworder[$i]['O_ORDER_ID']; ?></td>
    <td  class="rowemp"><?php echo $roworder[$i]['O_USERNAME']; ?></td>
    <td  class="rowemp"><?php echo $roworder[$i]['O_STATUS_PAYMENT']; ?></td>
    <td  class="rowemp"><?php echo $roworder[$i]['O_PYMT_METHOD']; ?></td>
    <td  class="rowemp"><?php echo $roworder[$i]['O_STATUS_DELIVERY']; ?></td>
    <td  class="rowemp">&nbsp;</td>
  </tr>
  <?php
  		
		}
  
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
    	<div id="rowlineblack">
        
        </div>
    </td>
  </tr>
</table>
<?php
	
	}

?>	
</body>
</html>