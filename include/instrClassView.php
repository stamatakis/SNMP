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
if(isset($_POST['update'])){
$UpdateQuery = "UPDATE grades SET grade='{$_POST['grade']}' WHERE course_id='{$_POST['course_id']}' AND stu_id='{$_POST['stu_id']}' AND assn='{$_POST['assn']}'";           
mysql_query($UpdateQuery, $con);
//echo '{$_POST['$record3['grade']']}';
//echo $_POST['course_id'];
//echo $record3['stu_id'];
header("location:instrClassView.php");
};

echo "<br><br><br><br><br>";
$sql = "SELECT DISTINCT assn FROM grades WHERE course_id='{$_SESSION['course_id']}'";
//$sqlname = "SELECT fname, lname FROM students WHERE stu_id = '{$_SESSION['course_id']}'";
//$myname = mysql_query($sqlname,$con);
$myData = mysql_query($sql,$con);
$x = 0;

?>
<h1><?php echo $_SESSION['course_id']; ?></h1>
<table border=1>
<tr>
<th><?php echo "Last Name"; ?></th>
<th><?php echo "First Name"; ?></th>
<th><?php echo "Student #" ?></th>

<?php while($record = mysql_fetch_array($myData)) {
echo "<th>" . $record['assn'] . "</th>";
echo "<th>Update</th>";

++$x;
}
echo "</tr>";


$sqlname = "SELECT * FROM grades NATURAL JOIN students WHERE course_id='{$_SESSION['course_id']}' GROUP BY lname";
$myname = mysql_query($sqlname,$con);
while($record2 = mysql_fetch_array($myname)){
echo "<tr>";
echo "<td>" . "<input type=text name=lname value='" . $record2['lname'] . "' </td>";
echo "<td>" . "<input type=text name=fname value='" . $record2['fname'] . "' </td>";
echo "<td>" . "<input type=text name=stu_id value='" . $record2['stu_id'] . "' </td>";

$sql = "SELECT * FROM grades NATURAL JOIN students WHERE course_id='{$_SESSION['course_id']}' AND lname='{$record2['lname']}'";
$myData = mysql_query($sql,$con);
echo "<input type='hidden' name='submitted' id='submitted' value='1'/>";

    while($record3 = mysql_fetch_assoc($myData)){
echo "<form action=instrClassView.php method=post>";
	
		echo "<td>" . '<input type="text" name="grade" value="'.$record3['grade'].'"/>' . "</td>";
	
		
               // echo "<td>" . "<input type="radio" name="selected" value="'.$row['course_id'].'" </td>";
?> <!--<input type="hidden" name="grade" value="?php $record3['grade']; ?>"/--> 
	   <input type="hidden" name="stu_id" value="<?php  print $record3['stu_id']; ?>"/> 
	   	   <input type="hidden" name="assn" value="<?php  print $record3['assn']; ?>"/> 

       <input type="hidden" name="course_id" value="<?php  print $record3['course_id'] ?>"/> <?php

	
	?>  <td><input type="submit" name="update" value="update"/></td><?php

echo "</form>";
}
}
echo "</table>";

mysql_close($con);

?>

</body>
</html>