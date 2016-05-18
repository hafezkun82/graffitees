<?php


class Feedback{
	
	public function __construct(){}
	
	
	public function saveComments(){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$email = $_POST['emailtxt'];
		$feedback = $_POST['feedbacktxt'];
		
		$sqlInsert = "INSERT INTO ".BDE_FEEDBACK."(BF_EMAIL,BF_FEEDBACK) VALUES ('".$email."','".$feedback."')";
		try{
			$statusInsert = $db->executeOperation($sqlInsert);
			if($statusInsert){
				$this->popup("FEEDBACK WAS INSERT!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=feedback");
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}	
		
	}
	
	public function getAllComments(){
		$db = DataBase::getInstance();
		$resultarr = array();  
		$sqlgrab = "SELECT * FROM ".BDE_FEEDBACK;
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