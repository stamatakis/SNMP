<?php 
$num_rec_per_page=10;

# connect to mysql
$con = mysql_connect("mysql1.cs.clemson.edu", "stamatakis", "0p3ndatabas3")or die("cannot connect"); 
mysql_select_db("grades")or die("cannot select DB");

session_start();

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM students LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?> 
<table>
<tr><td>Student id</td><td>First Name</td><td>Last name</td><td>email</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['stu_id']; ?></td>
            <td><?php echo $row['fname']; ?></td>     
            <td><?php echo $row['lname']; ?></td>            
		    <td><?php echo $row['email']; ?></td>            

            </tr>
<?php 
}; 
?> 
</table>
<?php 
$sql = "SELECT * FROM students"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='studentmaintenancepages.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='studentmaintenancepages.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='studentmaintenancepages.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
