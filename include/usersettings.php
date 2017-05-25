<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Grade Database</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css">
</head>
	<body  align="center">
<?php


# connect to mysql
$con = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");

session_start();


echo "<br><br><br><br><br>";
$sqlname = "SELECT name FROM users WHERE uid='{$_SESSION['uid']}'";
$sqlemail = "SELECT email FROM users WHERE uid='{$_SESSION['uid']}'";
$sqlpassword = "SELECT password FROM users WHERE uid='{$_SESSION['uid']}'";
$myname = mysql_query($sqlname,$con);
$myemail = mysql_query($sqlemail, $con);
$mypass = mysql_query($sqlpassword, $con);
?>
<h1>User Settings</h1>

<?php
$record2 = mysql_fetch_assoc($myname);
$record3 = mysql_fetch_assoc($myemail);
$record4 = mysql_fetch_assoc($mypass);
if(isset($_POST['submitted']))
{
   $sql = "UPDATE `users` SET `uid`='{$_POST['uid']}',`name`='{$_POST['name']}',`email`='{$_POST['email']}',`password`='{$_POST['password']}' WHERE uid ='{$_SESSION['uid']}' ";
   mysql_query($sql, $con);
   header("location:usersettings.php");
}?>

<form id='register' action='usersettings.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend></legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<div class='container'>
    <label for='name' >Your Full Name*: </label><br/>
	<input type=text name=name value='<?php echo $record2['name'];?>' /> 
</div>
<div class='container'>
    <label for='email' >Email Address*:</label><br/>
	<input type=text name=email value='<?php echo $record3['email'];?>' /> 
</div>
<div class='container'>
    <label for='uid' >uid*:</label><br/>
	<input type=text name=uid value='<?php echo $_SESSION['uid'];?>' /> 
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' value='<?php echo $record4['password'];?>' />
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
<?php
echo "<h2>Please make sure to log back in before continuing</h2>";
mysql_close($con);

?>
				<p align="center"><a href='http://people.clemson.edu/~stamata/login.php'>Login</a></p>


</body>
</html>