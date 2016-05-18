<?php

ob_start();

/*		Removing browser caching		*/

header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" ); 
header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" ); 
header( "Cache-Control: no-cache, must-revalidate" ); 
header( "Pragma: no-cache" ); 

include("classes/Product.class.php");

$sessionid = $session->getVar("SESSIONID");

?>
<section id="content">
  <section id="home">
    <!-- Slideshow start -->
    <section id="slideshow">
      <div id="slide_holder">
        <div style="display: block;" data-index="0" class="slide hidden">
          <a href="http://www.designbyhumans.com/shop/detail/9488" class="display"><img src="img/2pe4_6th-x440.jpg" title="Meteor Shower"></a>
          <div class="attributes">
            <time>11/12/11</time>
            <h2>Shirt of the Day: Meteor Shower</h2>&nbsp;
            <!--<a href="http://www.designbyhumans.com/profile/ignzed/" class="by-artist">  by ignzed</a>-->
            <a href="http://www.designbyhumans.com/shop/detail/9488" class="buy-now">MYR15 • Buy Now</a></div></div>
        <!--
        <div style="display: none;" data-index="1" class="slide hidden">
          <a href="http://www.designbyhumans.com/shop/detail/9115" class="display"><img src="img/2oys_ti9-x440.jpg" title="Highrise"></a>
          <div class="attributes">
            <time>03/26/08</time>
            <h2>MYR10 for 10 days: Highrise</h2>&nbsp;
            <a href="http://www.designbyhumans.com/profile/radiomode/" class="by-artist">  by radiomode</a>
            <a href="http://www.designbyhumans.com/shop/detail/9115" class="buy-now">MYR10 • Buy Now</a></div></div>
        <div style="display: none;" data-index="2" class="slide hidden">
          <a href="http://www.designbyhumans.com/shop/detail/9467" class="display"><img src="img/2ojo_3pn-x440.jpg" title="Limited Edition Cosmonaut"></a>
          <div class="attributes">
            <time>09/16/11</time>
            <h2>Limited Edition Tee: Limited Edition Cosmonaut</h2>&nbsp;
            <a href="http://www.designbyhumans.com/profile/TheMightytiki/" class="by-artist">  by TheMightytiki</a>
            <a href="http://www.designbyhumans.com/shop/detail/9467" class="buy-now">MYR15 • Buy Now</a></div></div>
        <div style="display: block;" data-index="3" class="slide hidden">
          <a href="http://www.designbyhumans.com/shop/category,skulls" class="display"><img src="img/2omg_0jk-x440.jpg" title="Scary Tees"></a>
          <div class="attributes">
            <time>10/09/11</time>
            <h2>Halloween is coming...: Scary Tees</h2></div></div>
        <div style="display: none;" data-index="4" class="slide hidden">
          <a href="http://www.designbyhumans.com/forum/dbh-news/904277/" class="display"><img src="img/2oyw_x1a-x440.jpg" title="Top 21"></a>
          <div class="attributes">
            <time>10/10/11</time>
            <h2>Top Printed Designers: Top 21</h2></div></div>-->
      </div>
      <ul class="nav">
        <li data-index="0"><div class="outer"><div style="width: 0px; display: block;" class="inner"></div></div><a href="">Shirt of the Day</a></li>
        <!--
        <li data-index="1"><div class="outer"><div style="width: 0px; display: block;" class="inner"></div></div><a href="">MYR10 for 10 days</a></li>
        <li data-index="2"><div class="outer"><div style="width: 0px; display: block;" class="inner"></div></div><a href="">Limited Edition Tee</a></li>
        <li data-index="3"><div class="outer"><div style="width: 171.684px; display: block; overflow: hidden;" class="inner"></div></div><a href="">Halloween is coming...</a></li>
        <li data-index="4" class="last"><div class="outer"><div style="width: 0px; display: block;" class="inner"></div></div><a href="">Top Printed Designers</a></li>-->
      </ul>      
    </section>
    <!-- Slideshow end -->
  
    <!-- Brief start -->
    <!--<section id="dbh-welcome">
      <span class="dbh-welcome">
        <h1>What is DESIGN<em>BY</em>HÜMANS?</h1>
        <p>DBH is an ongoing t-shirt design competition and community where artists and t-shirt lovers can create, buy, and talk about art and t-shirts.</p>
      </span>
      <a href="http://www.designbyhumans.com/register" id="dbh-welcome-popregister" data-attr="inline" title="Sign Up!">
      <strong> Sign Up! </strong>Be part of<br>our community...</a>
      <a href="http://www.designbyhumans.com/vote/" id="dbh-welcome-popvote" title="Vote Now!">Vote Now!</a>
    </section>-->
    <!-- Brief end -->

    <!--
    <section id="dbh-welcome">
      <img src="/images/layout/home/dbh_welcome_promo_01.png" /><a href="http://www.designbyhumans.com/register" id="popregister" data-attr='inline'><img src="/images/layout/home/dbh_welcome_promo_02.png"></a><img src="/images/layout/home/dbh_welcome_promo_03.png"><a href="/vote/"><img src="/images/layout/home/dbh_welcome_promo_04.png"></a>
    </section>
    -->
    
    <!-- Product Display start -->
    <section class="main">
      <section id="products" class="product_grid_set">
        <section id="recent_tees" class="block product_grid">
          <div class="title-bar">
            <h2>Top Favorite Tees/Spender</h2>
            <div class="title-bar-inner">
              <span>Shop New T-Shirts</span>
              <nav><a href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=mens");?>" class="">Mens</a> | 
                <a href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=womens");?>" class="">Womens | Auw Auw</a></nav></div></div>
          <ul>
					<?php
          $row = array();
					$productObj = new Product(); 
					$row = $productObj->getAllProduct();
					
					$arrThumb = array();
          $len = count($row);
          for($i=0;$i<$len;$i++){
            //$arrThumb = explode("|",$row[$i]['P_THUMB_NAME']);
						$productID = $row[$i]['Prod_ID'];
						$productName = $row[$i]['Prod_Name'];
						$productPrice = $row[$i]['Prod_Price'];
						$thumbName = $row[$i]['Prod_Thumb_Name'];
            $pathToThumb = "imageupload/thumb/".$thumbName;
						$productURL = $_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt_details&productid=".$productID;
            //echo "<li><img src='$pathToThumb' width='200' height='200' /></li>";?>
            <li class="single_tee_mini ">
              <p class="tee_photo">
                <a class="tee_photo" href="<?php echo $productURL;?>" title="<?php echo $productName;?>">
                  <img src="<?php echo $pathToThumb;?>" width='133' height='234' alt="<?php echo $productName;?>"></a></p>
              <p class="tee_info new sale">
                <span class="price">MYR<?php echo $productPrice;?></span>
                <span class="status new">NEW!</span></p>
              <div class="tee_attributes">
                <a class="tee-title" href="<?php echo $productURL;?>"><?php echo $productName;?></a>
                <!--<span>by </span><a class="tee-artist" href="http://www.designbyhumans.com/profile/ignzed/"> ignzed</a>--></div>
            </li><?php
          } ?>
          </ul>
        </section>
      </section>
    </section>
    <!-- Product Display end -->
    
    <!-- Side Content start -->
    <aside id="side">
      <section id="follow-dbh">
        <h2>Follow GraffiTees</h2>
        <div class="inside">
          <ul class="last">
            <li class="icons-follow-facebook"><a href="http://www.facebook.com/dbhtees">Facebook</a></li>
            <li class="icons-follow-twitter last"><a href="http://www.twitter.com/designbyhumans">Twitter</a></li>
          </ul></div>
      </section>
      
      <section id="home-ads">
        <h2>Current-TEE-vents</h2>
        <div class="inside">	
          <!--<a href="http://www.designbyhumans.com/shop/detail/9115"><img src="img/2oyn-202x.jpg" title="MYR10 for 10 days: Highrise" width="202"></a>-->
          <a href="http://www.designbyhumans.com/shop/gender,m/size,all/shopby,special/"><img src="img/2h5m-202x.jpg" title="Tee.G.I.F" width="202"></a>
          <a href="http://www.designbyhumans.com/shop/gender,k/size,all"><img src="img/2ojk-202x.jpg" title="KIDS TEES" width="202"></a></div>
      </section>
      
      <!--
      <section id="home-featured-submissions">
        <h2>Featured Submissions</h2>
        <div class="inside">
          <ul>
            <li>
              <a href="http://www.designbyhumans.com/vote/detail/92285" class="art_file" title="City Camo">
              <img src="img/2pjw_sqy-100x100.jpg" alt="City Camo T-Shirts by 7sixes" width="100"></a>
            </li>
            <li class="last">
              <a href="http://www.designbyhumans.com/vote/detail/90899" class="art_file" title="Kaiser Pop Zombie">
              <img src="img/2kfb_i8t-100x100.jpg" alt="Kaiser Pop Zombie T-Shirts by vcalahan" width="100"></a>
            </li>
            <li>
              <a href="http://www.designbyhumans.com/vote/detail/90493" class="art_file" title="CRY GLITTZ">
              <img src="img/22vi-100x100.jpg" alt="CRY GLITTZ T-Shirts by rodrigoagostinho" width="100"></a>
            </li>
            <li class="last">
              <a href="http://www.designbyhumans.com/vote/detail/91912" class="art_file" title="el lucho">
              <img src="img/2oaa_pjl-100x100.jpg" alt="el lucho T-Shirts by yen2t08" width="100"></a>
            </li>
            <li>
              <a href="http://www.designbyhumans.com/vote/detail/91379" class="art_file" title="The Planet &amp; The Ape.">
              <img src="img/2mbv_d9n-100x100.jpg" alt="The Planet &amp; The Ape. T-Shirts by Ncwwsww" width="100"></a>
            </li>
            <li class="last">
              <a href="http://www.designbyhumans.com/vote/detail/91857" class="art_file" title="Peaceful Journey">
              <img src="img/2o4e_zjs-100x100.jpg" alt="Peaceful Journey T-Shirts by fik714" width="100"></a>
            </li>
            <li>
              <a href="http://www.designbyhumans.com/vote/detail/91765" class="art_file" title="In which a wolfy moon thing happens">
              <img src="img/2nsh_cnd-100x100.jpg" alt="In which a wolfy moon thing happens T-Shirts by WindUpTheatre" width="100"></a>
            </li>
            <li class="last">
              <a href="http://www.designbyhumans.com/vote/detail/91045" class="art_file" title="Pieces">
              <img src="img/2l17_r4x-100x100.jpg" alt="Pieces T-Shirts by tatteredsoul" width="100"></a>
            </li>
          </ul></div>
      </section>-->
      
      <!--
      <section id="home-news">
        <h2>Latest News</h2>
        <div class="inside">
          <dl>
            <dt class="info"><time>Oct 13, 2011</time></dt>
            <dd class="title "><a href="http://www.designbyhumans.com/shop/category,skulls">DBHSkulls - 10% off code »</a></dd>
            <dt class="info"><time>Oct 10, 2011</time></dt>
            <dd class="title "><a href="http://www.designbyhumans.com/shop/detail/9115">MYR10 for 10 days - Highrise! »</a></dd>
            <dt class="info"><time>Oct 07, 2011</time></dt>
            <dd class="title last"><a href="http://www.designbyhumans.com/forum/dbh-news/904277/">Most Printed DBH Artists »</a></dd>
          </dl></div>
      </section>-->
    </aside>
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
<script type="text/javascript" src="js/3314.js" charset="utf-8"></script>
<script type="text/javascript" src="js/CommonSearch.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery/jquery_002.js" charset="utf-8"></script>

