<?php
require_once("./include/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from users";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>PHP MySQL Inline Editing using jQuery Ajax</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,uid) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "saveedit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&uid='+uid,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header">Uid</th>
				<th class="table-header">Name</th>
				<th class="table-header">email</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
		  
			  <tr class="table-row">
				<td><?php echo $faq[$k]["uid"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'name','<?php echo $faq[$k]["uid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["name"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'email','<?php echo $faq[$k]["uid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["email"]; ?></td>
			  </tr>
		<?php 
		}
		?>
		  </tbody>
		</table>
		
    </body>
</html>
