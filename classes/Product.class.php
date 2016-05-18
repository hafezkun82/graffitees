<?php

class Product{
	private $__statusUpload;
	
	public function __construct(){}
	
	public function addProduct(){	
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		$nowDate = date("d/m/Y");
		$imgarray = array();
		$thumbarray = array();
		$NSizeArr = array();
		$XSizeArr = array();
		$productname = mysql_escape_string($_POST['proname']);
		$productcode = mysql_escape_string($_POST['procode']);
		$productdesc = mysql_escape_string($_POST['prodesc']);
		$productcat = mysql_escape_string($_POST['procatcb']);
		$productprice = mysql_escape_string($_POST['proprice']);
		
		array_pop($_POST);
		
		foreach($_POST as $key => $val){
			$nsize = $this->removeLastChars($key);
			$xsize = $this->removeLastChars($key);
			
			if($nsize == "prosize"){	
				array_push($NSizeArr,$val);
			}else if($xsize == "proxsize"){
				array_push($XSizeArr,$val);
			}
		}
		
		$NSizeStr = $this->arrayToString($NSizeArr);
		$XSizeStr = $this->arrayToString($XSizeArr);
		
		while(list($key,$value) = each($_FILES['proimg']['name'])){
			if(!empty($value)){
				$filename = $value;
				$ext = substr(strrchr($filename, '.'), 1);
				$randFilename = uniqid();
				$newImgFilename = $randFilename.".".$ext;
				$newThumbFilename = "THUMB_".$randFilename.".".$ext;
				
					
				$dirThumb = $_SERVER['DOCUMENT_ROOT']."/graffitees/imageupload/thumb/";
				$imgThumb = $dirThumb.$newThumbFilename;
		 
				$dirImg = $_SERVER['DOCUMENT_ROOT']."/graffitees/imageupload/";
				$imgUP = $dirImg.$newImgFilename;
				
				$uploadImgAct = copy($_FILES['proimg']['tmp_name'][$key], $imgUP);
				chmod("$imgUP",0777);
					
				if($uploadImgAct){
					$this->smart_resize_image($imgUP,200,200,true,$imgThumb,false,false,$r,$g,$b);	
					array_push($imgarray,$newImgFilename);
					array_push($thumbarray,$newThumbFilename);

				}
			}
		}
		$imgStr = $this->arrayToString($imgarray);
		$thumbStr = $this->arrayToString($thumbarray);

		if(is_object($db)){
			$sqlInsert = "INSERT INTO ".BDE_PRODUCT." (P_CODE,P_NAME,P_CATEGORY,P_DESCRIPTION,P_SIZE,P_XSIZE,P_PRICE,P_IMG_NAME,P_THUMB_NAME,P_ADDED_BY,P_ADDED_DATE) VALUES ('".$productcode."','".$productname."','".$productcat."','".$productdesc."','".$NSizeStr."','".$XSizeStr."','".$productprice."','".$imgStr."','".$thumbStr."','".$session->getVar("USERNAME")."','".$nowDate."')";
			$statusInsert = $db->executeOperation($sqlInsert);
			if($statusInsert){
				$this->__statusUpload = true;				 
			}
		}
		$this->popup("Your product was save!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=productadmin");
		
	}
	
	private function removeLastChars($string){
    	$string = substr($string, 0, -1);
    	return $string;
	} 
	
	private function arrayToString($arr){
		$tempStr = "";
		$len = count($arr);
		for($i=0;$i<$len;$i++){
			if(($i+1) == $len){
				$tempStr .= $arr[$i];
			}else{
				$tempStr .= $arr[$i]."|";
			}
		}
		
		return $tempStr;
	}
	
