<?php


class Cart{
	private $__isInsert = false;
	
	public function __construct(){} 
	
	public function addToCart($proArr,$sizetype,$size,$quantity){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$nowDateTime = date("d/m/Y h:i:s A");
		
		$totalAmount = (int)$proArr['P_PRICE'] * $quantity; 
		
		$sqlInsertCart = "INSERT INTO ".BDE_SHOP_BAG."(SP_P_ID,SP_P_CODE,SP_P_NAME,SP_P_CAT,SP_P_QUANTITY,SP_P_IMG,SP_TYPE_SIZE,SP_SIZE,SP_PRICE,SP_TOTAL,SP_STATUS_CART,SP_DATETIME,SP_USERNAME) VALUES (".(int)$proArr['P_ID'].",'".$proArr['P_CODE']."','".$proArr['P_NAME']."','".$proArr['P_CATEGORY']."',".(int)$quantity.",'".$proArr['P_THUMB_NAME']."','".$sizetype."',".(int)$size.",'".$proArr['P_PRICE']."','".$totalAmount."','NEW','".$nowDateTime."','".$session->getVar("USERNAME")."')";
		try{
			$statusInsert = $db->executeOperation($sqlInsertCart);
			if($statusInsert){
				$this->__isInsert = true;
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
		
	}
	
	public function isInsertSuccess(){
		return $this->__isInsert;	
	}
	
	public function getAllNewCart(){
		$session = SessionManager::getInstance();
		$db = DataBase::getInstance();
		$resultarr = array();  
		
		$sqlgrab = "SELECT * FROM ".BDE_SHOP_BAG." WHERE SP_STATUS_CART='NEW' AND SP_USERNAME='".$session->getVar("USERNAME")."'";
		try{
			$row = $db->executeGrab($sqlgrab);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}			
	}
	
	public function updateQtyCartDetail($quantity,$proprice,$sbid){
		$db = DataBase::getInstance();
		
		$totalAmount = (int)$proprice * (int)$quantity; 
		
		$sqlUpdate = "UPDATE ".BDE_SHOP_BAG." SET SP_P_QUANTITY=".(int)$quantity.",SP_TOTAL='".$totalAmount."' WHERE SP_ID=".(int)$sbid;
		try{
			$statusUpdate = $db->executeOperation($sqlUpdate);
			if($statusUpdate){
				$this->popup("Item Quantity has been update!",$_SERVER['PHP_SELF']."?pg=shopcart");
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function deleteItemCart($sbid){
		$db = DataBase::getInstance();
		
		$sqlDelete = "DELETE FROM ".BDE_SHOP_BAG." WHERE SP_ID=".(int)$sbid;
		try{
			$statusDEL = $db->executeOperation($sqlDelete);
			if($statusDEL){
				$this->popup("Shopping Bag item has been delete!",$_SERVER['PHP_SELF']."?pg=shopcart");
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