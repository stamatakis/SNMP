<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<style>
.center {
   <!-- margin: auto;-->
    width: 20%;
  <!--  border:3px solid #73AD21; -->
    padding: 10px;
}
</style>
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css" />
</head>
<body class="center">
		<h1 align="center">SNMP ADMIN PORTAL</h1>
		<h3 align="center">This portal allows the administrator of the sytem to access system information from any of its hosts.</h3>
	
<h4>&emsp;&emsp;&emsp;&emsp;&emsp; SNMP MANAGER: </h4>
 <?php
$a = snmpwalk("127.0.0.1", "public", ""); 

foreach ($a as $val) {
    echo "$val\n";
}

?>
<?php 







?>
</html>