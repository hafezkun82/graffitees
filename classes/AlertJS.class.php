<?php


class AlertJS{
	
	public static function showAlert($vMsg,$vDestination) {
		
		$msg  = "<script language=\"JavaScript\" type=\"text/JavaScript\">\n";
		$msg .=		"alert('$vMsg');\n";
		$msg .=		"window.location = ('$vDestination');\n";
		$msg .=	"</script>\n";
		
		return $msg;
	}
	
}


?>