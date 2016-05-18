<?php

ob_start();

/*		Removing browser caching		*/

header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" ); 
header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" ); 
header( "Cache-Control: no-cache, must-revalidate" ); 
header( "Pragma: no-cache" ); 

include("classes/Product.class.php");

$sessionid = $session->getVar("SESSIONID");
$productCat = isset($_GET['prodcat'])?$_GET['prodcat']:'all';

?>
<section id="content">
  <section id="shop">
    <!-- Product Filter start -->
    <section id="shop-filter-container">
      <div class="filters">
        <div id="M" class="men filter">
          <h3>Mens</h3>
          <ul>
            <li><a class="shop-filters selected" href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=mens");?>" 
              data-url="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=mens");?>">ALL</a>
            </li>
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,s" 
              data-url="http://www.designbyhumans.com/shop/gender,m/size,s">S</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,m" 
              data-url="http://www.designbyhumans.com/shop/gender,m/size,m">M</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,l" 
              data-url="http://www.designbyhumans.com/shop/gender,m/size,l">L</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,xl" 
              data-url="http://www.designbyhumans.com/shop/gender,m/size,xl">XL</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,2xl" 
              data-url="http://www.designbyhumans.com/shop/gender,m/size,2xl">2XL</a>
            </li>-->
          </ul></div>
        <div id="F" class="women filter">
          <h3>Womens</h3>
          <ul>
            <li><a class="shop-filters " href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=womens");?>" 
              data-url="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=womens");?>">ALL</a>
            </li>
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,f/size,s" 
              data-url="http://www.designbyhumans.com/shop/gender,f/size,s">S</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,f/size,m" 
              data-url="http://www.designbyhumans.com/shop/gender,f/size,m">M</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,f/size,l" 
              data-url="http://www.designbyhumans.com/shop/gender,f/size,l">L</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,f/size,xl" 
              data-url="http://www.designbyhumans.com/shop/gender,f/size,xl">XL</a>				
            </li>-->
          </ul></div>
        <div id="K" class="kids filter">
          <h3>Kids</h3>
          <ul>
            <li><a class="shop-filters " href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=kids");?>" 
              data-url="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=kids");?>">ALL</a>
            </li>
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,k/size,s" 
              data-url="http://www.designbyhumans.com/shop/gender,k/size,s">S</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,k/size,m" 
              data-url="http://www.designbyhumans.com/shop/gender,k/size,m">M</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,k/size,l" 
              data-url="http://www.designbyhumans.com/shop/gender,k/size,l">L</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,k/size,xl" 
              data-url="http://www.designbyhumans.com/shop/gender,k/size,xl">XL</a>
            </li>-->
          </ul></div>
        <!--<div class="price filter">
          <h3>Price</h3>
          <ul>
            <li><a class="shop-filters selected" href="http://www.designbyhumans.com/shop/gender,m/size,all//price,all" 
              data-url="/shop/gender,m/size,all//price,all">ALL</a>
            </li>			
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//price,12" 
              data-url="/shop/gender,m/size,all//price,12">12</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//price,15" 
              data-url="/shop/gender,m/size,all//price,15">15</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//price,20" 
              data-url="/shop/gender,m/size,all//price,20">20</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//price,25" 
              data-url="/shop/gender,m/size,all//price,25">25</a>
            </li>
          </ul></div>-->
        <div class="filter large last">
          <h3>Shop By</h3>
          <ul>
            <li><a class="shop-filters selected" href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=all");?>" 
              data-url="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=all");?>">All</a>
            </li>
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//shopby,reprints" 
              data-url="/shop/gender,m/size,all//shopby,reprints">Reprints</a>
            </li>-->
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//shopby,almostout" 
              data-url="/shop/gender,m/size,all//shopby,almostout">Almost Out</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//shopby,popular" 
              data-url="/shop/gender,m/size,all//shopby,popular">Popular</a>
            </li>
            <li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//shopby,new" 
              data-url="/shop/gender,m/size,all//shopby,new">New</a>
            </li>-->
            <!--<li><a class="shop-filters " href="http://www.designbyhumans.com/shop/gender,m/size,all//shopby,special" 
              data-url="/shop/gender,m/size,all//shopby,special">Special</a>
            </li>-->
          </ul></div>
      </div>

      <!--<div class="product-nav">
        <ul class="product-nav-right">
          <li class="list-title">View:</li>
          <li class="view_button_small dropdown-parent">
            <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//view,25" 
            data-url="/shop/gender,m/size,all//view,25">25</a>
            <ul class="dropdown-child">
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//view,50" 
              data-url="/shop/gender,m/size,all//view,50"><li class="first">50</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//view,75" 
              data-url="/shop/gender,m/size,all//view,75"><li>75</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//view,100" 
              data-url="/shop/gender,m/size,all//view,100"><li class="last">100</li></a>
            </ul>
          </li>
        </ul>
        <ul id="filter-tools">
          <li class="list-title">Filter by:</li>
          <li class="view_button dropdown-parent">
            <a class="shop-filters" href="../ShopMenTShirt_files/ShopMenTShirt.htm" 
            data-url="/shop/gender,m/size,all/">T-Shirt Style</a>
            <ul class="dropdown-child">
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//style,1" 
              data-url="/shop/gender,m/size,all//style,1"><li class="first">50/50 DBH Perfect</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//style,9" 
              data-url="/shop/gender,m/size,all//style,9"><li>American Apparel</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//style,7" 
              data-url="/shop/gender,m/size,all//style,7"><li>DBH Lil' Humans</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//style,10" 
              data-url="/shop/gender,m/size,all//style,10"><li>DBH Original Tee</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//style,8" 
              data-url="/shop/gender,m/size,all//style,8"><li class="last">DBH Premium</li></a>
            </ul>
          </li>
          <li class="view_button dropdown-parent">
            <a class="shop-filters" href="../ShopMenTShirt_files/ShopMenTShirt.htm" 
            data-url="/shop/gender,m/size,all/">Color</a>
            <ul class="dropdown-child">
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,blacks" 
              data-url="/shop/gender,m/size,all//color,blacks"><li class="first">Blacks</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,blues" 
              data-url="/shop/gender,m/size,all//color,blues"><li>Blues</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,browns" 
              data-url="/shop/gender,m/size,all//color,browns"><li>Browns</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,creams" 
              data-url="/shop/gender,m/size,all//color,creams"><li>Creams</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,greens" 
              data-url="/shop/gender,m/size,all//color,greens"><li>Greens</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,greys" 
              data-url="/shop/gender,m/size,all//color,greys"><li>Greys</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,heathers" 
              data-url="/shop/gender,m/size,all//color,heathers"><li>Heathers</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,others" 
              data-url="/shop/gender,m/size,all//color,others"><li>Others</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,purples" 
              data-url="/shop/gender,m/size,all//color,purples"><li>Purples</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,reds" 
              data-url="/shop/gender,m/size,all//color,reds"><li>Reds</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,silvers" 
              data-url="/shop/gender,m/size,all//color,silvers"><li>Silvers</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,whites" 
              data-url="/shop/gender,m/size,all//color,whites"><li>Whites</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//color,yellows" 
              data-url="/shop/gender,m/size,all//color,yellows"><li class="last">Yellows</li></a>
            </ul>
          </li>
          <li class="view_button dropdown-parent">
            <a class="shop-filters" href="../ShopMenTShirt_files/ShopMenTShirt.htm" 
            data-url="/shop/gender,m/size,all/">Category</a>
            <ul class="dropdown-child">
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,abstract" 
              data-url="/shop/gender,m/size,all//category,abstract"><li class="first">Abstract</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,animals" 
              data-url="/shop/gender,m/size,all//category,animals"><li>Animals</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,birds" 
              data-url="/shop/gender,m/size,all//category,birds"><li>Birds</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,characters" 
              data-url="/shop/gender,m/size,all//category,characters"><li>Characters</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,humans" 
              data-url="/shop/gender,m/size,all//category,humans"><li>Humans</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,music" 
              data-url="/shop/gender,m/size,all//category,music"><li>Music</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,nature" 
              data-url="/shop/gender,m/size,all//category,nature"><li>Nature</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,robots" 
              data-url="/shop/gender,m/size,all//category,robots"><li>Robots</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,scenic" 
              data-url="/shop/gender,m/size,all//category,scenic"><li>Scenic</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,skulls" 
              data-url="/shop/gender,m/size,all//category,skulls"><li>Skulls</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,space" 
              data-url="/shop/gender,m/size,all//category,space"><li>Space</li></a>
              <a class="shop-filters" href="http://www.designbyhumans.com/shop/gender,m/size,all//category,typography" 
              data-url="/shop/gender,m/size,all//category,typography"><li class="last">Typography</li></a>
            </ul>
          </li>
        </ul>
      </div>-->
    </section>
    <!-- Product Filter end -->
    
    <!-- Product Display start -->
    <section id="main" class="container show_tees ">
      <div class="title-bar">
        <h2>Browse Our Unique Tees!</h2>
        <div class="pagination  pgn_scrolltop primary">
          <ul>
            <li class="hidden pgn_action">ShowBrowseTees?uri=/shop/gender,m/size,all/</li>
            <li><a id="pgn_1_1" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/1/" class="page selected">1</a></li>
            <li><a id="pgn_1_2" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/2/" class="page">2</a></li>
            <li><a id="pgn_1_3" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/3/" class="page">3</a></li>
            <li><a id="pgn_1_4" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/4/" class="page">4</a></li>
            <li><a id="pgn_1_5" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/5/" class="page last">5</a></li>
            <li class="ellipses">...</li>
            <li><a id="pgn_1_34" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/34/" class="page">34</a></li>	
            <li><a id="pgn_1_35" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/35/" class="page">35</a></li>
            <li><a id="pgn_1_2" rel="next nofollow" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/2/" class="page last btn">&gt;</a></li>	
          </ul></div>
      </div>

      <div class="blck product_grid">
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
					if($productCat=='all'){ ?>
            <li class="single_tee_mini" id="product-9492_2011-10-20 18:25:11">
              <div class="tee_photo">
                <a href="<?php echo $productURL;?>" title="<?php echo $productName;?>">
                  <img src="<?php echo $pathToThumb;?>" width='133' height='234' alt="<?php echo $productName;?>"></a></div>
              <div class="tee_info">
                <span class="price">MYR<?php echo $productPrice;?></span><span class="dash"> - </span><span class="status new">NEW!</span></div>
              <div class="tee_attributes">
                <a class="tee-title" href="<?php echo $productURL;?>"><?php echo $productName;?></a>
                <!--<span>by</span> <a class="tee-artist" href="http://www.designbyhumans.com/profile/MR-NICOLO/">MR-NICOLO</a>--></div>
            </li><?php
					}else{
						$productCategory = explode("|",$row[$i]['Prod_Option']);
						if((($productCat=='mens') && ($productCategory[0]=='gender-m')) || (($productCat=='womens') && ($productCategory[0]=='gender-f'))){ ?>
								<li class="single_tee_mini" id="product-9492_2011-10-20 18:25:11">
									<div class="tee_photo">
										<a href="<?php echo $productURL;?>" title="<?php echo $productName;?>">
											<img src="<?php echo $pathToThumb;?>" width='133' height='234' alt="<?php echo $productName;?>"></a></div>
									<div class="tee_info">
										<span class="price">MYR<?php echo $productPrice;?></span><span class="dash"> - </span><span class="status new">NEW!</span></div>
									<div class="tee_attributes">
										<a class="tee-title" href="<?php echo $productURL;?>"><?php echo $productName;?></a>
										<!--<span>by</span> <a class="tee-artist" href="http://www.designbyhumans.com/profile/MR-NICOLO/">MR-NICOLO</a>--></div>
								</li><?php
						}
					}
        } ?>
        </ul>
      </div>
      
      <div class="title-bar-bottom">
        <a class="left-action" href="http://www.designbyhumans.com/shop/gender,m/size,all/#">Back to Top</a>
        <div class="pagination  pgn_scrolltop primary">
          <ul>
            <li class="hidden pgn_action">ShowBrowseTees?uri=/shop/gender,m/size,all/</li>
            <li><a id="pgn_1_1" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/1/" class="page selected">1</a></li>
            <li><a id="pgn_1_2" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/2/" class="page">2</a></li>
            <li><a id="pgn_1_3" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/3/" class="page">3</a></li>
            <li><a id="pgn_1_4" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/4/" class="page">4</a></li>
            <li><a id="pgn_1_5" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/5/" class="page last">5</a></li>
            <li class="ellipses">...</li>
            <li><a id="pgn_1_34" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/34/" class="page">34</a></li>
            <li><a id="pgn_1_35" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/35/" class="page">35</a></li>
            <li><a id="pgn_1_2" rel="next nofollow" href="http://www.designbyhumans.com/shop/gender,m/size,all/page/2/" class="page last btn">&gt;</a></li>
          </ul></div></div>
    </section>
    <!-- Product Display end -->
    
    <!-- Side Content start -->
    <aside id="side">
      <section id="quick-links">
        <h2>Quick Links</h2>
        <div class="inside">
          <ul class="vertmenu">
            <li><a href="http://www.designbyhumans.com/sizechart/">Size Chart</a></li>
            <li><a href="http://www.designbyhumans.com/knowledgebase#shipping-faq">Shipping Information</a></li>
            <li><a href="http://www.designbyhumans.com/help/">Service &amp; Help</a></li>
          </ul></div>
      </section>
      <section id="current_contests">
        <h2>Promotions</h2>
        <div class="inside">
          <ul>
            <li><a href="http://www.designbyhumans.com/shop"><img src="img/2nfx.jpg" width="202px"></a></li>
            <!--<li><a href="http://www.designbyhumans.com/shop/detail/5546"><img src="img/2pvc.jpg" width="202px"></a></li>-->
          </ul>
        </div>
      </section>
      <section id="cart_summary">
        <h2>Your Cart</h2>
        <div class="inside">
          <div id="side-view-cart"><p class="caption">Your shopping cart is empty.</p></div></div>
      </section>
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
<script type="text/javascript" src="js/3324.js" charset="utf-8"></script>
<script type="text/javascript" src="js/CommonSearch.js" charset="utf-8"></script>
<script type="text/javascript" src="js/manu.pagination.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery/jquery.ui.autocomplete.selectFirst.js" charset="utf-8"></script>