	private function smart_resize_image($file,$width=0,$height=0,$proportional=false,$output='return',$delete_original=false,$use_linux_commands=false, $r=NULL, $g=NULL, $b=NULL) {
      
    	if ($height <= 0 && $width <= 0) return false;

    	# Setting defaults and meta
    	$info = getimagesize($file);
    	$image = '';
    	$final_width = 0;
    	$final_height = 0;
    	list($width_old, $height_old) = $info;

    	# Calculating proportionality
    	if($proportional){
      		if($width == 0) $factor = $height/$height_old;
      		elseif($height == 0) $factor = $width/$width_old;
      		else $factor = min($width/$width_old, $height/$height_old);
      		
			$final_width = round($width_old * $factor);
      		$final_height = round($height_old * $factor);
    	}else{
      		$final_width = ($width <= 0) ? $width_old : $width;
      		$final_height = ($height <= 0) ? $height_old : $height;
    	}

    	# Loading image to memory according to type
    	switch ($info[2]) {
      		case IMAGETYPE_GIF: $image = imagecreatefromgif($file); break;
      		case IMAGETYPE_JPEG: $image = imagecreatefromjpeg($file); break;
      		case IMAGETYPE_PNG: $image = imagecreatefrompng($file); break;
      		default: return false;
    	}
    
    	# This is the resizing/resampling/transparency-preserving magic
    	$image_resized = imagecreatetruecolor( $final_width, $final_height );
    	if(($info[2] == IMAGETYPE_GIF)){
      		$transparency = imagecolortransparent($image);
			if($transparency >= 0){
        		$transparent_color = imagecolorsforindex($image, $trnprt_indx);
        		$transparency = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        		imagefill($image_resized, 0, 0, $transparency);
        		imagecolortransparent($image_resized, $transparency);
      		}
			/*imagealphablending($image_resized, false);
        		$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        		imagefill($image_resized, 0, 0, $color);
        		imagesavealpha($image_resized, true);
      		}
			*/
    	}else if(($info[2] == IMAGETYPE_PNG)){
			//$this->popup("PNG",$_SERVER['PHP_SELF']."?sid=".$this->__sessid."&pg=myimage");
			$oldcolor = imagecolorallocate($image_resized, $r,$g,$b);
    		imagecolortransparent($image_resized, $oldcolor);
		}
    	imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    	
    	# Taking care of original, if needed
    	if($delete_original){
     		if($use_linux_commands) exec('rm '.$file);
     		else @unlink($file);
    	}

    	# Preparing a method of providing result
    	switch(strtolower($output)){
      		case 'browser':
        		$mime = image_type_to_mime_type($info[2]);
        		header("Content-type: $mime");
        		$output = NULL;
      			break;
      		case 'file':
        		$output = $file;
      			break;
      		case 'return':
        		return $image_resized;
      			break;
      		default:
      			break;
    	}
    
    	# Writing image according to type to the output destination
    	switch($info[2]){
      		case IMAGETYPE_GIF: imagegif($image_resized, $output); break;
      		case IMAGETYPE_JPEG: imagejpeg($image_resized, $output); break;
      		case IMAGETYPE_PNG: imagepng($image_resized, $output); break;
      		default: return false;
    	}

		return true;
	}
	
	public function getAllProduct(){
		$resultarr = array();  
		
		$sqlgrab = "SELECT * FROM ".GRAFFITEES_PRODUCT;
		
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
	
	public function getDetailsProduct($idproduct){
		$db = DataBase::getInstance();
		$resultarr = array();  
		
		$sql = "SELECT * FROM ".GRAFFITEES_PRODUCT." WHERE Prod_ID=".(int)$idproduct;
		try{
			$row = $db->executeSingle($sql);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}		
	}
	
	public function getProductByCategory($cat){
		$db = DataBase::getInstance();
		$resultarr = array(); 

		$sql = "SELECT * FROM ".BDE_PRODUCT." WHERE P_CATEGORY ='".$cat."'";
		try{
			$row = $db->executeGrab($sql);
			if($row){
				$resultarr = $row;
				return $resultarr;
			}else{
				return false;	
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}	
	}
	
	public function deleleProductDetails($proid){
		$arrimgname = array();
		$arrthumbname = array();
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$sqlSelSglPro = "SELECT P_IMG_NAME,P_THUMB_NAME FROM ".BDE_PRODUCT." WHERE P_ID=".(int)$proid;
		$sqlDelPro = "DELETE FROM ".BDE_PRODUCT." WHERE P_ID=".(int)$proid;
		
		try{
			$row = $db->executeSingle($sqlSelSglPro);
			if($row){
				$arrimgname = explode("|",$row['P_IMG_NAME']);
				$arrthumbname = explode("|",$row['P_THUMB_NAME']);	
				
				$len = count($arrimgname);
				$statusdelete = $db->executeOperation($sqlDelPro);
				if($statusdelete){
					for($i=0;$i<$len;$i++){
						unlink("../imageupload/".$arrimgname[$i]);
						unlink("../imageupload/thumb/".$arrthumbname[$i]);
					}
					$this->popup("Your Product Has Been Delete Successfully!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=productadmin");
				}
			}
		}catch(Exception $e){
			throw new Exception("Message :".$e->getMessage());
			exit();
		}	
	}
	
	public function updateProductDetails(){
		$db = DataBase::getInstance();
		$session = SessionManager::getInstance();
		
		$proName = $_POST['proname'];
		$proCode = $_POST['procode'];
		$proDesc = $_POST['prodesc'];
		$sizeS = $_POST['sizeSTxt'];
		$sizeX = $_POST['sizeXTxt'];
		$proPrice = $_POST['proprice'];
		$proCat = $_POST['proCatCB'];
		$productid = $_POST['idproduct'];


		$sqlUpdatePro = "UPDATE ".BDE_PRODUCT." SET P_NAME='".$proName."',P_CODE='".$proCode."',P_DESCRIPTION='".$proDesc."',P_SIZE='".$sizeS."',P_XSIZE='".$sizeX."',P_PRICE='".$proPrice."',P_CATEGORY='".$proCat."' WHERE P_ID=".(int)$productid;
		try{
			if(is_object($db)){
				$statusUpdate = $db->executeOperation($sqlUpdatePro);
				if($statusUpdate){
					$this->popup("Product details has being changed!",$_SERVER['PHP_SELF']."?sid=".$session->getVar("SESSIONID")."&pg=productadmin");
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