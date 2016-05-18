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

$row = array();
$productObj = new Product(); 
$row = $productObj->getDetailsProduct($productID);
$productID = $row['Prod_ID'];
$productName = $row['Prod_Name'];
$productPrice = $row['Prod_Price'];
$imgName = $row['Prod_Image_Name'];
$thumbName = $row['Prod_Thumb_Name'];
$pathToImg = "imageupload/".$imgName;
$pathToThumb = "imageupload/thumb/".$thumbName;
//$shopcartURL = $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_cart&productid=".$productID;
$shopcartURL = $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_cart";
 
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
  <input type="hidden" name="product_id" id="product_id" value="9492">
  <section id="product-detail" class="detail-view">
    <section class="display" id="display_image">
      <div class="background-image">
        <a class="img_main show" href="http://cdn.designbyhumans.com/product/126/2pxq_9lu.png" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxq_9lu.png&quot; id=&quot;men_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxs_qsn-43x43.png">
          <img alt="" src="<?php echo $pathToImg;?>" id="men_image" class=""></a>
        <a class="img_alt" href="http://cdn.designbyhumans.com/product/126/2pxs_qsn.png" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxs_qsn.png&quot; id=&quot;men_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxs_qsn-43x43.png">
          <img alt="" src="<?php echo $pathToImg;?>" id="women_image" class="hidden"></a>
      </div>
    </section>
  
    <aside class="product-sidebar" data-id="9492">
      <section class="upper">
        <header class="design-header">
          <div class="product-price" data-price="22">MYR<?php echo $productPrice;?></div>
          <p class="sot">
            <span class="shirt-of-the">Shirt of the Day • </span>
            <span class="date">Oct 21, 2011</span></p>
          <h1 class="title"><?php echo $productName;?></h1>
          <!--<p class="artist">by <a href="http://www.designbyhumans.com/profile/MR-NICOLO">MR-NICOLO</a></p>-->
        </header>
        
        <section class="options">
          <section id="gender_container">
            <div class="wrapper" data-gender="M">
              <p class="info">
                <strong class="gender">Men's</strong><!--<span> • </span>
                <em class="type" data-color="Silver" data-blank-name="DBH Premium">Silver DBH Premium</em>--></p>
              <div class="size">
                <dl><dt class="button" data-size="S" data-product-id="9492" data-subproduct-id="10118">S</dt></dl>
                <dl><dt class="button" data-size="M" data-product-id="9492" data-subproduct-id="10119">M</dt></dl>
                <dl><dt class="button" data-size="L" data-product-id="9492" data-subproduct-id="10120">L</dt></dl>
                <dl><dt class="button" data-size="XL" data-product-id="9492" data-subproduct-id="10121">XL</dt></dl>
                <dl><dt class="button" data-size="2XL" data-product-id="9492" data-subproduct-id="10122">2XL</dt></dl>
              </div>
            </div>
            <div class="wrapper" data-gender="F">
              <p class="info">
                <strong class="gender">Women's</strong><!--<span> • </span>
                <em class="type" data-color="Silver" data-blank-name="">Silver DBH Premium</em>--></p>
              <div class="size">
                <dl><dt class="button" data-size="S" data-product-id="9492" data-subproduct-id="10123">S</dt></dl>
                <dl><dt class="button" data-size="M" data-product-id="9492" data-subproduct-id="10124">M</dt></dl>
                <dl><dt class="button" data-size="L" data-product-id="9492" data-subproduct-id="10125">L</dt></dl>
                <dl><dt class="button" data-size="XL" data-product-id="9492" data-subproduct-id="10126">XL</dt></dl>
              </div>
            </div>
            <a href="<?php echo $shopcartURL;?>" class="linkbutton">Add to Cart</a>
            <div id="reprint_request_msg"></div>
          </section>
          <!--<span class="description">
            <strong>Printing: </strong>Extra Soft, Jumbo Front Print.</span>-->
        </section>
        
        <!--<div id="cart_overlay_popup"></div>
        <ul id="product-detail-thumbs">
          <li>
            <a class="thumb curr-thumb-selected-img" href="" data-gender="M" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxq_9lu-640x480-b.png&quot; id=&quot;men_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxq_9lu-43x43.png">
              <img src="img/2pxq_9lu-43x43.png"></a>
          </li>
          <li>
            <a class="thumb " href="" data-gender="M" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxr_jg4-640x480-b.png&quot; id=&quot;men_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxr_jg4-43x43.png">
              <img src="img/2pxr_jg4-43x43.png"></a>
          </li>
          <li>
            <a class="thumb " href="" data-gender="W" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxs_qsn-640x480-b.png&quot; id=&quot;women_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxs_qsn-43x43.png">
              <img src="img/2pxs_qsn-43x43.png"></a>
          </li>
          <li>
            <a class="thumb " href="" data-gender="W" data-big-img="&lt;img alt=&quot;&quot; src=&quot;http://cdn.designbyhumans.com/product/126/2pxt_a4k-640x480-b.png&quot; id=&quot;women_image&quot; class=&quot;&quot;/&gt;" data-thumb-img="http://cdn.designbyhumans.com/product/126/2pxt_a4k-43x43.png">
              <img src="img/2pxt_a4k-43x43.png"></a>
          </li>
        </ul>-->
      </section>
            
      <!-- Social Interaction start -->
      <footer class="lower">
        <ul class="sidebar-interact">
          <li><a href="http://www.designbyhumans.com/shop/detail/men/9492/#" class="like auth add_to_fav" data-id="product_9492" title="0 Likes">Like</a>
          </li>
          <li><a href="javascript:void(0);" class="common-overlay-link link">Link</a></li>
          <li><a class="share" 
            href="http://www.facebook.com/share.php?u=http://www.designbyhumans.com/shop/detail/men/9492" 			
            target="_blank">Share</a>
          </li>
          <li><a class="tweet" target="_blank" href="http://twitter.com/home?status=Limited%20Edition%20-%20DINO%20FRENZY%20T-shirt%20by%20MR-NICOLO%20from%20Design%20By%20Humans%20http://www.designbyhumans.com/shop/detail/men/9492" title="Click to share this post on Twitter">Tweet</a>
          </li>
        </ul>
      </footer>
      <!-- Social Interaction end -->
    </aside>
    <div id="show-link-in-popup"></div>
  </section>

  <section id="product-relations">
    <section class="main">
      <!-- Product Suggestions start -->
      <!--<section id="product-suggestions">
        <div class="title-bar"><h2>More Great Tees...</h2></div>
        <div class="column ">
          <a class="img_wrap" href="http://www.designbyhumans.com/shop/detail/men/6160">
            <img src="img/ayo-141x125.png"></a>
          <p class="tee_info new sale"><span class="price">MYR20</span></p>
          <div class="tee_attributes">
            <a class="product-title" href="http://www.designbyhumans.com/shop/detail/men/6160">kwaaaaaak</a>
            <span class="artist">
              by <a href="http://www.designbyhumans.com/profile/Ncwwsww">Ncwwsww</a></span>
          </div>
        </div>
        <div class="column ">
          <a class="img_wrap" href="http://www.designbyhumans.com/shop/detail/men/6202">
            <img src="img/aq6-141x125.png"></a>
          <p class="tee_info new sale"><span class="price">MYR20</span></p>
          <div class="tee_attributes">
            <a class="product-title" href="http://www.designbyhumans.com/shop/detail/men/6202">Mr. Typo</a>
            <span class="artist">
              by <a href="http://www.designbyhumans.com/profile/nicebleed">nicebleed</a></span>
          </div>
        </div>
        <div class="column ">
          <a class="img_wrap" href="http://www.designbyhumans.com/shop/detail/men/9322">
            <img src="img/eew-141x125.png"></a>
          <p class="tee_info new sale"><span class="price">MYR22</span></p>
          <div class="tee_attributes">
            <a class="product-title" 
              href="http://www.designbyhumans.com/shop/detail/men/9322">Falling Stars</a>
            <span class="artist">
              by <a href="http://www.designbyhumans.com/profile/expo">expo</a></span>
          </div>
        </div>
        <div class="column  last ">
          <a class="img_wrap" href="http://www.designbyhumans.com/shop/detail/men/7718">
            <img src="img/bo8-141x125.png"></a>
          <p class="tee_info new sale"><span class="price">MYR22</span></p>
          <div class="tee_attributes">
            <a class="product-title" 
              href="http://www.designbyhumans.com/shop/detail/men/7718">Shooting Stars!</a>
            <span class="artist">
              by <a href="http://www.designbyhumans.com/profile/mrdavenport">mrdavenport</a></span>
          </div>
        </div>
      </section>-->
      <!-- Product Suggestions end -->
      
      <!-- Product Feedback start -->
      <section class="comments">
        <div id="view_posts" class="container">
          <div class="title-bar" id="counter-container" data-counter-val="2">
            <h2>1 Comments</h2>
          </div>		
          <section class="comment " id="comment-eqfk">
            <div class="hd">
              <div class="left">
                <a class="avatar no-image_thumb" href="http://www.designbyhumans.com/profile/Ingkong">
                  <img src="img/2i06_6pa-37x37.png" alt="Ingkong"></a>
                <a class="username" href="http://www.designbyhumans.com/profile/Ingkong">Ingkong</a>
                <span class="location">7,107 Islands, Philippines</span>
                <span class="rank">Artist</span>
              </div>
              <div class="right">
                <div class="status">
                  <time class="timestamp">53 minutes ago &nbsp; •</time>
                  <span class="likes">&nbsp;0 Like</span>
                </div>
                <ul class="actions">
                  <li class="ireply">
                    <a href="javascript:void(0);" class="auth comment_reply" data-postid="687440" 
                    data-postername="Ingkong" title="Add Reply">Reply</a>
                  </li>
                  <li class="ilike">
                    <a href="javascript:void(0);" class="like auth  add_to_fav" data-id="post_687440" 
                    title="0 Likes">Like</a>
                  </li>
                  <li class="ireport">
                    <a href="javascript:void(0);" class="auth report-comment" data-topic-id="9492" 
                    data-post-id="687440" 
                    data-post-url="http://www.designbyhumans.com/shop/detail/women/9492#comment-eqfk" 
                    data-post-type="PRODUCT" title="Report Comment">Report</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bd" id="article-687440">
              <article class="textile">	<p>wow i like the new color combinations here…COOL!</p></article>
            </div>
            <div class="alert" id="comment-report-msg-687440"><div class=""></div></div>
          </section>		

          <div id="report-comment-overlay" class="hidden-elem" title="Report this comment">
            <span class="m_forum_reportcomment-REST m-alert"></span><div id="report-comment-error"></div>
            <form id="report-comment-form" action="http://www.designbyhumans.com/a/ReportComment">
            <fieldset>
              <ul style="text-align: left;">
                <li>
                  <input name="topic_id" id="topic_id" type="hidden" value="">
                  <input name="post_id" id="post_id" type="hidden" value="">
                  <input name="post_url" id="post_url" type="hidden" value="">
                  <input name="post_type" id="post_type" type="hidden" value="">
                </li>
                <li><div class="alert hidden-elem report_msg_req"><div class="error"></div></div></li>
                <li><p style="font-size: 15px; font-weight: bold">Message:</p></li>
                <li>
                  <textarea name="report_message" id="report_message" class="non_resizeable" style="width: 99%; height: 100px; font-size: 13px; padding: 2px;"></textarea>
                </li>
                <li>
                  <p style="font-size: 13px;"><b>Note:</b> this is ONLY to be used to report spam, advertising, illegal, and abusive posts/replies.</p>
                </li>
                <li class="buttons" style="float: right; ">
                  <a class="auth submit-report linkbutton" style="padding: 5px 10px;">Report</a>
                </li>
              </ul>
            </fieldset>
            </form>
          </div>
          <div id="delete-comment-overlay"></div>
        </div>
        <div id="add_post">
          <div id="comment-section">
            <form id="add-post-form" method="POST" class="m-form" action="http://www.designbyhumans.com/a/AddComment" name="add-post-form" data-targetaction="forum/addcomment" data-events="submit=Discussion.handleCommentSubmit;submit=manu.form.submitAjaxForm" data-cb-success="Discussion.commentSuccessHandler" data-cb-error="Discussion.commentErrorHandler">
            <div class="alert">
              <span class="m_f_add-post-form-REST m-alert"></span>
              <span class="m_forum_addcomment-REST m-alert"></span></div>
            <ul>
              <li>
                <input name="post_entity" id="post_entity" type="hidden" value="PRODUCT"> 
                <input name="post_entity_id" id="post_entity_id" type="hidden" value="9492"> 
                <input name="forum_id" id="forum_id" type="hidden" value="0"> 
                <input name="topic_id" id="topic_id" type="hidden" value="9492">
              </li>
              <li>
                <textarea name="user_comment" id="user_comment" class="comment-input uniform">Join the conversation! Type your comment here...</textarea>
              </li>
              <li class="comment-buttons">
                <dl>
                  <dd>
                    <small><strong>URLs</strong> "Link Text":URL</small>
                    <small><strong>Images</strong> !imageurl.jpg!</small>
                    <small><strong>Bold</strong> *bold*</small>
                    <small><strong>Italic</strong> _italic_</small>
                  </dd>
                </dl>
                <a id="post_comment" href="javascript:void(0)" class="auth linkbutton" title="Submit Comment" 
                data-events="click=manu.form.submitForm">Submit Comment</a>
                <a id="post_preview" class="linkbutton comment-preview" href="javascript:void(0);">Preview</a>
              </li>
            </ul>
            </form>
          </div>
          <div id="preview-new-topic" class="hidden"></div>
        </div>
      </section>
      <!-- Product Feedback end -->
    </section>
  
    <!-- Side Content start -->
    <!--<aside class="sidebar">
      <!-- Artist Profile start --
      <h2>About the Artist</h2>
      <div class="inside">
        <section id="artist-profile">
          <section id="artist-info">
            <div class="wrap">
              <a href="http://www.designbyhumans.com/profile/MR-NICOLO"><img class="avatar" src="img/13wi-50x50.gif" 
              alt="MR-NICOLO"></a>
              <a href="http://www.designbyhumans.com/profile/MR-NICOLO"><strong>MR-NICOLO</strong></a>
              <time>Member Since 2008</time>
            </div>
            <p> Illustration, Vector </p>
          </section>
          <section id="winning-designs" class="side-art">
            <h3>Other Winning Designs</h3>
            <ul>
              <li>
                <a href="http://www.designbyhumans.com/shop/detail/5773/"><img src="img/osf-70x60.jpg" title="DINO FRENZY"></a>
              </li>
            </ul>
          </section>
        </section>
      </div>
      <!-- Artist Profile end --
      <h2>Community Fans</h2>
      <div class="inside">
        <section id="earn-dbh-dollars">
          <a class="img auth" href=""><img src="img/referral_link.png" width="290px"></a>
        </section>
        <section id="product-users"></section>
      </div>
    </aside>-->
    <!-- Side Content end -->
  </section>
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
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js" charset="utf-8"></script>
<script type="text/javascript" src="js/fancybox/jquery.easing-1.3.pack.js" charset="utf-8"></script>
<script type="text/javascript" src="js/CommonSearch.js" charset="utf-8"></script>
<script type="text/javascript" src="js/manu.pagination.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery/jquery.ui.autocomplete.selectFirst.js" charset="utf-8"></script>

