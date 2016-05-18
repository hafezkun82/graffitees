<?php


class Announcement{
	
	public function __construct(){}
	
	public function saveAnnounce(){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$nowDate = date("d/m/Y");
		$annouceVal = mysql_escape_string($_POST['annoucetxt']);
		
		$sqlInsert = "INSERT INTO ".BDE_ANNOUNCEMENT."(A_ANNOUNCE_DETAILS,A_ANNOUNCE_DATE) VALUES ('".$annouceVal."','".$nowDate."')";
		
		try{
			$statusInsert = $db->executeOperation($sqlInsert);
			if($statusInsert){
				$this->popup("Your Annoucemment was save!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=announce");
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
		
	}
	
	public function getAllAnnouncement(){
		$resultarr = array();  
		
		$sqlgrab = "SELECT * FROM ".BDE_ANNOUNCEMENT;
		
		try{
			$db = DataBase::getInstance();
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
	
	public function delAnnounce($announceid){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$sqlDel = "DELETE FROM ".BDE_ANNOUNCEMENT." WHERE A_ID=".(int)$announceid;
		
		try{
			$statusDel = $db->executeOperation($sqlDel);
			if($statusDel){
				$this->popup("Your Annoucemment has been delete!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=announce");
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