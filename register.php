<?PHP
require_once("./include/errormess_config.php");


if(isset($_POST['submitted']))
{
   
   if($errormess->checkreg())
   {
	    header("location:thank-you.html");
   }
  
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Contact us</title>
    <link rel="STYLESHEET" type="text/css" href="style/reg_login.css" />
    
</head>
<body class="center">

<!-- Form Code Start -->
<div id='reg_login'>
<form id='register' action='<?php echo $errormess->getMess(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $errormess->getMess(); ?></span></div>
<div class='container'>
    <label for='name' >Your Full Name*: </label><br/>
    <input type='text' name='name' id='name' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for='email' >Email Address*:</label><br/>
    <input type='text' name='email' id='email' maxlength="50" /><br/>
</div>
<div class='container'>
    <label for='uid' >uid*:</label><br/>
    <input type='text' name='uid' id='uid' maxlength="50" /><br/>
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" />
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>


</body>
</html>