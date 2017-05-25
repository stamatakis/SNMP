<?PHP
require_once("./include/errormess_config.php");

if(isset($_POST['submitted']))
{
   
   if($errormess->checklogin())
   {
	   // header("location:thank-you.html");
   }
  
}

date_default_timezone_set('UTC');

echo date('h:i:s a, l F jS Y e');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<style>
.center {
    margin: auto;
    width: 20%;
  <!--  border:3px solid #73AD21; -->
    padding: 100px;
}
</style>
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css" />
</head>

<body class="center">

<!-- Form Code Start -->
<div id='reg_login'>
<form id='login' action='<?php echo $errormess->getMess(); ?>' method='post' accept-charset='UTF-8'>

<br><br><br>
		<h1 align="center">SNMP ADMIN PORTAL</h1>

<br><br><br>
<fieldset>
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div><span class='error'><?php echo $errormess->getMess(); ?></span></div>
<div class='container'>
    <label for='uid' >uid*:</label><br/>
    <input type='text' name='uid' id='uid' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
<div class='short_explanation'>* required</div>

</fieldset>
</form>


</div>


</body>
</html>