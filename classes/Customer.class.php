<?php


class Customer{
	
	
	public function __construct(){}
	
	public function custRegister(){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$username = mysql_escape_string($_POST['usernameTxt']);	
		$password = mysql_escape_string($_POST['passwordTxt']);	
		$fname = mysql_escape_string($_POST['fnameTxt']);	
		$lname = mysql_escape_string($_POST['lnameTxt']);	
		$nowDate = date("d/m/Y");
		

		$sqlLogin = "INSERT INTO ".USER_LOGIN."(UL_USERNAME,UL_PASSWORD,UL_SESSION_ID,UL_USER_LEVEL,UL_LOGIN_DATE) VALUES ('".$username."','".md5($password)."','NULL','CUSTOMER','NULL')";
		try{
			$statusInsertLogin = $db->executeOperation($sqlLogin);
			if($statusInsertLogin){
				$sqlCustomer = "INSERT INTO ".BDE_CUSTOMER."(UL_USERNAME,UL_PASSWORD,UC_FNAME,UC_LNAME,UC_REGISTER_DATED) VALUES ('".$username."','".md5($password)."','".$fname."','".$lname."','".$nowDate."')";
				$statusInsertCust = $db->executeOperation($sqlCustomer);
				if($statusInsertCust){
					$this->popup("You Have Registered With Us! Happy Shopping and You May Login Now",$_SERVER['PHP_SELF']."?pg=signin");	
				}
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