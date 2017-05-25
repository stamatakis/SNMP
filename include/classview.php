<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Grade Database</title>
      <link rel="STYLESHEET" type="text/css" href="style/reg_login.css">
</head>
	<body  class="center">
			<br><br><br><br>
	<h2>Student class selection</h2>
			<fieldset>
	


<?php	

# connect to mysql
mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");
session_start();
# execute search query
$sql = "SELECT course_id FROM grades WHERE stu_id ='{$_SESSION['uid']}' GROUP BY course_id";
$result = mysql_query($sql);

# check result
if (!$result)
    die('Could not successfully run query: ' . mysql_error());

if(isset($_POST['submitted'])){
	$_SESSION['course_id'] = $_POST['selected'];
	header("location:stuClassView.php");			

};
if(isset($_POST['Account'])){
	header("location:usersettings.php");
};
# display returned data
if (mysql_num_rows($result) > 0)
{
    ?>
    <form id='class' method='post' accept-charset='UTF-8'>
    <table style="border: 1px solid black">
	<input type='hidden' name='submitted' id='submitted' value='1'/>

        <?php
            while ($row = mysql_fetch_assoc($result))
            {
                echo '<tr><td>';
                echo '<input type="radio" name="selected" value="'.$row['course_id'].'"/>';
                echo '</td>';
                foreach ($row as $key => $value)
                    echo '<td>'.htmlspecialchars($value).'</td>';
                echo '</tr>';
            }

        ?>
    </table>
    <input type="submit"/><br><br>
    <input type="submit" name=Account value='Account details'/> 
    </form>
	
    <?php

}
else
    echo '<p>No data</p>';

# free resources
mysql_free_result($result);



?>
		</fieldset>
		</div>

	</body>
</html>
