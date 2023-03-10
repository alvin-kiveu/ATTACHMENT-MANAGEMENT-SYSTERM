	<?php

	include '../database_connection/database_connection.php';

	$student_fname = $_COOKIE["student_first_name"];
	$student_lname = $_COOKIE["student_last_name"];
	$index_number_holder = $_COOKIE["student_index_number"];

	?>

<?php include '../header.php' ?>

	<div id="main_content">
	  <div class="container-fluid">
		<div class = "panel">
		   <div class = "panel-heading industrial_phead">
			  <h2 class = "panel-title industrial_ptitle"> Submit Report</h2>
		   </div>

			<div class = "panel-body industrial_pbody">
				
				<form method="POST" enctype="multipart/form-data" id="form">
					<h1 style="text-align: center">Upload Report</h1>
					<input type="file" name="file[]" multiple required>
					<input type="submit" class="btn btn-primary"value="Upload" id="sub-but"><br>
					<h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That your report is in a Microsoft Word format with your index number as its name before uploading it</strong></h4>
					<h4 style="text-align: center">Any work not in Microsoft Word format would be discarded </h4>
					
					<progress id="prog" max="100" value="0" style="display: none"></progress>
					<div id="amount_reached"></div>
				</form>

			 </div>
	   </div>
	 </div>
	
	<script>
	$(document).ready(function () {
		$(document).ready(function(){
			$("#form").on('submit',function(e){
				e.preventDefault();
				$(this).ajaxSubmit({
					url:'upload.php',
					beforeSend:function(){
						$("#prog").show();
						$("#prog").attr('value','0');
					},
					uploadProgress:function(event,position,total,percentComplete){
						$("#prog").attr('value',percentComplete);
						$('#sub-but').val(percentComplete+'%');
					},
					success:function(){
						$('#sub-but').val('Files Uploaded!!');
						setTimeout(function(){
							$('#sub-but').val('Upload');
						},1000);
					},
				});
			});
		});
	});
</script>


	</body>
	</html>
