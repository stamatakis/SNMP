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
$conn = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");
session_start();
   mysql_select_db('grades');

   $table_name = "grades";
   $backup_file  = "/tmp/grades.sql";
   $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";
   $table_courses = "courses";
   $backup_courses  = "/tmp/courses.sql";
   $sqlcourse = "LOAD DATA INFILE '$backup_courses' INTO TABLE $table_courses";
   $table_instructors = "instructors";
   $backup_instr  = "/tmp/instructors.sql";
   $sqlinstr = "LOAD DATA INFILE '$backup_instr' INTO TABLE $table_instructors";
   $table_students = "students";
   $backup_stu  = "/tmp/students.sql";
   $sqlstu = "LOAD DATA INFILE '$backup_stu' INTO TABLE $table_students";
   $table_users = "users";
   $backup_users  = "/tmp/users.sql";
   $sqlusers = "LOAD DATA INFILE '$backup_users' INTO TABLE $table_users";
   
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval )
   {
      die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";
   $retval = mysql_query( $sqlcourse, $conn );
   
   if(! $retval )
   {
      die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";mysql_select_db('grades');
   $retval = mysql_query( $sqlinstr, $conn );
   
   if(! $retval )
   {
      die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";mysql_select_db('grades');
   $retval = mysql_query( $sqlstu, $conn );
   
   if(! $retval )
   {
      die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";mysql_select_db('grades');
   $retval = mysql_query( $sqlusers, $conn );
   
   if(! $retval )
   {
      die('Could not load data : ' . mysql_error());
   }
   echo "Loaded  data successfully\n";
   
   mysql_close($conn);
?>











</body>
</html>