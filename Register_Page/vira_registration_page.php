<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$other_name_status = "disabled";
$index_status = "disabled";
$first_name_holder = "";
$last_name_holder = "";
$index_number_holder = "";
$submit_status = "disabled";


  $programmes = array("-","Accountancy","Applied Mathematics","Building Technology","Civil Engineering","Computer Science","Computer Networking",
  "Electrical/Electronic Engineering","Hospitality","Liberal Studies","Marketing","Purchasing & Supply","Secretaryship");

  $faculties = array("-","FAST","FBMS","FOE","FBNE","FHAS");

  $sessions = array("-","Morning","Evening","Weekend");

  $levels = array("-","100","200","300");

  if(isset($_POST["btn-check-receipt"])){
    $entered_receipt_number = $_POST["txtreceipt"];
    $check_receipt = "SELECT * FROM vira_receipts_paid WHERE receipt_number='$entered_receipt_number'";
    $execute_check_receipt = mysqli_query($conn,$check_receipt);
    $get_receipt_details = mysqli_num_rows($execute_check_receipt);
    if($get_receipt_details == 1){
      $other_name_status = "";
      $first_name_holder = $_COOKIE["student_first_name"];
      $last_name_holder = $_COOKIE["student_last_name"];
      $index_number_holder = $_COOKIE["student_index_number"];
      $index_status="";
      $submit_status = "";
    }else{
      $other_name_status="disabled";
      $index_status="disabled";
      $first_name_holder = "";
      $last_name_holder = "";
      $index_number_holder = "";
      $submit_status = "disabled";
    }
  }

  if(isset($_POST["btn_submit"])){
    if($_POST["student_programme"]!="" && $_POST["student_level"]!="" && $_POST["student_session"]!=""){

      $other_name = $_POST["student_other_name"];
      $student_programme_selected = $_POST["student_programme"];
      $student_level_selected = $_POST["student_level"];
      $student_session_selected = $_POST["student_session"];
      $student_index = $_POST["txt_index_number"];
	  $student_faculty = $_POST["student_faculty"];

      $check_user_existence = "SELECT * FROM vira_registration WHERE index_number='$student_index' LIMIT 1";
      $execute_check_existence = mysqli_query($conn,$check_user_existence);
      $check_user = mysqli_num_rows($execute_check_existence);
      if($check_user==1){
       echo "<script>alert('Sorry You Have Registered Already')</script>";
     }else{
       $insert_details_command = "INSERT INTO vira_registration (`id`, `first_name`, `last_name`, `other_name`, `index_number`, `programme`, `level`, `session`,`faculty`,`date`) VALUES (NULL,'$student_fname', '$student_lname', '$other_name','$student_index', '$student_programme_selected', '$student_level_selected', '$student_session_selected','$student_faculty', CURRENT_TIMESTAMP)";
      if($run_query = mysqli_query($conn,$insert_details_command)){
        echo "<script>alert('Details Have Been Submitted Successfully')</script>";
      }else{
        echo "<script>alert('Details Not Submitted ')</script>";
      }
    }
  }
  }


?>

<?php include '../header.php' ?>
<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading vira_phead">
          <h2 class = "panel-title vira_ptitle"> Vira Registration</h2>
       </div>
            <div class = "panel-body vira_pbody">
              <div class="row">
                <div id="vira_receipt_holder">
              <form class="form-inline" method="post" action="">
                <div class="form-group">
                  <label class="sr-only">Receipt Number</label>
                  <p class="form-control-static"><strong>Receipt No.</strong></p>
                </div>
                <div class="form-group">
                  <label for="txtreceipt" class="sr-only">Receipt Number</label>
                  <input type="text" class="form-control form-control-adjusted" id="txtreceipt" placeholder="Receipt number" name="txtreceipt">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="Validate" name="btn-check-receipt"/>
              </form>
            </div>
         </div>
         <br>
         <br>
         <div class="panel">
           <div class="panel-body">
         <form method="post" action="">
           <div class="form-group">
            <label for="txtfname">First Name </label>
            <input type="text" class="form-control form-control-adjusted" id="txtfname" placeholder="Enter first name" disabled <?php echo "value='$first_name_holder'"?>>
          </div>

          <div class="form-group">
           <label for="txtlname">Last Name </label>
           <input type="text" class="form-control form-control-adjusted" id="txtlname" placeholder="Enter last name" disabled value=<?php echo $last_name_holder;?>>
         </div>

         <div class="form-group">
          <label for="txtothername">Other Name(s) </label>
          <input type="text" class="form-control form-control-adjusted" id="txtothername" placeholder="Enter other name(s)" <?php echo $other_name_status; ?> name="student_other_name">
        </div>

        <div class="form-group">
         <label for="txtindexnumber">Index Number </label>
         <input type="text" class="form-control form-control-adjusted" id="txtindexnumber" placeholder="Enter index number"  name="txt_index_number" <?php echo $index_status; ?> value=<?php echo $index_number_holder;?>>
       </div>

        <div class="form-group">
        <label for="selected_programme">Select Programme:</label>
        <select class="form-control form-control-adjusted" id="selected_programme" name="student_programme">
          <?php
            foreach($programmes as $val) { echo "<option>".$val."</option>";};
           ?>
        </select>
      </div>

      <div class="form-group">
      <label for="selected_level">Select Level:</label>
      <select class="form-control form-control-adjusted" id="selected_level" name="student_level">
        <?php
      foreach($levels as $val) { echo "<option>".$val."</option>";};
         ?>
      </select>
    </div>

      <div class="form-group">
      <label for="selected_session">Select Session:</label>
      <select class="form-control form-control-adjusted" id="selected_session" name="student_session">
        <?php
      foreach($sessions as $val) { echo "<option>".$val."</option>";};
         ?>
      </select>
    </div>
      
     <div class="form-group">
      <label for="selected_session">Select Faculty :</label>
      <select class="form-control form-control-adjusted" id="selected_faculty" name="student_faculty">
        <?php
      foreach($faculties as $val) { echo "<option>".$val."</option>";};
         ?>
      </select>
    </div>

      <div id="btn_submit_holder">
      <input type="submit" class="btn btn-primary" value="Submit" <?php echo $submit_status; ?> name="btn_submit"/>
    </div>
       </form>
     </div>
     </panel>

       </div>
     </div>
   </div>
 </div>

</body>
</html>
