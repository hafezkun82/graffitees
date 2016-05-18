<?php

class ValidateString{
	
	public static function validateStr($strVal){
		//$strVal = mysql_real_escape_string($strVal);
		$strVal = filter_var($strVal, FILTER_SANITIZE_STRING);
		$strVal = strip_tags($strVal);
		
		return $strVal;
	}
	
}

?>