<script>
	 manu.loadedStyles = ["css\/3314.css","http:\/\/fonts.googleapis.com\/css?family=PT+Sans:regular,bold&v1","css\/jquery-ui-1.8.10.custom.css","css\/dbh_screen.css","css\/manu.form.css","css\/manu.autocomplete.css","css\/manu.default.css","css\/app.css","css\/ie7.css"];
	 manu.loadedScripts = ["js\/jquery\/jquery.form.js","js\/jquery\/jquery.fcbkcomplete.js","js\/manu.js","js\/manu.autocomplete.js","js\/manu.form.js","js\/manu.uploader.js","js\/app.js","js\/dbh.js","js\/shop.js","js\/Forum.js","js\/common.js","js\/design.js","js\/profile.js","js\/cart.js","js\/3314.js","js\/CommonSearch.js","js\/jquery\/jquery.ui.autocomplete.selectFirst.js"];
</script>

<script type="text/javascript">jQuery(function() { var handlers = {"Login.handleLoginPopupEvents":{"name":"Login.handleLoginPopupEvents","params":[],"alwaysExec":false},"Register.showRegisterOverlayWindow":{"name":"Register.showRegisterOverlayWindow","params":[],"alwaysExec":false},"Home.Slideshow.init":{"name":"Home.Slideshow.init","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.form.handleFormEvents--824b1048522773579c56f46803824745":{"name":"manu.form.handleFormEvents","params":["common_search"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_common_search"] = {"header_search":[]};var handlers = {"manu.form.handleFormEvents--88c9489e8d8bfaabd5df6bd7e6b47102":{"name":"manu.form.handleFormEvents","params":["login"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_login"] = {"username":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"}]},"pwd":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"}]},"rememberme":[],"submit":[],"redirect":[]};var handlers = {"manu.form.handleFormEvents--acde6a868d8bcd9ea8cad83ea27e7e96":{"name":"manu.form.handleFormEvents","params":["register"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_register"] = {"user_name":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"},{"name":"alphanumeric","args":[],"msg":"Username must only contain letters and numbers."},{"name":"minLength","args":[4],"msg":"Username must be at least 4 characters long."},{"name":"maxLength","args":[40],"msg":"Username must not exceed 40 characters."}]},"pwd_register":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"},{"name":"minLength","args":[4],"msg":"Passwords must be non-empty, at least four characters and match the confirmation."}]},"conf_pwd":{"rules":[{"name":"required","args":{"label":"Confirm Password"},"msg":"Confirm password is required"},{"name":"matchOther","args":["pwd_register"],"msg":"Confirm Password must match Password."}]},"email":{"rules":[{"name":"required","args":{"label":"Email Address"},"msg":"Email is required"},{"name":"email","args":[],"msg":"Email Address must be a valid email."}]},"confEmail":{"rules":[{"name":"required","args":{"label":"Confirm Email"},"msg":"Confirm email is required"},{"name":"email","args":[],"msg":"Confirm Email must be a valid email."},{"name":"matchOther","args":["email"],"msg":"Confirm Email must match Email Address."}]},"countrylist":{"rules":[{"name":"required","args":{"label":"Country"},"msg":"Country is required"}]},"promos":[],"terms":[],"submit":[]};var handlers = {"manu.form.handleFormEvents--732f83b1a626ac9a007fa76146e7fc9f":{"name":"manu.form.handleFormEvents","params":["join-news-letter-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_join-news-letter-form"] = {"news_letter_email":{"rules":[{"name":"email","args":[],"msg":"News letter email must be a valid email."}]},"submit":[]};});</script>

<script type="text/javascript">
adroll_adv_id = "WN4L2OR7HVERNM5GTU2GIT"; adroll_pix_id = "N5H6KBFN7RBAHPDL4QP6QZ"; (function () { var oldonload = window.onload; window.onload = function(){ __adroll_loaded=true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute('async', 'true'); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js";
((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
if(oldonload){oldonload()}};
}());
</script>