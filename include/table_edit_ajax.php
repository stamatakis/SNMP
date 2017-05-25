<?php

# connect to mysql
mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");
session_start();

if($_POST['uid'])
{
//$id=mysql_escape_String($_POST['id']);
$uid=mysql_escape_String($_POST['uid']);
$name=mysql_escape_String($_POST['name']);
$email=mysql_escape_String($_POST['email']);
$password=mysql_escape_String($_POST['password']);
$sql = "UPDATE users SET uid='$uid',name='$name', email='$email', password='$password' WHERE uid='$uid'";
mysql_query($sql);
}
?>