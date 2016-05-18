<?php

/**
 * 		@author  	: 	Frankis Ismail (Mrpixel)
 *		@title	 	: 	Class SessionManager
 *		@Date/Time	:	Somewhere in September 2009
 * 		@version 	: 	0.1
 *		@Desc	 	: 	Singleton Class to Handle Session, isolating session portions from Login Object
 */

class SessionManager{
  /*   var Instance session    */
  private static $instance;
    
  private function __construct(){}  
  
  public static function getInstance(){
		if (!isset(self::$instance)) {
				$c = __CLASS__;
				self::$instance = new $c;
		}
		//Session is automatically started!
		session_start();
		return self::$instance;
  }
  
  /* Prohibited Cloning instance  */
  public function __clone(){
    trigger_error('Clone is not allowed.', E_USER_ERROR);
  }  
   
  public function getSessionId(){
  	$old_sessionid = session_id();
		session_regenerate_id(true);
		$newSessionID = $this->generateRandID();
 		$new_sessionid = session_id();
		return $new_sessionid;
  }
  
  public function varIsRegistered($var_name){
    if (!isset($_SESSION[$var_name]))
      return false;
    else
      return true;
  }
  
  public function registerVar($var_name, $var_value){
    $_SESSION[$var_name]=$var_value;
  }
  
  public function getVar($var_name){
    if (!isset($_SESSION[$var_name]))
      return "";
    else
      return $_SESSION[$var_name];
  }
  
  public function unRegisterVar($var_name){
    if ($this->varIsRegistered($var_name)){
      $_SESSION[$var_name]=null;
	}
  }  
  
  public function clear(){
    $_SESSION = array();
  }    
  
  public function destroy(){
    self::clear();
    session_destroy();
  }
  
  public function isStarted(){
    if (isset($_SESSION))
      return true;
    else
      return false;
  }
  
  public function startProtection(){
    $this->registerVar("PROTECTION_MODE","1");
  }
  
  public function isProtected($redirect_url=""){
    if (!$this->varIsRegistered("PROTECTION_MODE")){
			if (!$redirect_url=""){
				header("Location : ".$redirect_url);
			}else{
				return false;
			}
    }else{
      return true;
	}
  }
  
  public function stopProtection(){
    $this->unRegisterVar("PROTECTION_MODE");
  }
  
  private function generateRandID(){
  	return md5($this->generateRandStr(16));
  }
  
  private function generateRandStr($length){
  	$randstr = "";
    for($i=0; $i<$length; $i++){
			 $randnum = mt_rand(0,61);
			 if($randnum < 10){
					$randstr .= chr($randnum+48);
			 }else if($randnum < 36){
					$randstr .= chr($randnum+55);
			 }else{
					$randstr .= chr($randnum+61);
			 }
     }
     return $randstr;
  }
  
}

?>