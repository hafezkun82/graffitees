<header id="site-header">
  <h1><a id="logo" href="http://www.designbyhumans.com/">Design By Humans</a></h1>
  <!-- Main Navigation start -->
  <?php include("main.nav.php"); ?>
  <!-- Main Navigation end -->
  
  <aside id="site-actions">   		     
    <!-- User Navigation start -->
    <ul class="usernav">
      <li><a href="https://www.designbyhumans.com/profile" class="auth">PROFILE</a></li>
			<li><a href="https://www.designbyhumans.com/logout/">LOGOUT</a></li>
      <li class="cart_mini">
        <a href="http://www.designbyhumans.com/cart/">
          <span class="cart_quantity">1</span>
          <span class="cart_name">CART</span>
          <img src="img/cart.gif" height="32" width="32">
        </a>
      </li>
    </ul>
    <!-- User Navigation end -->

    <span class="m_f_common_search-REST m-alert"></span>
    <form id="common_search" method="POST" class="search" action="http://www.designbyhumans.com/searchresult" data-targetaction="common/showtopnavigations" data-events="submit=manu.form.submitRegularForm">
      <ul>
        <li>
        <label for="header_search335">  </label> 
        <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" name="header_search" id="header_search335" data-source-action="CommonSearch?send=alias" class="m-form-autocomplete  ui-autocomplete-input" data-select-handler="Common.handleSelectedProduct" data-skip-select="1">
          <ul class="result_container"></ul> <div class="clear"></div>
        </li>
      </ul>
    </form>
    <div class="mc-topbar-topSearches mc-text-small mc-color-dim"></div>
  </aside>
</header>