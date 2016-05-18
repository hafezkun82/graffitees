<?php

ob_start();

/*		Removing browser caching		*/

header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" ); 
header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" ); 
header( "Cache-Control: no-cache, must-revalidate" ); 
header( "Pragma: no-cache" ); 

include("classes/Product.class.php");

$sessionid = $session->getVar("SESSIONID");
$productID = isset($_GET['productid'])?$_GET['productid']:NULL;

$LOGINFLAG = false;
$session = NULL;


$session = SessionManager::getInstance();
$session->registerVar("loginBool",$LOGINFLAG);

if($session->isStarted()){
	if($session->varIsRegistered("SESSIONID")){
		//echo "TRUE -> WAS LOGIN<br/><br/>";	
		$LOGINFLAG = true;
		$shopcartArr = array();	
		$session->registerVar("SHOPCARTARR",$shopcartArr);
	}else{
		//echo "FALSE -> WAS LOGOUT<br/><br/>";
		$LOGINFLAG = false;
	}
}

if(isset($_POST['addCartBtn'])){
	//$session = SessionManager::getInstance();
	//$sid = $_GET['sid'];
	
	if($sessionid = "" || empty($sessionid) || $sessionid = NULL){
		echo AlertJS::showAlert("Sorry you have to login 1st before you can make any purchasing",$_SERVER['PHP_SELF']."?pg=signin");
	}else{
		$act = "addtobag";
	
		array_pop($_POST);
	
		/*$sizetype = rtrim($_POST['CBselectSize']);
		if($sizetype == "Standard Size"){
			$size = $_POST['CBstandard'];
		}else if($sizetype == "Extra Size"){
			$size = $_POST['CBextra'];
		}*/
	
		$quantity = $_POST['proquantity'];
	}
}

//$row = array();
//$productObj = new Product(); 
//$row = $productObj->getDetailsProduct($productID);
$shopcartarr = $session->getVar("SHOPCARTARR");
$productID = $shopcartarr[];
$productName = $row['Prod_Name'];
$productPrice = $row['Prod_Price'];
$imgName = $row['Prod_Image_Name'];
$thumbName = $row['Prod_Thumb_Name'];
$pathToImg = "imageupload/".$imgName;
$pathToThumb = "imageupload/thumb/".$thumbName;
$shopcartURL = $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_cart&productid=".$productID;
 
$shopcartArr = array();
$session->registerVar("SHOPCARTARR",$shopcartArr);
array_push($shopcartArr,$row['Prod_ID']);
array_push($shopcartArr,$row['Prod_Name']);
array_push($shopcartArr,$row['Prod_Price']);
array_push($shopcartArr,$row['Prod_Image_Name']);
array_push($shopcartArr,$row['Prod_Thumb_Name']);

//$arrIMGBig = array();
//$arrIMGBig = explode("|",$row['P_IMG_NAME']);
//$pathToImg = "./imageupload/".$arrIMGBig[$bigImgId];

