<?php

/*
*		
*		@Author 	:	Frankis (Mrpixel)
*		@Title		:	self describe
*		@Date/time	:	1.00 AM
*
*/

class KeyValidation{
	
	public static function startValidateKeyDate(){
			$tempd = array();
			$d = date("d/m/Y");
			$tempd = explode("/",$d);
			$nd = md5($tempd[0])."/".md5($tempd[1])."/".md5($tempd[2]);
			$sd = self::getMyDate();

			$ad = (is_string($sd))?self::gV($sd):self::gV2();
			$kd = self::pC($ad[0],$ad[1],$ad[2]);
			$rd = ($kd == $nd)?true:false;

			return $rd;

	}
	
	protected static function getMyDate(){
		$d1 = "a2ef406e2c2351e0b9e80029c909242d";
		$d2 = "751d31dd6b56b26b29dac2c0e1839e34";
		$d3 = "c8758b517083196f05ac29810b924aca";
		$d4 = "/";
		$d5 = $d1.$d4.$d2.$d4.$d3;
		return $d5;
	}
	
	protected static function gV($str){
		$t = array();	
		$t = explode("/",$str);
		return $t;
	}
	
	protected static function gV2(){
		return false;	
	}
	
	protected static function pC($d1,$d2,$d3){
		$dc = $d1."/".$d2."/".$d3;
		return $dc;
	}
	
}

?>