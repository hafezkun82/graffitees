<?php

class Model{
	
	private static $instance;
	private $__obj;
	private $__pgName;

	private function __construct(){}

	public static function getInstance(){
		if (!self::$instance){
			self::$instance = new Model();
		}

		return self::$instance;
	}
	
	public function setObjKey($obj,$pgname){
		$this->__obj = $obj;
		$this->__pgName = $pgname;
	}
	
	public function getObjKey(){
		return $this->__obj;
	}
	
	public function getPgName(){
		return $this->__pgName;	
	}	
	
}

?>