//$productCategory = explode("|",$row['Prod_Option']);
?>
<section id="content">
  <div id="checkout_page">
    <div style="clear:both;overflow:hidden;" id="TESTING_CART">
      <div id="main">
        <!-- Shopping Cart Display start -->
        <section id="cart_overview">
          <div class="title-bar block">
            <h1>Your Shopping Cart</h1>
            <small>or <a href="http://www.designbyhumans.com/shop">Continue Shopping</a></small>
          </div>
          
          <section id="cart">
            <span class="m_checkout_cartoverview-REST m-alert"></span>	
            <table id="view-cart-details" cellspacing="0">
              <thead>
                <tr>
                  <th class="img">Preview</th>
                  <th class="desc">Description</th>
                  <th class="price">Price</th>
                  <th class="qty">Qty</th>
                  <th class="total">Total</th></tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="4">Total Before Tax and Shipping</td>
                  <td class="total cart-total-price">MYR22</td></tr>
              </tfoot>
              <tbody>
                <tr data-info="10119|9492|M|M">
                  <td class="img">
                    <a href="http://www.designbyhumans.com/shop/detail/9492">
                      <img src="img/2pxq_9lu-0x121.png" height="121px"></a></td>
                  <td class="desc">
                    <strong><a href="http://www.designbyhumans.com/shop/detail/9492">Limited Edition - DINO FRENZY</a></strong>
                    <!--<em>by MR-NICOLO</em>
                    <ul class="attributes">
                      <li>Men's M DBH Premium</li>
                      <li>Silver</li>
                    </ul>--></td>
                  <td class="price" data-price="22">MYR22</td>
                  <td class="qty">
                    <input type="number" value="1" class="cart_qty" size="4" name="cart_qty">
                    <a href="javascript:void(0);" class="remove" id="btn_update">Update Qty</a>
                    <a href="javascript:void(0);" class="remove" id="btn_remove">Remove</a></td>
                  <td class="total">MYR<span class="price-per-item">22</span></td>
                </tr>
              </tbody>
            </table>
            <div class="section-foot">
              <a href="http://www.designbyhumans.com/shop/" class="linkbutton">« Continue Shopping</a> 
              <a href="http://www.designbyhumans.com/checkout/" class="submit linkbutton auth" id="submit_cart">Checkout »</a></div>
          </section> 
        </section>
        <!-- Shopping Cart Display end -->
        
        <!-- Product Suggestions start -->
        <!--<section id="recommended_tees" class="block product_grid">
          <div class="title-bar"><h2>Recommended for you:</h2></div>
          <ul>
            <li class="single_tee_mini ">
              <p class="tee_photo">
                <a class="tee_photo" href="http://www.designbyhumans.com/shop/detail/men/8858/" title="Extinct by nicebleed">
                  <img src="img/ei1-x234.png" alt="Photo of Extinct"></a></p>
              <p class="tee_info new sale"></p>
              <div class="tee_attributes">
                <a class="tee-title" href="http://www.designbyhumans.com/shop/detail/men/8858/">Extinct</a>
                <span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/nicebleed/"> nicebleed</a></div>
            </li>
            <li class="single_tee_mini ">
              <p class="tee_photo">
                <a class="tee_photo" href="http://www.designbyhumans.com/shop/detail/men/9447/" title="Dealing With The Devil by Studio8Worx">
                  <img src="img/2jx7_8uj-x234.png" alt="Photo of Dealing With The Devil"></a></p>
              <p class="tee_info new sale"></p>
              <div class="tee_attributes">
                <a class="tee-title" href="http://www.designbyhumans.com/shop/detail/men/9447/">Dealing With The Devil</a>
                <span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/Studio8Worx/"> Studio8Worx</a></div>
            </li>
            <li class="single_tee_mini ">
              <p class="tee_photo">
                <a class="tee_photo" href="http://www.designbyhumans.com/shop/detail/men/7999/" title="Unification by BeadlerWorks">
                  <img src="img/dm1-x234.png" alt="Photo of Unification"></a></p>
              <p class="tee_info new sale"></p>
              <div class="tee_attributes">
                <a class="tee-title" href="http://www.designbyhumans.com/shop/detail/men/7999/">Unification</a>
                <span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/BeadlerWorks/"> BeadlerWorks</a></div>
            </li>
            <li class="single_tee_mini ">
              <p class="tee_photo">
                <a class="tee_photo" href="http://www.designbyhumans.com/shop/detail/men/9452/" title="Velociraptors love cupcakes! by herky">
                  <img src="img/2kak_wfu-x234.png" alt="Photo of Velociraptors love cupcakes!"></a></p>
              <p class="tee_info new sale"></p>
              <div class="tee_attributes">
                <a class="tee-title" href="http://www.designbyhumans.com/shop/detail/men/9452/">Velociraptors love cupcakes!</a>
                <span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/herky/"> herky</a></div>
            </li>
            <li class="single_tee_mini last">
              <p class="tee_photo">
                <a class="tee_photo" href="http://www.designbyhumans.com/shop/detail/men/9164/" title="Midnight Showdown  by muttley">
                  <img src="img/e7k-x234.png" alt="Photo of Midnight Showdown "></a></p>
              <p class="tee_info new sale"></p>
              <div class="tee_attributes">
                <a class="tee-title" href="http://www.designbyhumans.com/shop/detail/men/9164/">Midnight Showdown </a>
                <span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/muttley/"> muttley</a></div>
            </li>
          </ul>
        </section>-->
        <!-- Product Suggestions end -->
      </div>
    
      <!-- Side Content start -->
      <div id="side">
        <div class="inside">
          <div id="recently_viewed" class="block">
            <h3>Recently Viewed</h3>
            <div class="side-section">
              <ul>
                <li><a href="http://www.designbyhumans.com/shop/detail/9250">El ultimo panda</a> <!--<em>by kramz</em>--></li>
                <li><a href="http://www.designbyhumans.com/shop/detail/9492">Limited Edition - DINO FRENZY</a> <!--<em>by MR-NICOLO</em>--></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Side Content end -->
    </div>
  </div>
</section>