<script>
	 manu.loadedStyles = ["css\/3324.css","http:\/\/fonts.googleapis.com\/css?family=PT+Sans:regular,bold&v1","css\/jquery-ui-1.8.10.custom.css","css\/dbh_screen.css","css\/manu.form.css","css\/manu.autocomplete.css","css\/manu.default.css","css\/app.css","css\/ie7.css"];
	 manu.loadedScripts = ["js\/jquery\/jquery.form.js","js\/jquery\/jquery.fcbkcomplete.js","js\/manu.js","js\/manu.autocomplete.js","js\/manu.form.js","js\/manu.uploader.js","js\/app.js","js\/dbh.js","js\/shop.js","js\/Forum.js","js\/common.js","js\/design.js","js\/profile.js","js\/cart.js","js\/3324.js","js\/CommonSearch.js","js\/manu.pagination.js","js\/jquery\/jquery.ui.autocomplete.selectFirst.js"];
</script>

<script type="text/javascript">jQuery(function() { var handlers = {"Login.handleLoginPopupEvents":{"name":"Login.handleLoginPopupEvents","params":[],"alwaysExec":false},"Register.showRegisterOverlayWindow":{"name":"Register.showRegisterOverlayWindow","params":[],"alwaysExec":false},"Shop.handleShopCommonEvents":{"name":"Shop.handleShopCommonEvents","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.pagination.handleEvents":{"name":"manu.pagination.handleEvents","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.form.handleFormEvents--824b1048522773579c56f46803824745":{"name":"manu.form.handleFormEvents","params":["common_search"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_common_search"] = {"header_search":[]};var handlers = {"manu.form.handleFormEvents--88c9489e8d8bfaabd5df6bd7e6b47102":{"name":"manu.form.handleFormEvents","params":["login"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_login"] = {"username":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"}]},"pwd":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"}]},"rememberme":[],"submit":[],"redirect":[]};var handlers = {"manu.form.handleFormEvents--acde6a868d8bcd9ea8cad83ea27e7e96":{"name":"manu.form.handleFormEvents","params":["register"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_register"] = {"user_name":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"},{"name":"alphanumeric","args":[],"msg":"Username must only contain letters and numbers."},{"name":"minLength","args":[4],"msg":"Username must be at least 4 characters long."},{"name":"maxLength","args":[40],"msg":"Username must not exceed 40 characters."}]},"pwd_register":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"},{"name":"minLength","args":[4],"msg":"Passwords must be non-empty, at least four characters and match the confirmation."}]},"conf_pwd":{"rules":[{"name":"required","args":{"label":"Confirm Password"},"msg":"Confirm password is required"},{"name":"matchOther","args":["pwd_register"],"msg":"Confirm Password must match Password."}]},"email":{"rules":[{"name":"required","args":{"label":"Email Address"},"msg":"Email is required"},{"name":"email","args":[],"msg":"Email Address must be a valid email."}]},"confEmail":{"rules":[{"name":"required","args":{"label":"Confirm Email"},"msg":"Confirm email is required"},{"name":"email","args":[],"msg":"Confirm Email must be a valid email."},{"name":"matchOther","args":["email"],"msg":"Confirm Email must match Email Address."}]},"countrylist":{"rules":[{"name":"required","args":{"label":"Country"},"msg":"Country is required"}]},"promos":[],"terms":[],"submit":[]};var handlers = {"manu.form.handleFormEvents--732f83b1a626ac9a007fa76146e7fc9f":{"name":"manu.form.handleFormEvents","params":["join-news-letter-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_join-news-letter-form"] = {"news_letter_email":{"rules":[{"name":"email","args":[],"msg":"News letter email must be a valid email."}]},"submit":[]};});</script>
  
<script type="text/javascript">
adroll_adv_id = "WN4L2OR7HVERNM5GTU2GIT"; adroll_pix_id = "N5H6KBFN7RBAHPDL4QP6QZ"; (function () { var oldonload = window.onload; window.onload = function(){ __adroll_loaded=true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute('async', 'true'); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js";
((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
if(oldonload){oldonload()}};
}());
</script>