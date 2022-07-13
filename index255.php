<?php
$conn = mysqli_connect("localhost", "root","","dept");
$sql_query = "SELECT * FROM sub";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	

if(isset($_POST["export_data"])) {	
	$filename = "techcrecista_data_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>
<div class="container">	
	<h2>Export Data to Excel</h2>
	<div class="well-sm col-sm-12">
		<div class="btn-group pull-right">	
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
			</form>
		</div>
	</div>				  
	<table id="" class="table table-striped table-bordered">
		<tr>
			<th>Name</th>
			<th>Regd No</th>
			<th>Email</th>	
			<th>Phone no</th>
			<th>Department</th>
			<th>Year</th>
			<th>Section</th>
			<th>Tech Talk</th>
			<th>Blind Coding</th>
			<th>Treasure Hunt</th>
			<th>Coding Contest</th>
			<th>Idea/Project expo</th>
			<th>Debate</th>
			<th>Typing test</th>
			<th>Memory Test</th>
			<th>Fastset Finger</th>
			<th>Photography</th>


		</tr>
		<tbody>
			<?php foreach($developer_records as $developer) { ?>
			   <tr>
			   <td><?php echo $developer ['name']; ?></td>
			   <td><?php echo $developer ['id']; ?></td>
			   <td><?php echo $developer ['email']; ?></td>   
			   <td><?php echo $developer ['phone']; ?></td>
			   <td><?php echo $developer ['dept']; ?></td>
			   <td><?php echo $developer ['year']; ?></td>
			   <td><?php echo $developer ['section']; ?></td>
			   <td><?php echo $developer ['techtalk']; ?></td>
			   <td><?php echo $developer ['blindcoding']; ?></td>
			   <td><?php echo $developer ['treasurehunt']; ?></td>
			   <td><?php echo $developer ['codingcontest']; ?></td>
			   <td><?php echo $developer ['ipidea']; ?></td>
			   <td><?php echo $developer ['debate']; ?></td>
			   <td><?php echo $developer ['typingtest']; ?></td>
			   <td><?php echo $developer ['memorytest']; ?></td>
			   <td><?php echo $developer ['fastestfinger']; ?></td>
			   <td><?php echo $developer ['photography']; ?></td>



			   </tr>
			<?php } ?>
		</tbody>
    </table>
</div>