<script type="text/javascript">
	FW_DEBUG = false;
	URL_PREFIX_AJAX = "/a/";
	URL_PREFIX_IMAGE = "http://www.designbyhumans.com/img/";
	MAIN_URL = "http://www.designbyhumans.com/";
	URL_PREFIX_ADMIN_CMS = "";
	ENVIRONMENT = "prd";
	gIsLogged = 0;
	user = "";
	is_user_verified = 0;
	post_edit_time = '180';
	gStaticMessages = [];
	gStaticMessages['cart_empty'] = "Your Cart is empty. You need to fill your cart before proceeding.";
	gStaticMessages['postal_code_required'] = "Enter a value for postal code.";
	gStaticMessages['user_dont_have_privileges'] = "You don't have any privilege to access this page.";
</script>
<script type="text/javascript" src="js/3324.js" charset="utf-8"></script>
<script type="text/javascript" src="js/CommonSearch.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery/jquery.ui.autocomplete.selectFirst.js" charset="utf-8"></script>

<script>
	manu.loadedStyles = ["css\/3324.css","http:\/\/fonts.googleapis.com\/css?family=PT+Sans:regular,bold&v1","css\/jquery-ui-1.8.10.custom.css","css\/dbh_screen.css","css\/manu.form.css","css\/manu.autocomplete.css","css\/manu.default.css","css\/app.css","css\/ie7.css"];
	manu.loadedScripts = ["js\/jquery\/jquery.form.js","js\/jquery\/jquery.fcbkcomplete.js","js\/manu.js","js\/manu.autocomplete.js","js\/manu.form.js","js\/manu.uploader.js","js\/app.js","js\/dbh.js","js\/shop.js","js\/Forum.js","js\/common.js","js\/design.js","js\/profile.js","js\/cart.js","js\/3324.js","js\/CommonSearch.js","js\/jquery\/jquery.ui.autocomplete.selectFirst.js"];
</script>

<script type="text/javascript">jQuery(function() { var handlers = {"ShoppingCart.handleCartEvents":{"name":"ShoppingCart.handleCartEvents","params":[],"alwaysExec":false},"Login.handleLoginPopupEvents":{"name":"Login.handleLoginPopupEvents","params":[],"alwaysExec":false},"Register.showRegisterOverlayWindow":{"name":"Register.showRegisterOverlayWindow","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.form.handleFormEvents--824b1048522773579c56f46803824745":{"name":"manu.form.handleFormEvents","params":["common_search"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_common_search"] = {"header_search":[]};var handlers = {"manu.form.handleFormEvents--88c9489e8d8bfaabd5df6bd7e6b47102":{"name":"manu.form.handleFormEvents","params":["login"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_login"] = {"username":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"}]},"pwd":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"}]},"rememberme":[],"submit":[],"redirect":[]};var handlers = {"manu.form.handleFormEvents--acde6a868d8bcd9ea8cad83ea27e7e96":{"name":"manu.form.handleFormEvents","params":["register"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_register"] = {"user_name":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"},{"name":"alphanumeric","args":[],"msg":"Username must only contain letters and numbers."},{"name":"minLength","args":[4],"msg":"Username must be at least 4 characters long."},{"name":"maxLength","args":[40],"msg":"Username must not exceed 40 characters."}]},"pwd_register":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"},{"name":"minLength","args":[4],"msg":"Passwords must be non-empty, at least four characters and match the confirmation."}]},"conf_pwd":{"rules":[{"name":"required","args":{"label":"Confirm Password"},"msg":"Confirm password is required"},{"name":"matchOther","args":["pwd_register"],"msg":"Confirm Password must match Password."}]},"email":{"rules":[{"name":"required","args":{"label":"Email Address"},"msg":"Email is required"},{"name":"email","args":[],"msg":"Email Address must be a valid email."}]},"confEmail":{"rules":[{"name":"required","args":{"label":"Confirm Email"},"msg":"Confirm email is required"},{"name":"email","args":[],"msg":"Confirm Email must be a valid email."},{"name":"matchOther","args":["email"],"msg":"Confirm Email must match Email Address."}]},"countrylist":{"rules":[{"name":"required","args":{"label":"Country"},"msg":"Country is required"}]},"promos":[],"terms":[],"submit":[]};var handlers = {"manu.form.handleFormEvents--732f83b1a626ac9a007fa76146e7fc9f":{"name":"manu.form.handleFormEvents","params":["join-news-letter-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_join-news-letter-form"] = {"news_letter_email":{"rules":[{"name":"email","args":[],"msg":"News letter email must be a valid email."}]},"submit":[]};});</script>

<script type="text/javascript">
adroll_adv_id = "WN4L2OR7HVERNM5GTU2GIT"; adroll_pix_id = "N5H6KBFN7RBAHPDL4QP6QZ"; (function () { var oldonload = window.onload; window.onload = function(){ __adroll_loaded=true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute('async', 'true'); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js";
((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
if(oldonload){oldonload()}};
}());
</script>