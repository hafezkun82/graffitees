<?php

/**
 * 		@author  	: 	Muhammad Hafez Besharuddin (hafez_kun)
 *		@title	 	: 	Class Login
 *		@Date/Time	:	11 February 2010
 *		@Desc	 	: 	Handling Login stuff, the value derive from login form
 */

class Login{
	//private $__db;
	//private $__firstName;
	//private $__lastName;
	//private $__email;
	//private $__telNo;
	//private $__faxNo;
	private $__userID;
	private $__userPass;
	private $__userLevel;
	private $__accStatus;
	private $statusLogin = false;
	private $session;
	private $sessionid;
	private $curruser;
	private $objuser;


	/*       Constructor         */
	public function __construct(){}
	
	public function checkUserPass($usernametxt,$passwordtxt){
		$this->__userID = $usernametxt;
		$this->__userPass = md5($passwordtxt);
		$this->session = SessionManager::getInstance();
		
		$sql = "SELECT * FROM ".GRAFFITEES_USER_LOGIN." WHERE UL_UserName = '".$this->__userID."' OR UL_UserPass = '".$this->__userPass."'";	
		try{
			$db = DataBase::getInstance();
			$row = $db->executeSingle($sql);
			if(is_array($row)){
				if($row['UL_UserLevel']=="ADMINISTRATOR"){
					//$urlHome = $_SERVER['PHP_SELF']."?pg=adminsignin";
					$urlHome = "adminsignin.php";
				}else{
					$urlHome = "membersignin.php";
				}
				if($row['UL_UserName'] == $this->__userID && $row['UL_UserPass'] == $this->__userPass){
					$this->statusLogin = true;
					$this->session->registerVar("USERNAME",$row['UL_UserName']);
					$this->session->registerVar("USERPASSWORD",$row['UL_UserPass']);
					$this->session->registerVar("USERLEVEL",$row['UL_UserLevel']);
					$this->session->registerVar("SESSIONID",$this->session->getSessionId());
					$this->session->startProtection();
					$this->sessionid = $this->session->getVar("SESSIONID");
				}else if($row['UL_UserName'] != $this->__userID){
					$this->statusLogin = false;
					$this->popup("* Username wrong, please check your username!",$urlHome);
				}else if($row['UL_UserPass'] != $this->__userPass){
					$this->statusLogin = false;
					$this->popup("* Password wrong, please check your password!",$urlHome);
				}
			}else if(is_bool($row)){
				$urlHome = $_SERVER['PHP_SELF']."?pg=signin";
				$this->statusLogin = false;
				$this->popup("* Your credential login is unvalid, please provide valid username and password!",$urlHome);	
			}
			
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}
	}
	
	public function statusLogin(){
		return $this->statusLogin;	
	}
	
	public function getSessionID(){
		return $this->sessionid;
	}
	
	public function getUserLevel(){
		$this->__userLevel = $this->session->getVar("USERLEVEL");
		return $this->__userLevel;	
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