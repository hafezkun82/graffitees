<?php


class Order{
	private $__isInsert = false;
	private $__isStatusDeliveryUpdate = false;
	
	public function __construct(){}
	
	public function insertOrder(){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$nowDateTime = date("d/m/Y h:i:s A");
		
		$bigTotal = $_POST['bigtotal'];
		$add = $_POST['addtxt'];
		$town = $_POST['towntxt'];
		$country = $_POST['countrytxt'];
		$postcode = $_POST['postcodetxt'];
		
		$scStr = $_POST['spstrval'];
		
		$arrtemp = array();
		$arrtemp = explode("|",$scStr);
		$len = count($arrtemp);
		
		$orderid = $this->randomPrefix(10); 
		
		$sqlInsertOrder = "INSERT INTO ".BDE_ORDER." (O_ORDER_ID,O_BIG_TOTAL_AMOUNT,O_USERNAME,O_DATETIME,O_ADD,O_CITY,O_COUNTRY,O_POSTCODE,O_PYMT_METHOD,O_BANKNAME,O_AMOUNT_PAID,O_DATE_PAID,O_REF_PYMT_ID,O_CC_TYPE,O_CARD_NO,O_CARD_EXPIRED,O_CARD_SEC_NO,O_STATUS_PAYMENT,O_STATUS_DELIVERY) VALUES ('".$orderid."','".$bigTotal."','".$session->getVar("USERNAME")."','".$nowDateTime."','".$add."','".$town."','".$country."','".$postcode."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NOT PAID','NULL')";
		try{
			$statusInsert = $db->executeOperation($sqlInsertOrder);
			if($statusInsert){
				$this->__isInsert = true;
				for($i=0;$i<$len;$i++){
					$sqlUpdateSB = "UPDATE ".BDE_SHOP_BAG." SET SP_STATUS_CART='ORDER' WHERE SP_USERNAME='".$session->getVar("USERNAME")."' AND SP_ID=".(int)$arrtemp[$i];
					$statusUpdate = $db->executeOperation($sqlUpdateSB);
				}
				$this->popup("Your order has been process, please read carefully on how to make a payment!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=shopcart&action=pymt&orderid=".$orderid);
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}	
	}
	
	private function randomPrefix($length){
		$random= "";

		srand((double)microtime()*1000000);

		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";

		for($i = 0; $i < $length; $i++){
			$random .= substr($data, (rand()%(strlen($data))), 1);
		}

		return $random;
	} 
	
	public function checkOrderStatus($orderid){
		$session = SessionManager::getInstance();
		$db = DataBase::getInstance();
		$resultarr = array();  
		
		$sqlcheck = "SELECT * FROM ".BDE_ORDER." WHERE O_ORDER_ID='".$orderid."'";
		try{
			$row = $db->executeSingle($sqlcheck);
			if(is_array($row)){
				$resultarr = $row;
				return $resultarr;
			}else if(is_bool($row)){
				//return false;	
				$this->popup("Order ID number not exist!",$_SERVER['PHP_SELF']."?pg=order");
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}			
	}
	
	public function getAllNewOrder(){
		$resultarr = array();  
		$sqlgrab = "SELECT * FROM ".BDE_ORDER." WHERE O_STATUS_DELIVERY='NULL'";	
		try{
			$db = DataBase::getInstance();
			$row = $db->executeGrab($sqlgrab);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function getAllProgressOrder(){
		$resultarr = array();  
		$sqlgrab = "SELECT * FROM ".BDE_ORDER." WHERE Ord_Status='DELIVERY' OR Ord_Status='PENDING'";	
		try{
			$db = DataBase::getInstance();
			$row = $db->executeGrab($sqlgrab);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function getAllOrderDelivery(){
		$resultarr = array();  
		$sqlgrab = "SELECT * FROM ".BDE_ORDER." WHERE O_STATUS_DELIVERY='DELIVERY'";	
		try{
			$db = DataBase::getInstance();
			$row = $db->executeGrab($sqlgrab);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function getAllOrderPending(){
		$resultarr = array();  
		$sqlgrab = "SELECT * FROM ".BDE_ORDER." WHERE O_STATUS_DELIVERY='PENDING'";	
		try{
			$db = DataBase::getInstance();
			$row = $db->executeGrab($sqlgrab);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function getOrderDetails($orderid){
		$session = SessionManager::getInstance();
		$db = DataBase::getInstance();
		$resultarr = array();  
		
		$sqlcheck = "SELECT * FROM ".BDE_ORDER." WHERE O_ORDER_ID='".$orderid."'";
		try{
			$row = $db->executeSingle($sqlcheck);
			if(is_array($row)){
				$resultarr = $row;
				return $resultarr;
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}			
	}
	
	public function updateDeliveryStatus($orderid){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$statusDelivery = $_POST['statusDeliveryCB'];
		
		$sqlUpdate = "UPDATE ".BDE_ORDER." SET O_STATUS_DELIVERY='".$statusDelivery."' WHERE O_ID=".(int)$orderid;
		try{
			$statusUpdate = $db->executeOperation($sqlUpdate);
			if($statusUpdate){
				$this->__isStatusDeliveryUpdate = true;
				//$this->popup("Order Payment has been update!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=ordera");
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function isDeliveryUpdate(){
		return $this->__isStatusDeliveryUpdate;
	}
	
	public function updatePymtOrderBI($orderid){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$paymentmethod = $_POST['paymentmethodtxt'];
		$bankname = $_POST['banknametxt'];
		$amountpaid = $_POST['amountpaidtxt'];
		$datepaid = $_POST['datetxt'];
		$paidrefno = $_POST['reftxt'];

		if($paymentmethod == "IB"){
			$paymentmethod  = "INTERNET BANKING";
		}
		
		$sqlUpdate = "UPDATE ".BDE_ORDER." SET O_PYMT_METHOD='".$paymentmethod."',O_BANKNAME='".$bankname."',O_AMOUNT_PAID='".$amountpaid."',O_DATE_PAID='".$datepaid."',O_REF_PYMT_ID='".$paidrefno."',O_STATUS_PAYMENT='PAID' WHERE O_ORDER_ID='".$orderid."'";
		try{
			$statusUpdate = $db->executeOperation($sqlUpdate);
			if($statusUpdate){
				$this->popup("Payment information has been updated!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=shopcart&action=pymtconfirmation&orderid=".$orderid);
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
		
	}
	
	public function updatePymtOrderCC($orderid){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$paymentmethod = $_POST['paymentmethodtxt'];
		$cardtype = $_POST['ctype'];
		$cardnumber = $_POST['cardnumtxt'];
		$carddateexp = $_POST['dateexptxt'];
		$cardsecno = $_POST['sectxt'];

		if($paymentmethod == "CC"){
			$paymentmethod  = "CREDIT CARD";
		}
		
		$sqlUpdate = "UPDATE ".BDE_ORDER." SET O_PYMT_METHOD='".$paymentmethod."',O_CC_TYPE='".$cardtype."',O_CARD_NO='".$cardnumber."',O_CARD_EXPIRED='".$carddateexp."',O_CARD_SEC_NO='".$cardsecno."',O_STATUS_PAYMENT='PAID' WHERE O_ORDER_ID='".$orderid."'";
		try{
			$statusUpdate = $db->executeOperation($sqlUpdate);
			if($statusUpdate){
				$this->popup("Payment information has been updated!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=shopcart&action=pymtconfirmation&orderid=".$orderid);
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
		
	}
	
	
	private function popup($vMsg,$vDestination) {
		echo("<html>\n");
			echo("<head>\n");
				echo("<title>System Message</title>\n");
				echo("<meta http-equiv=\"Content-Type\" content=\"text/html; 
				charset=iso-8859-1\">\n");
				echo("<script language=\"JavaScript\" type=\"text/JavaScript\">\n");
					echo("alert('$vMsg');\n");
					echo("window.location = ('$vDestination');\n");
				echo("</script>\n");
			echo("</head>\n");
				echo("<body>\n");
				echo("</body>\n");
	    echo("</html>\n");
		exit;
	}
	
}

?>