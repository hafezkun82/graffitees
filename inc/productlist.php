<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("../classes/Order.class.php");
include("../classes/DataBase.class.php");
include("../classes/Product.class.php");
include("../classes/CBUtility.class.php");


//$row = array();
//$neworder = new Order();
//$row = $neworder->getAllNewOrder();



$action = mysql_escape_string($_GET['action']);

$productid = mysql_escape_string($_GET['proid']);


$dashboardUrlHome = $_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=dashboard";
$productUrlHome = $_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=productadmin";


if(isset($_POST['btnAddProduct'])){
	$productObj = new Product();
	$productObj->addProduct();
}

if(isset($_POST['updateProBtn'])){
	
	$upProObj = new Product();
	$upProObj->updateProductDetails();
	
}

if($action == "delproduct"){
	$delProObj = new Product();
	$delProObj->deleleProductDetails($productid);
}
/*
if($action != "productadd"){
    echo "<h1><a href='$dashboardUrlHome'>Dashboard</a> <span class='arrow'>>></span> <span>Product</span></h1>";
}else if($action == "productadd"){
    echo "<h1><a href='$dashboardUrlHome'>Dashboard</a> <span class='arrow'>>></span> <a href='$productUrlHome'>Product</a> <span class='arrow'>>></span><span>Add Product</span></h1>";
}
*/
?>
<script type="text/javascript">
		
		$(document).ready(function(){	
			/*		Normal Size		*/
			$('#addSBtn').click(function() {
				var num	= $('.clonedInput').length;
				var newNum	= new Number(num + 1);

				var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
	
				newElem.children(':first').attr('id', 'prosize' + newNum).attr('name', 'prosize' + newNum);
				$('#input' + num).after(newElem);
				$('#removeSBtn').attr('disabled','');

				if (newNum == 50)
					$('#addSBtn').attr('disabled','disabled');
			});

			$('#removeSBtn').click(function() {
				var num	= $('.clonedInput').length;

				$('#input' + num).remove();
				$('#addSBtn').attr('disabled','');

				if (num-1 == 1)
					$('#removeSBtn').attr('disabled','disabled');
			});

			$('#removeSBtn').attr('disabled','disabled');
			
			
			/*		Extra Size		*/
			$('#addSXBtn').click(function() {
				var num	= $('.clonedInputt').length;
				var newNum	= new Number(num + 1);

				var newElem = $('#inputt' + num).clone().attr('id', 'inputt' + newNum);
	
				newElem.children(':first').attr('id', 'proxsize' + newNum).attr('name', 'proxsize' + newNum);
				$('#inputt' + num).after(newElem);
				$('#removeSXBtn').attr('disabled','');

				if (newNum == 50)
					$('#addSXBtn').attr('disabled','disabled');
			});

			$('#removeSXBtn').click(function() {
				var num	= $('.clonedInputt').length;

				$('#inputt' + num).remove();
				$('#addSXBtn').attr('disabled','');

				if (num-1 == 1)
					$('#removeSXBtn').attr('disabled','disabled');
			});

			$('#removeSXBtn').attr('disabled','disabled');
			
		});
		
</script>


<script type="text/javascript">
		
		function winPopUp(url){
			window.open(url, " " ,"width=600px,height=600px,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no");
		}
	
</script>

<script type="text/javascript">
		
		function sizeChartPopUp(url){
			window.open(url, " " ,"width=400px,height=500px,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no");
		}
	
