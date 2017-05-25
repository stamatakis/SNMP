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
$con = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");

session_start();

if (isset($_POST['update'])){
	$sqlup = "UPDATE users SET name='{$_POST['name']}', email='{$_POST['email']}', password='{$_POST['password']}' WHERE uid='{$_POST['uid']}'";
	$result = mysql_query($sqlup, $con);
	
	//header("location:usermaintenance.php");
}


if (isset($_POST['add'])){
	$sqlup = "INSERT INTO users VALUES('{$_POST['uid']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['password']}')";
	$result = mysql_query($sqlup, $con);
	
	header("location:usermaintenance.php");
}

if (isset($_POST['delete'])){
	$sqlup = "DELETE FROM users WHERE uid='{$_POST['uid']}'";
	$result = mysql_query($sqlup, $con);
	
	header("location:usermaintenance.php");
}
echo "<br><br><br><br><br>";
$sql = "SELECT * FROM users";
//$sqlname = "SELECT fname, lname FROM students WHERE stu_id = '{$_SESSION['course_id']}'";
//$myname = mysql_query($sqlname,$con);
$myData = mysql_query($sql,$con);
 

?>
<h1>User Maintenance</h1>
<table border=1>
<tr>
<th>uid</th>
<th>name</th>
<th>email</th>
<th>password</th>

<?php echo "<form action=usermaintenance.php method=post>";
echo "<tr>";


while($record = mysql_fetch_array($myData)) {
echo "<tr>";

echo "<form action=usermaintenance.php method=post>";
echo "<tr>";
echo "<td>" . "<input type='text' name='uid' value='" . $record['uid'] . "' </td>";
echo "<td>" . "<input type='text' name='name' value='" . $record['name'] . "' </td>";
echo "<td>" . "<input type='text' name='email' value='" . $record['email'] . "' </td>";
echo "<td>" . "<input type='password' name='password' value='" . $record['password'] . "' </td>";
?>
<td><input type='submit' name='update' value='update' /></td>
<td><input type='submit' name='delete' value='delete' /></td><?php

echo "</form>";
}
echo "</table>";?>
<table>
<form action=usermaintenance.php method=post>

    <!--label for='name' >Your Full Name*: </label><br/-->
    <br><td><input type='text' name='uid' id='uid' maxlength="50" /></td>
	<td><input type='text' name='name' id='name' maxlength="50" /></td>
	<td><input type='text' name='email' id='email' maxlength="50" /></td>
    <td><input type='password' name='password' id='password' maxlength="50" /></td>
    <td><input type='submit' name='add' value='add user' /></td>

</form>
</table><?
//mysql_close($con);

?>

</body>
</html>