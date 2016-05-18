<?php
	
	
	include("../../classes/Product.class.php");
	include("../../classes/DataBase.class.php");
	
	
	$productid = mysql_escape_string($_GET['proid']);
	
	$row = array();
	$productObj = new Product();
	$row = $productObj->getDetailsProduct($productid);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Product Details</h2>
<table width="100%" border="0">
  <tr>
    <td>Code</td>
    <td><?php echo $row['P_CODE']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $row['Prod_Name']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Gender / Size</td>
    <td><?php echo $row['Prod_Option']; ?></td>
    <td>Price</td>
    <td><?php echo "RM".$row['Prod_Price']; ?></td>
    <td>Quantity</td>
    <td><?php echo $row['Prod_QOH']; ?></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><?php echo $row['P_CATEGORY']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td colspan="5"><?php echo $row['P_DESCRIPTION']; ?></td>
  </tr>
  <tr>
    <td colspan="6">
    	<?php
				
				$arrThumb = array();
				
				$arrThumb = explode("|",$row['P_THUMB_NAME']);
				
				$len = count($arrThumb);
				
				for($i=0;$i<$len;$i++){
					$imgthumb = "../../imageupload/thumb/".$arrThumb[$i];
					echo "<img src='$imgthumb' />";
				}
				
		?>
    </td>
  </tr>
</table>
</body>
</html>