</script>
<!--<link rel="stylesheet" href="../admin/css/screen.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" type="text/css" href="../admin/js/jquery.ui.base.css" />
<link rel="stylesheet" type="text/css" href="../admin/js/jquery.ui.theme.css" />
<script type="text/javascript" src="../admin/js/jquery-1.5.min.js"></script>
<script  type="text/javascript" src="../admin/js/jquery-ui-1.8.5.custom.min.js"></script>
<script  type="text/javascript" src="../admin/js/ui/jquery.ui.datepicker.js"></script>
<script  type="text/javascript" src="../admin/js/ui/jquery.ui.core.js"></script>-->

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
			<H2>Product List</H2>
			<div id="wrapperpageadmin">
	<?php
	
    	$row = array();
  		$listAllProduct = new Product();
		$row = $listAllProduct->getAllProduct();
		
		if($action != "productadd" || $action != "editpro"){
	
	?>
    <br/>
    <div id="tableListProduct">
     	<div id="addProductPlus">
        	<a href="<?php echo $productUrlHome."&action=productadd"; ?>">Add Product [ + ]</a>
    	</div>
    	<h2>Product Details</h2>
          <table id="tableproductadmin" border="0">
            <tr>
              <td class="rowHeadertable">ITEMS NAME</td>
              <td class="rowHeadertable">GENDER / SIZE</td>
              <td class="rowHeadertable">READY STOCK</td>
              <td class="rowHeadertable">PRICE PER UNIT</td>
              <td class="rowHeadertable">&nbsp;</td>
            </tr>
            <?php
				
				$len = count($row);
				for($i=0;$i<$len;$i++){
					
					$urlhome = $_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=productadmin";
					
					$deleteURL = $urlhome."&proid=".$row[$i]['Prod_ID']."&action=delproduct";
					
					$urlViewInPopup = "../inc/popup/productdetails.php?sid=".$session->getVar("SESSIONID")."&proid=".$row[$i]['Prod_ID'];
					$editProURL = $productUrlHome."&action=editpro&proid=".$row[$i]['Prod_ID'];
					
			?>
            <tr>
              <td class="rowResulttable"><?php echo $row[$i]['Prod_Name']; ?></td>
              <td class="rowResulttable">
			  	<?php 
					
					$NSizeArr = array();
					
					$NSizeArr = explode("|",$row[$i]['Prod_Option']);
					
					echo $NSizeArr[0].",".$NSizeArr[1].",".$NSizeArr[2];
					
				?>
              </td>
              <td class="rowResulttable">
              	<div align="center">
              	  <?php 
					
					echo $row[$i]['Prod_QOH']; 
					/*
					$XSizeArr = array();
					
					$XSizeArr = explode("|",$row[$i]['Prod_QOH']);
					
					echo $XSizeArr[0].",".$XSizeArr[1].",".$XSizeArr[2];
					*/
				?>
            	  </div></td>
              <td class="rowResulttable"><div align="center"><?php echo $row[$i]['Prod_Price']; ?></div></td>
              <td class="rowResulttable">
			  	<?php 

						echo "<a href=\"javascript:winPopUp('".$urlViewInPopup."')\">VIEW</a> | <A href='$editProURL'>EDIT</a> | <a href='$deleteURL'>DELETE</a> "; 
						
				?>
              </td>
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
            </tr>
          </table>
    </div>
   <?php
   
   		}
	
	?>
    <p>&nbsp;</p>
    <?php
		
		if($action == "productadd"){
	
	?>
    <div id="addproductform">
   	  <h2>Product Form</h2>
        <br/>
    	<form action="" method="post" enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="5" id="tableformproduct">
            <tr>
              <td width="9%">Items Name</td>
              <td colspan="4">
              <input name="proname" type="text" id="proname" size="70" /></td>
              <td width="18%">&nbsp;</td>
            </tr>
            <tr>
              <td>Code</td>
              <td colspan="3">
              <input name="procode" type="text" id="procode" size="40" /></td>
              <td width="9%">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Description</td>
              <td colspan="3">
              <textarea name="prodesc" id="prodesc" cols="50" rows="7"></textarea></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Size</td>
              <td colspan="3">
              	<div id="input1" style="margin-bottom:4px;" class="clonedInput">
              		<input name="prosize1" type="text" id="prosize1" size="5" />
                </div>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">
              <?php
			  
			  		$xsizechartPopup = "../inc/popup/xchartsize.php";
					
					$nsizechartPopup = "../inc/popup/nchartsize.php";
			  
			  ?>
              	<input type="button" name="addSBtn" id="addSBtn" value="Add Size Field" />
              	<input type="button" name="removeSBtn" id="removeSBtn" value="Remove Size Field" />
              <?php  
           	  			
						echo "<a href=\"javascript:sizeChartPopUp('".$nsizechartPopup."')\">SIZE CHART</a>"; 
						
			  ?>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Extra Size</td>
              <td colspan="3">
              	<div id="inputt1" style="margin-bottom:4px;" class="clonedInputt">
              		<input name="proxsize1" type="text" id="proxsize1" size="5" />
              	</div>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">
              	<input type="button" name="addSXBtn" id="addSXBtn" value="Add Extra Size Field" />
             	<input type="button" name="removeSXBtn" id="removeSXBtn" value="Remove Extra Size Field" />
           	  <?php  
           	  			
						echo "<a href=\"javascript:sizeChartPopUp('".$xsizechartPopup."')\">SIZE CHART</a>"; 
						
			  ?> 
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Price</td>
              <td colspan="3"><input name="proprice" type="text" id="textfield4" size="20" />
                *eg : 1000 or 100.50</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Category</td>
              <td colspan="3">
                <select name="procatcb" id="procatcb">
                  <option value="Select...">Select...</option>
                  <option value="Baju Kurung ">Baju Kurung </option>
                  <option value="Baju Kebaya ">Baju Kebaya </option>
                </select>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              	<td>Image</td>
              	<td colspan="3">
              		<input type="file" name="proimg[]" id="proimg[]" /> 
                </td>
              	<td>&nbsp;</td>
              	<td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">
              		<input type="file" name="proimg[]" id="proimg[]" />
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">
              		<input type="file" name="proimg[]" id="proimg[]" />
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td width="28%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
              <td width="29%">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="6"><input type="submit" name="btnAddProduct" id="btnAddProduct" value="Insert Product" /></td>
            </tr>
          </table>
       </form>
  </div>
    <?php
	
		}
			
			
	?>
  <p>&nbsp;</p>
    <?php
		
		if($action == "editpro"){
			$proid = $_GET['proid'];
			$productRow = array();
			
			$proObj = new Product();
			$productRow = $proObj->getDetailsProduct($proid);
			
	?>
  <div id="editprodiv">
<h2>Edit Product Form</h2>
			<br/>
    		<form id="form1" name="form1" method="post" action="">
		<table width="100%" border="0" cellpadding="5" id="tableformproduct" style="padding:5px">
            <tr>
              <td width="9%">Items Name</td>
              <td colspan="4" class="txt">
              <input name="proname" type="text" id="proname" value="<?php echo $productRow['P_NAME']; ?>" size="50" /></td>
              <td width="18%">&nbsp;</td>
            </tr>
            <tr>
              <td>Code</td>
              <td colspan="3" class="txt">
              <input name="procode" type="text" id="procode" value="<?php echo $productRow['P_CODE']; ?>" size="40" /></td>
              <td width="9%">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Description</td>
              <td colspan="3" class="txtarea">
              <textarea name="prodesc" id="prodesc" cols="50" rows="7"><?php echo $productRow['P_DESCRIPTION']; ?></textarea></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Size</td>
              <td colspan="3" class="txt">
              <?php
			  
			  		$xsizechartPopup = "../inc/popup/xchartsize.php";
					
					$nsizechartPopup = "../inc/popup/nchartsize.php";
			  
			  ?>
              <input name="sizeSTxt" type="text" id="sizeSTxt" value="<?php echo $productRow['P_SIZE']; ?>" /> 
              * Insert value using this format 36|37|38&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              <?php
			  		
					echo "<a href=\"javascript:sizeChartPopUp('".$nsizechartPopup."')\">SIZE CHART</a>"; 
			  		
			  ?>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Extra Size</td>
              <td colspan="3" class="txt">
              <input name="sizeXTxt" type="text" id="sizeXTxt" value="<?php echo $productRow['P_XSIZE']; ?>" />              
               * Insert value using this format 48|49|50&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
			  		
					echo "<a href=\"javascript:sizeChartPopUp('".$xsizechartPopup."')\">SIZE CHART</a>"; 
			  		
			  	?>
               </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Price</td>
              <td colspan="3" class="txt"><input name="proprice" type="text" id="textfield4" value="<?php echo $productRow['P_PRICE']; ?>" size="20" />
                *eg : 1000 or 100.50</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Category</td>
              <td class="cb">
              	<?php
              		
					$bajuArr = array("Baju Kurung","Baju Kebaya");
					
					CBUtility::getCBValue($bajuArr,NULL,$productRow['P_CATEGORY'],"proCatCB");
					
				?>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td width="28%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
              <td width="29%">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="6">
              	<input type="submit" name="updateProBtn" id="updateProBtn" value="Update Product" />
                <input name="idproduct" type="hidden" value="<?php echo $productRow['P_ID']; ?>" />
              </td>
            </tr>
          </table>
</form>
  </div>
	<?php
	
		}
	
	?>
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
