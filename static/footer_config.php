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
<script type="text/javascript" src="asset/3314.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/3324.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/CommonSearch.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/jquery_002.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/jquery.fancybox-1.3.4.pack.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/jquery.easing-1.3.pack.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/manu.pagination.js" charset="utf-8"></script>
<script type="text/javascript" src="asset/jquery.ui.autocomplete.selectFirst.js" charset="utf-8"></script>

<script>
	manu.loadedStyles = ["http:\/\/www.designbyhumans.com\/css\/3314.css","http:\/\/fonts.googleapis.com\/css?family=PT+Sans:regular,bold&v1","http:\/\/www.designbyhumans.com\/css\/jquery\/dbh-jqueryui\/jquery-ui-1.8.10.custom.css","http:\/\/www.designbyhumans.com\/css\/dbh_screen.css","http:\/\/www.designbyhumans.com\/css\/manu.form.css","http:\/\/www.designbyhumans.com\/css\/manu.autocomplete.css","http:\/\/www.designbyhumans.com\/css\/manu.default.css","http:\/\/www.designbyhumans.com\/css\/app.css","http:\/\/www.designbyhumans.com\/css\/ie7.css"];
	manu.loadedScripts = ["http:\/\/www.designbyhumans.com\/js\/jquery\/jquery.form.js","http:\/\/www.designbyhumans.com\/js\/jquery\/jquery.fcbkcomplete.js","http:\/\/www.designbyhumans.com\/js\/manu.js","http:\/\/www.designbyhumans.com\/js\/manu.autocomplete.js","http:\/\/www.designbyhumans.com\/js\/manu.form.js","http:\/\/www.designbyhumans.com\/js\/manu.uploader.js","http:\/\/www.designbyhumans.com\/js\/app.js","http:\/\/www.designbyhumans.com\/js\/dbh.js","http:\/\/www.designbyhumans.com\/js\/shop.js","http:\/\/www.designbyhumans.com\/js\/Forum.js","http:\/\/www.designbyhumans.com\/js\/common.js","http:\/\/www.designbyhumans.com\/js\/design.js","http:\/\/www.designbyhumans.com\/js\/profile.js","http:\/\/www.designbyhumans.com\/js\/cart.js","http:\/\/www.designbyhumans.com\/js\/3314.js","http:\/\/www.designbyhumans.com\/js\/3324.js","http:\/\/www.designbyhumans.com\/js\/CommonSearch.js","http:\/\/www.designbyhumans.com\/js\/manu.pagination.js","http:\/\/www.designbyhumans.com\/js\/jquery\/jquery.ui.autocomplete.selectFirst.js"];
</script>

<script type="text/javascript">jQuery(function() { var handlers = {"Login.handleLoginPopupEvents":{"name":"Login.handleLoginPopupEvents","params":[],"alwaysExec":false},"Register.showRegisterOverlayWindow":{"name":"Register.showRegisterOverlayWindow","params":[],"alwaysExec":false},"Home.Slideshow.init":{"name":"Home.Slideshow.init","params":[],"alwaysExec":false}};manu.executeJsHandlers(handlers);var handlers = {"manu.form.handleFormEvents--824b1048522773579c56f46803824745":{"name":"manu.form.handleFormEvents","params":["common_search"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_common_search"] = {"header_search":[]};var handlers = {"manu.form.handleFormEvents--88c9489e8d8bfaabd5df6bd7e6b47102":{"name":"manu.form.handleFormEvents","params":["login"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_login"] = {"username":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"}]},"pwd":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"}]},"rememberme":[],"submit":[],"redirect":[]};var handlers = {"manu.form.handleFormEvents--acde6a868d8bcd9ea8cad83ea27e7e96":{"name":"manu.form.handleFormEvents","params":["register"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_register"] = {"user_name":{"rules":[{"name":"required","args":{"label":"Username"},"msg":"Username is required"},{"name":"alphanumeric","args":[],"msg":"Username must only contain letters and numbers."},{"name":"minLength","args":[4],"msg":"Username must be at least 4 characters long."},{"name":"maxLength","args":[40],"msg":"Username must not exceed 40 characters."}]},"pwd_register":{"rules":[{"name":"required","args":{"label":"Password"},"msg":"Password is required"},{"name":"minLength","args":[4],"msg":"Passwords must be non-empty, at least four characters and match the confirmation."}]},"conf_pwd":{"rules":[{"name":"required","args":{"label":"Confirm Password"},"msg":"Confirm password is required"},{"name":"matchOther","args":["pwd_register"],"msg":"Confirm Password must match Password."}]},"email":{"rules":[{"name":"required","args":{"label":"Email Address"},"msg":"Email is required"},{"name":"email","args":[],"msg":"Email Address must be a valid email."}]},"confEmail":{"rules":[{"name":"required","args":{"label":"Confirm Email"},"msg":"Confirm email is required"},{"name":"email","args":[],"msg":"Confirm Email must be a valid email."},{"name":"matchOther","args":["email"],"msg":"Confirm Email must match Email Address."}]},"countrylist":{"rules":[{"name":"required","args":{"label":"Country"},"msg":"Country is required"}]},"promos":[],"terms":[],"submit":[]};var handlers = {"manu.form.handleFormEvents--732f83b1a626ac9a007fa76146e7fc9f":{"name":"manu.form.handleFormEvents","params":["join-news-letter-form"],"alwaysExec":true}};manu.executeJsHandlers(handlers);gValidateRules1["f_join-news-letter-form"] = {"news_letter_email":{"rules":[{"name":"email","args":[],"msg":"News letter email must be a valid email."}]},"submit":[]};});</script>
<script type="text/javascript">
adroll_adv_id = "WN4L2OR7HVERNM5GTU2GIT"; adroll_pix_id = "N5H6KBFN7RBAHPDL4QP6QZ"; (function () { var oldonload = window.onload; window.onload = function(){ __adroll_loaded=true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute('async', 'true'); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js";
((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
if(oldonload){oldonload()}};
}());
</script>

<ul style="z-index: 1; top: 0px; left: 0px; display: none;" aria-activedescendant="ui-active-menuitem" role="listbox" class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all"></ul></body></html>