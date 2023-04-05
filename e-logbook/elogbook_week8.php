<?php

include '../database_connection/database_connection.php';

$btn_update_status = "";
$btn_save_status = "";

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];

$student_full_name = $student_fname." ".$student_lname;
$student_index_number = $_COOKIE["student_index_number"];

$check_content_existence = "SELECT * FROM week8_table WHERE index_number='$student_index_number'";
$check_existence_query = mysqli_query($conn,$check_content_existence);
$check_query_presence = mysqli_num_rows($check_existence_query);

if($check_query_presence==1){

  $btn_update_status = "enabled";
  $btn_save_status = "disabled";

}else{

  $btn_update_status = "disabled";
  $btn_save_status = "enabled";
}


if(isset($_POST["btn_save"])){

  $monday_job_assigned = $_POST["job_assigned_1"];
  $monday_skill_acquired = $_POST["skill_acquired_1"];
  $tuesday_job_assigned = $_POST["job_assigned_2"];
  $tuesday_skill_acquired = $_POST["skill_acquired_2"];
  $wednesday_job_assigned = $_POST["job_assigned_3"];
  $wednesday_skill_acquired = $_POST["skill_acquired_3"];
  $thursday_job_assigned = $_POST["job_assigned_4"];
  $thursday_skill_acquired = $_POST["skill_acquired_4"];
  $friday_job_assigned = $_POST["job_assigned_5"];
  $friday_skill_acquired = $_POST["skill_acquired_5"];

  if($monday_job_assigned!=""&& $monday_skill_acquired!=""&& $tuesday_job_assigned!=""
  &&$tuesday_skill_acquired!=""&&$wednesday_job_assigned!=""&&$wednesday_skill_acquired!=""
  &&$thursday_job_assigned!=""&&$thursday_skill_acquired!=""&&$friday_job_assigned!=""&&$friday_skill_acquired!=""){

	    $insert_details_command = "INSERT INTO `week8_table` (`id`, `username`, `index_number`, `monday_job_assigned`, `date`, `monday_special_skill_acquired`, `tuesday_job_assigned`, `tuesday_special_skill_acquired`, `wednesday_job_assigned`, `wednesday_special_skill_acquired`, `thursday_job_assigned`, `thursday_special_skill_acquired`, `friday_job_assigned`, `friday_special_skill_acquired`) VALUES (NULL, '$student_full_name', '$student_index_number', '$monday_job_assigned', CURRENT_TIMESTAMP, '$monday_skill_acquired', '$tuesday_job_assigned', '$tuesday_skill_acquired', '$wednesday_job_assigned', '$wednesday_skill_acquired', '$thursday_job_assigned', '$thursday_skill_acquired', '$friday_job_assigned', '$friday_skill_acquired')";
	  
  		$execute_insert_query = mysqli_query($conn,$insert_details_command);
	  
  }else{
     echo "<script>alert('You need to Fill All Spaces')</script>";
  }
}


if(isset($_POST["btn_update"])){

  $monday_job_assigned = $_POST["job_assigned_1"];
  $monday_skill_acquired = $_POST["skill_acquired_1"];
  $tuesday_job_assigned = $_POST["job_assigned_2"];
  $tuesday_skill_acquired = $_POST["skill_acquired_2"];
  $wednesday_job_assigned = $_POST["job_assigned_3"];
  $wednesday_skill_acquired = $_POST["skill_acquired_3"];
  $thursday_job_assigned = $_POST["job_assigned_4"];
  $thursday_skill_acquired = $_POST["skill_acquired_4"];
  $friday_job_assigned = $_POST["job_assigned_5"];
  $friday_skill_acquired = $_POST["skill_acquired_5"];

  if($monday_job_assigned!=""&& $monday_skill_acquired!=""&& $tuesday_job_assigned!=""
  &&$tuesday_skill_acquired!=""&&$wednesday_job_assigned!=""&&$wednesday_skill_acquired!=""
  &&$thursday_job_assigned!=""&&$thursday_skill_acquired!=""&&$friday_job_assigned!=""&&$friday_skill_acquired!=""){

  $update_details_command = "UPDATE `week8_table` SET `monday_job_assigned` = '$monday_job_assigned', `monday_special_skill_acquired` = '$monday_skill_acquired', `tuesday_job_assigned` = '$tuesday_job_assigned', `tuesday_special_skill_acquired` = '$tuesday_skill_acquired', `wednesday_job_assigned` = '$wednesday_job_assigned', `wednesday_special_skill_acquired` = '$wednesday_skill_acquired', `thursday_job_assigned` = '$thursday_job_assigned', `thursday_special_skill_acquired` = '$thursday_skill_acquired', `friday_job_assigned` = '$friday_job_assigned', `friday_special_skill_acquired` = '$friday_skill_acquired' WHERE `index_number`='$student_index_number'";

  $execute_update_query = mysqli_query($conn,$update_details_command);

  }else{
     echo "<script>alert('You need to Fill All Spaces')</script>";
  }
}

 ?>


