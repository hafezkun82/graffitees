<div id="login_cont" title="Login to GRAFFITEES">
  <div id="loginform">
    <span class="m_usermanagement_login-REST m-alert"></span>	<span class="m_f_login-REST m-alert"></span>
    <form id="login" method="POST" class="m-form m-auto-submit" action="/a/Login" data-targetaction="usermanagement/login" data-events="submit=manu.form.submitAjaxForm" data-cb-success="Login.redirectPage" data-cb-error="Login.errorHandler">
      <table border="0" cellpadding="5" cellspacing="0">
      <tbody>
        <tr class="" valign="top">
          <td align="right"><label for="username528"> Username </label></td>
          <td> <input name="username" id="username528" type="text"> </td></tr>
        <tr class="" valign="top">
          <td align="right"><label for="pwd718"> Password </label></td>
          <td> <input class=" text_password " autocomplete="off" type="text">
          <input name="pwd" id="pwd718" autocomplete="off" class=" orig_password hidden" value="" type="password"> </td></tr>
        <tr class="" valign="top">
          <td align="right"><label for="remember-me">  </label></td>
          <td> <input name="rememberme" value="0" type="hidden"><input id="remember-me" name="rememberme" value="1" type="checkbox">
          <label for="remember-me" class="checkbox">Remember Me</label></td></tr>
        <tr class="" valign="top">
          <td align="right"></td>
          <td><p id="searchbar" class="link_elem">
            <a id="submit245" href="javascript:void(0)" class="button" title="Login" data-events="click=manu.form.submitForm">Login</a> 
            <a href="http://www.designbyhumans.com/forgotpassword"><small>Forgot Password?</small></a></p></td></tr>
      </tbody></table>
      <input name="redirect" id="redirect214" value="" type="hidden">
    </form></div></div>