<script>
	manu.loadedStyles = ["css\/3324.css","http:\/\/fonts.googleapis.com\/css?family=PT+Sans:regular,bold&v1","css\/jquery-ui-1.8.10.custom.css","css\/dbh_screen.css","css\/jquery.fancybox-1.3.4.css","css\/manu.form.css","css\/manu.autocomplete.css","css\/manu.default.css","css\/app.css","css\/ie7.css"];
	manu.loadedScripts = ["js\/jquery\/jquery.form.js","js\/jquery\/jquery.fcbkcomplete.js","js\/manu.js","js\/manu.autocomplete.js","js\/manu.form.js","js\/manu.uploader.js","js\/app.js","js\/dbh.js","js\/shop.js","js\/Forum.js","js\/common.js","js\/design.js","js\/profile.js","js\/cart.js","js\/3324.js","js\/fancybox\/jquery.fancybox-1.3.4.pack.js","js\/fancybox\/jquery.easing-1.3.pack.js","js\/CommonSearch.js","js\/manu.pagination.js","js\/jquery\/jquery.ui.autocomplete.selectFirst.js"];
</script>

<script type="text/javascript">jQuery(function() { var handlers = {"Shop.handleTeesToggle":{"name":"Shop.handleTeesToggle","params":[],"alwaysExec":false},"Shop.handleFancybox":{"name":"Shop.handleFancybox","params":[],"alwaysExec":false},"Login.handleLoginPopupEvents":{"name":"Login.handleLoginPopupEvents","params":[],"alwaysExec":false},"Register.showRegisterOverlayWindow":{"name":"Register.showRegisterOverlayWindow","params":[],"alwaysExec":false},"ShoppingCart.handleCartEvents":{"name":"ShoppingCart.handleCartEvents","params":[],"alwaysExec":false},"Profile.handleQuickLinks":{"name":"Profile.handleQuickLinks","params":[],"alwaysExec":false},"Shop.handleProductDetailThumb":{"name":"Shop.handleProductDetailThumb","params":[],"alwaysExec":false},"Shop.handleReprint":{"name":"Shop.handleReprint","params":[],"alwaysExec":false},"Forum.handlePostPreview":{"name":"Forum.handlePostPreview","params":[],"alwaysExec":false},"Discussion.handleCommentSubmit":{"name":"Discussion.handleCommentSubmit","params":[],"alwaysExec":false},"Discussion.handleUserDiscussions":{"name":"Discussion.handleUserDiscussions","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.pagination.handleEvents":{"name":"manu.pagination.handleEvents","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.form.handleFormEvents--845b7f5c22f788b1ed37b80420d31683":{"name":"manu.form.handleFormEvents","params":["add-post-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_add-post-form"] = {"post_entity":[],"post_entity_id":[],"forum_id":[],"topic_id":[],"user_comment":{"rules":[{"name":"required","args":{"label":"User comment"},"msg":"Please enter comment"}]},"post_comment":[]};
        gMessages['product/productusers'] = {"no_product_like_users":{"msg":"No humans found.","type":"I","style":"","global":false}};
        manu.validation.displayMessages('product/productusers', gMessages['product/productusers'], 0);
            var handlers = {"manu.form.handleFormEvents--824b1048522773579c56f46803824745":{"name":"manu.form.handleFormEvents","params":["common_search"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_common_search"] = {"header_search":[]};var handlers = {"manu.form.handleFormEvents--88c9489e8d8bfaabd5df6bd7e6b47102":{"name":"manu.form.handleFormEvents","params":["login"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_login"] = {"username":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"}]},"pwd":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"}]},"rememberme":[],"submit":[],"redirect":[]};var handlers = {"manu.form.handleFormEvents--acde6a868d8bcd9ea8cad83ea27e7e96":{"name":"manu.form.handleFormEvents","params":["register"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_register"] = {"user_name":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"},{"name":"alphanumeric","args":[],"msg":"Username must only contain letters and numbers."},{"name":"minLength","args":[4],"msg":"Username must be at least 4 characters long."},{"name":"maxLength","args":[40],"msg":"Username must not exceed 40 characters."}]},"pwd_register":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"},{"name":"minLength","args":[4],"msg":"Passwords must be non-empty, at least four characters and match the confirmation."}]},"conf_pwd":{"rules":[{"name":"required","args":{"label":"Confirm Password"},"msg":"Confirm password is required"},{"name":"matchOther","args":["pwd_register"],"msg":"Confirm Password must match Password."}]},"email":{"rules":[{"name":"required","args":{"label":"Email Address"},"msg":"Email is required"},{"name":"email","args":[],"msg":"Email Address must be a valid email."}]},"confEmail":{"rules":[{"name":"required","args":{"label":"Confirm Email"},"msg":"Confirm email is required"},{"name":"email","args":[],"msg":"Confirm Email must be a valid email."},{"name":"matchOther","args":["email"],"msg":"Confirm Email must match Email Address."}]},"countrylist":{"rules":[{"name":"required","args":{"label":"Country"},"msg":"Country is required"}]},"promos":[],"terms":[],"submit":[]};var handlers = {"manu.form.handleFormEvents--732f83b1a626ac9a007fa76146e7fc9f":{"name":"manu.form.handleFormEvents","params":["join-news-letter-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_join-news-letter-form"] = {"news_letter_email":{"rules":[{"name":"email","args":[],"msg":"News letter email must be a valid email."}]},"submit":[]};});</script>

<script type="text/javascript">
adroll_adv_id = "WN4L2OR7HVERNM5GTU2GIT"; adroll_pix_id = "N5H6KBFN7RBAHPDL4QP6QZ"; (function () { var oldonload = window.onload; window.onload = function(){ __adroll_loaded=true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute('async', 'true'); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js";
((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
if(oldonload){oldonload()}};
}());
</script>

<div id="fancybox-tmp"></div><div id="fancybox-loading"><div></div></div><div id="fancybox-overlay"></div><div id="fancybox-wrap"><div id="fancybox-outer"><div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div><div id="fancybox-content"></div><a id="fancybox-close"></a><div id="fancybox-title"></div><a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a></div></div>