<?php include '../header.php' ?>
<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
      <div class = "panel-heading phead">
         <h2 class = "panel-title ptitle"> E-LogBook</h2>
      </div>
      <div class="panel-body pbody">
        <div id="navigation_holder">
          <ul class = "pager">
             <li class = "previous"><a href = "elogbook_week7.php">&larr; Previous</a></li>
             <li class = "next"><a href = "elogbook_week9.php">Next &rarr;</a></li>
        </ul>
        </div>
        <div id="week_holder">
          <span style="font-size:1.3em;font-weight:bold;">Week 8</span>
        </div>
        <hr>
        <form method="post" action="">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th style='text-align:center'>Day</th>
                <th style='text-align:center'>Job Assigned To Student</th>
                <th style='text-align:center'>Special Skill Acquired</th>

            </tr>

        </thead>
        <tbody>
          <?php
 
                  $get_previous_data = "SELECT * FROM week8_table WHERE index_number='$student_index_number'";
                  $execute_get_query = mysqli_query($conn,$get_previous_data);
                  if (mysqli_num_rows($execute_get_query) > 0) {

                    $get_data = mysqli_fetch_assoc($execute_get_query);
                    $monday_job_assigned_holder = $get_data["monday_job_assigned"];
                    $monday_skill_acquired_holder = $get_data["monday_special_skill_acquired"];
  
                    $tuesday_job_assigned_holder = $get_data["tuesday_job_assigned"];
                    $tuesday_skill_acquired_holder = $get_data["tuesday_special_skill_acquired"];
  
                    $wednesday_job_assigned_holder = $get_data["wednesday_job_assigned"];
                    $wednesday_skill_acquired_holder = $get_data["wednesday_special_skill_acquired"];
  
                    $thursday_job_assigned_holder = $get_data["thursday_job_assigned"];
                    $thursday_skill_acquired_holder = $get_data["thursday_special_skill_acquired"];
  
                    $friday_job_assigned_holder = $get_data["friday_job_assigned"];
                    $friday_skill_acquired_holder = $get_data["friday_special_skill_acquired"];
                  }else{
                    $monday_job_assigned_holder = "";
                    $monday_skill_acquired_holder = "";
  
                    $tuesday_job_assigned_holder = "";
                    $tuesday_skill_acquired_holder = "";
  
                    $wednesday_job_assigned_holder = "";
                    $wednesday_skill_acquired_holder = "";
  
                    $thursday_job_assigned_holder = "";
                    $thursday_skill_acquired_holder = "";
  
                    $friday_job_assigned_holder = "";
                    $friday_skill_acquired_holder = "";
                  }
                 
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Monday"."</td>";
                echo "<td><textarea name='job_assigned_1' class='form-control adjusted_text_area'>$monday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_1' class='form-control adjusted_text_area'>$monday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Tuesday"."</td>";
                echo "<td><textarea name='job_assigned_2' class='form-control adjusted_text_area'>$tuesday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_2' class='form-control adjusted_text_area'>$tuesday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Wednesday"."</td>";
                echo "<td><textarea name='job_assigned_3' class='form-control adjusted_text_area'>$wednesday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_3' class='form-control adjusted_text_area'>$wednesday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Thursday"."</td>";
                echo "<td><textarea name='job_assigned_4' class='form-control adjusted_text_area'>$thursday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_4' class='form-control adjusted_text_area'>$thursday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Friday"."</td>";
                echo "<td><textarea name='job_assigned_5' class='form-control adjusted_text_area'>$friday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_5' class='form-control adjusted_text_area'>$friday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
           ?>

        </tbody>
    </table>
      <div id="buttons_holder">
      <input type="submit" value="Update" class="btn btn-primary" name="btn_update" <?php echo $btn_update_status; ?>>
      <input type="submit" value="Save"   class="btn btn-primary" name="btn_save" <?php echo $btn_save_status; ?> >
    </div>
        </form>
      </div>

</div>
</div>
</div>

</body>

</html>
