<?php 


# connect to mysql
$conn = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");
session_start();

 $result = mysql_query('SELECT * FROM `grades`'); 
if (!$result) die('Couldn\'t fetch records'); 

$fp = fopen('php://output', 'w'); 
if ($fp && $result) 
{     
       header('Content-Type: text/csv');
       header('Content-Disposition: attachment; filename="backup.csv"');
       header('Pragma: no-cache');    
       while ($row = mysql_fetch_row($result)) 
       {
          fputcsv($fp, array_values($row)); 
       }   
}

	   $result2 = mysql_query('SELECT * FROM `courses`'); 
if ($fp && $result2) 
{
	    while ($row2 = mysql_fetch_row($result2)) 
       {
          fputcsv($fp, array_values($row2)); 
       }
}
	   $result3 = mysql_query('SELECT * FROM `instuctors`'); 
if ($fp && $result3) 
{
	    while ($row3 = mysql_fetch_row($result3)) 
       {
          fputcsv($fp, array_values($row3)); 
       }
}
	    $result4 = mysql_query('SELECT * FROM `students`'); 
if ($fp && $result4) 
{
	    while ($row4 = mysql_fetch_row($result4)) 
       {
          fputcsv($fp, array_values($row4)); 
       } 
}	   
	   $result5 = mysql_query('SELECT * FROM `users`'); 
if ($fp && $result5) 
{
	    while ($row5 = mysql_fetch_row($result5)) 
       {
          fputcsv($fp, array_values($row5)); 
       }
}
	   
	
die; 


?>











