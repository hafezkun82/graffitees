<?php


$orderid = $_GET['orderid'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORDER SLIP</title>
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">Order Slip</td>
  </tr>
  <tr>
    <td colspan="2">Please keep this in safe place for future referrence</td>
  </tr>
  <tr>
    <td width="26%">your order id number is :</td>
    <td width="74%"><?php echo $orderid; ?></td>
  </tr>
</table>

</body>
</html>