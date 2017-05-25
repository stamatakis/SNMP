<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css" />
</head>
<body class="center">
<?php 

# connect to mysql
mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");
session_start();
# execute search query
$sql = "SELECT course_id FROM courses WHERE instr_id ='{$_SESSION['uid']}'";
$result = mysql_query($sql);

# check result
if (!$result)
    die('Could not successfully run query: ' . mysql_error());

if(isset($_POST['backup'])){
	header("location:backup.php");			
};
if(isset($_POST['restorebackup'])){
	header("location:restorebackup.php");
};
if(isset($_POST['users'])){
	header("location:usermaintenance.php");
};
if(isset($_POST['students'])){
	header("location:studentmaintenance.php");
}
?>
<!-- Form Code Start -->
<div id='reg_login'>
<form id='login' method='post' accept-charset='UTF-8'>
<fieldset>
    <input type="submit" name=backup value='Backup'/> 
    <input type="submit" name=restorebackup value='Restore Backup'/> 
	<input type="submit" name=users value='User Maintenance'/> 
	<input type="submit" name=students value='Student Maintenance'/> 




</fieldset>
</form>


</div>
<h3>Student Maintenance will show dynamic queries to the table as well as pagination.</h3>


</body>
</html>