<?php

ob_start();


include("../../classes/Order.class.php");
include("../../classes/DataBase.class.php");
include("../../classes/SessionManager.class.php");



$oid = $_GET['orderid'];

if(isset($_POST['updateBtn'])){	
	$updateorder = new Order();
	$updateorder->updateDeliveryStatus($oid);
	if($updateorder->isDeliveryUpdate()){
		echo "<a href=\"javascript:self.close();parent.opener.location.reload();\">Close window</a>";
	}
}else{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div id="updateorderdiv">
    <h2>Update Order Delivery</h2>
        <br/>
 <form id="form1" name="form1" method="post" action="">
<table width="100%" border="0">
  <tr>
    <td width="33%">STATUS DELIVERY</td>
    <td width="67%"><label for="statusDeliveryCB"></label>
      <select name="statusDeliveryCB" id="statusDeliveryCB">
        <option value="- Please Select -">- Please Select -</option>
        <option value="DELIVERY">DELIVERY</option>
        <option value="PENDING">PENDING</option>
        </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="updateBtn" id="updateBtn" value="Update" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
 </form>
</div>
</body>
</html>
<?php
	
}

?>