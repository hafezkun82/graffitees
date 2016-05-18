<nav id="site-navigation">
  <ul class="main-nav">
    <li><a class="" href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid);?>" title="Homepage">Homepage</a></li>
    <li class="dropdown-parent" id="menu-1">
      <a class="dropdown-arrow" href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=all");?>">Shop</a>
      <ul class="dropdown-child">
        <li><a href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=mens");?>" title="Shop Men's T-Shirts">Men's</a></li>
        <li><a href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=womens");?>">Women's</a></li>
        <li><a href="<?php echo($_SERVER['PHP_SELF']."?sid=".$sessionid."&pg=shop_tshirt&prodcat=kids");?>" title="Shop Kid's T-Shirts">Kid's</a></li>
        <!--<li><a href="http://www.designbyhumans.com/shop/gender,m/size,all/shopby,special/" title="Special Design T-Shirts">Special Tees</a></li>-->
      </ul>
    </li>
    <!--<li class="dropdown-parent">
      <a class="dropdown-arrow" href="http://www.designbyhumans.com/vote/" title="Vote for your favorite t-shirt design">Vote</a>
      <ul class="dropdown-child">
        <li><a href="http://www.designbyhumans.com/vote/showby,inrunning/" title="Ongoing t-shirt design contests">In the Running</a></li>
        <li><a href="http://www.designbyhumans.com/vote/contest,special/" title="Featured t-shirt contests">Special Contests</a></li>
      </ul>
    </li>-->
    <!--<li class="dropdown-parent">
      <a class="auth " href="http://www.designbyhumans.com/custom/" title="Customize your t-shirt design">Custom Design</a>
      <ul class="dropdown-child">
        <li><a href="http://www.designbyhumans.com/vote/showby,inrunning/" title="New t-shirt design">New Design</a></li>
        <li><a href="http://www.designbyhumans.com/vote/contest,special/" title="Your own t-shirt design in storage">In Storage</a></li>
      </ul>
    </li>-->
    <li><a class="" href="http://www.designbyhumans.com/forum/" title="Track your currently order status">Track Order</a></li>
    <!--<li><a class="" href="http://www.designbyhumans.com/giveback/" title="Give feedback about the service provided">Feedback</a></li>-->
    <!--<li><a class=" dropdown-arrow last" href="http://www.designbyhumans.com/help/" title="Website help">Help</a></li>-->
  </ul>
</nav>