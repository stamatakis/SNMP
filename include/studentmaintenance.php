<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css" />
</head>
<body class="center">
<?php 
$num_rec_per_page=10;

# connect to mysql
$con = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");

session_start();

if (isset($_POST['update'])){
	$sqlup = "UPDATE students SET fname='{$_POST['fname']}', email='{$_POST['email']}', lname='{$_POST['lname']}' WHERE stu_id='{$_POST['stu_id']}'";
	$result = mysql_query($sqlup, $con);
	
	header("location:studentmaintenance.php");
}

if (isset($_POST['add'])){
	$sqlup = "INSERT INTO students VALUES('{$_POST['stu_id']}', '{$_POST['fname']}', '{$_POST['lname']}', '{$_POST['email']}')";
	$result = mysql_query($sqlup, $con);
	
	header("location:studentmaintenance.php");
}

if (isset($_POST['delete'])){
	$sqlup = "DELETE FROM students WHERE stu_id='{$_POST['stu_id']}'";
	$result = mysql_query($sqlup, $con);
	
	header("location:studentmaintenance.php");
}
echo "<br><br><br><br><br>";
/*$sql = "SELECT * FROM students";
$myData = mysql_query($sql,$con);*/

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM students LIMIT $start_from, $num_rec_per_page"; 
$myData = mysql_query ($sql); 
 

?>
<h1>Student Maintenance</h1>
<table border=1>
<tr>
<th>stu_id</th>
<th>fname</th>
<th>lname</th>
<th>email</th>

<?php while($record = mysql_fetch_array($myData)) {

echo "<form action=studentmaintenance.php method=post>";
echo "<tr>";
echo "<td>" . "<input type='text' name='stu_id' value='" . $record['stu_id'] . "' </td>";
echo "<td>" . "<input type='text' name='fname' value='" . $record['fname'] . "' </td>";
echo "<td>" . "<input type='text' name='lname' value='" . $record['lname'] . "' </td>";
echo "<td>" . "<input type='text' name='email' value='" . $record['email'] . "' </td>";
?>
<td><input type='submit' name='update' value='update' /></td>
<td><input type='submit' name='delete' value='delete' /></td><?php

echo "</form>";

}
echo "</table>";?>
<table>
<form action=studentmaintenance.php method=post>

    <!--label for='name' >Your Full Name*: </label><br/-->
    <br><td><input type='text' name='stu_id' id='stu_id' maxlength="50" /></td>
	<td><input type='text' name='fname' id='fname' maxlength="50" /></td>
	<td><input type='text' name='lname' id='lname' maxlength="50" /></td>
	<td><input type='text' name='email' id='email' maxlength="50" /></td>
    <td><input type='submit' name='add' value='add student' /></td>

</form>
</table>
<?php	


echo "</table>";
//mysql_close($con);

$sql = "SELECT * FROM students"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='studentmaintenance.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='studentmaintenance.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='studentmaintenance.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

?>

</body>
</html>