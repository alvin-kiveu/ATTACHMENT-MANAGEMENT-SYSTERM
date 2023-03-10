<?php

  include '../database_connection/database_connection.php';

  $student_fname = $_COOKIE["student_first_name"];
  $student_lname = $_COOKIE["student_last_name"];
  $student_index = $_COOKIE["student_index_number"];

  $regions = array("Greater Accra Region","Central Region","Eastern Region","Western Region",
  "Ashanti Region","Northern Region","Upper East Region","Upper West Region","Volta Region","Brong Ahafo Region");

  $programmes = array("-","Accountancy","Applied Mathematics","Building Technology","Civil Engineering","Computer Science","Computer Networking",
  "Electrical/Electronic Engineering","Hospitality","Liberal Studies","Marketing","Purchasing & Supply","Secretaryship");


  $get_user_details = "SELECT * FROM vira_registration WHERE index_number='$student_index' AND first_name='$student_fname' AND last_name='$student_lname'";
  $run_get_details = mysqli_query($conn,$get_user_details);
  $execute_get_details_command = mysqli_num_rows($run_get_details);
  if($execute_get_details_command==1){

    $get_details = mysqli_fetch_assoc($run_get_details);

    $student_programme = $get_details["programme"];
    $student_session = $get_details["session"];
    $student_level = $get_details["level"];
    $student_other_name = $get_details["other_name"];

    setcookie("student_programme_holder",$student_programme,time() + (86400 * 30));
    setcookie("student_session_holder",$student_session,time() + (86400 * 30));
    setcookie("student_level_holder",$student_level,time() + (86400 * 30));
    setcookie("student_other_name_holder",$student_other_name,time() + (86400 * 30));
    setcookie("student_registration_type","vira registration",time() + (86400 * 30));
    $student_registration_type = "VIRA REGISTRATION";

  }else{

    $checking_user_industrial = "SELECT * FROM industrial_registration WHERE index_number='$student_index' AND first_name='$student_fname' AND last_name='$student_lname'";
    $checking_user_query = mysqli_query($conn,$checking_user_industrial);
    $check_existence = mysqli_num_rows($checking_user_query);
    if($check_existence==1){

      $get_user_info = mysqli_fetch_assoc($checking_user_query);

      $student_session = $get_user_info["session"];
      $student_level = $get_user_info["level"];
      $student_programme = $get_user_info["programme"];
      $student_other_name = $get_user_info["other_name"];

      setcookie("student_programme_holder",$student_programme,time() + (86400 * 30));
      setcookie("student_session_holder",$student_session,time() + (86400 * 30));
      setcookie("student_level_holder",$student_level,time() + (86400 * 30));
      setcookie("student_other_name_holder",$student_other_name,time() + (86400 * 30));
      setcookie("student_registration_type","industrial registration",time() + (86400 * 30));
      $student_registration_type = "INDUSTRIAL REGISTRATION";
      $status_number = 2;

    }else{
      header("Location:../Register_Page/register_page.php");
    }

  }


?>
<?php include '../header.php' ?>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle"> ASSUMPTION OF DUTY FORM</h2>
       </div>
            <div class = "panel-body pbody">


          <div class="panel panel-adjusted">
           <div class="panel-body pbody_student_info">
             <br>
             <div style="float:left;font-size:.9em"><strong>Student Information</strong></div>
             <hr>
         <form method="post" action="">
           <div class="form-group">
            <label for="txtfname">First Name </label>
            <input type="text" class="form-control form-control-adjusted" id="txtfname" placeholder="Enter first name" disabled value=<?php echo $student_fname;?>>
          </div>

          <div class="form-group">
           <label for="txtlname">Last Name </label>
           <input type="text" class="form-control form-control-adjusted" id="txtlname" placeholder="Enter last name" disabled value=<?php echo $student_lname;?>>
         </div>

         <div class="form-group">
          <label for="txtothername">Other Name(s) </label>
          <input type="text" class="form-control form-control-adjusted" id="txtothername" placeholder="Enter other name(s)" disabled value=<?php echo $student_other_name;?>>
        </div>

        <div class="form-group">
         <label for="txtprogramme">Programme </label>
         <input type="text" class="form-control form-control-adjusted" id="txtprogramme" placeholder="Enter programme" disabled value="<?php echo $student_programme;?>">
       </div>


       <div class="form-group">
        <label for="txtindexnumber">Index Number </label>
        <input type="text" class="form-control form-control-adjusted" id="txtindexnumber" placeholder="Enter index number"  name="txt_index_number" value=<?php echo $student_index;?>>
      </div>

       <div class="form-group">
        <label for="txtsession">Session </label>
        <input type="text" class="form-control form-control-adjusted" id="txtsession" placeholder="Enter your session" disabled value=<?php echo $student_session;?>>
      </div>

      <div class="form-group">
       <label for="txtlevel">Level </label>
       <input type="text" class="form-control form-control-adjusted" id="txtlevel" placeholder="Enter your level" disabled value=<?php echo $student_level;?>>
     </div>

     <br>
     <div style="float:left;font-size:.9em"><strong>Company Information</strong></div>
     <hr>

     <div class="form-group">
      <label for="txtcompanyname">Company Name : </label>
      <input type="text" class="form-control form-control-adjusted" id="txtcompanyname" placeholder="Enter company name" name="txt_company_name">
    </div>

    <div class="form-group">
     <label for="txtsupervisorsname">Supervisors Name : </label>
     <input type="text" class="form-control form-control-adjusted" id="txtsupervisorsname" placeholder="Enter supervisors name" name="txt_supervisors_name">
   </div>

   <div class="form-group">
    <label for="txtsupervisorscontact">Supervisors Contact : </label>
    <input type="text" maxlength="15" class="form-control form-control-adjusted" id="txtsupervisorscontact" placeholder="Enter supervisors contact" name="txt_supervisors_contact">
  </div>

  <div class="form-group">
   <label for="txtsupervisorsemail">Supervisors Email : </label>
   <input type="email" class="form-control form-control-adjusted" id="txtsupervisorsemail" placeholder="Enter supervisors e-mail" name="txt_supervisors_email">
 </div>

     <div class="form-group">
     <label for="selected_region">Select company region :</label>
     <select class="form-control form-control-adjusted" id="selected_region" name="selected_region">
       <?php
     foreach($regions as $val) { echo "<option>".$val."</option>";};
        ?>
     </select>
   </div>

   <div class="form-group">
  <label for="company_address">Address :</label>
  <textarea class="form-control" id="company_address" width="100%" name="txt_address"></textarea>
  </div>

  <div id="btn_submit_holder">
  <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit"/>
  </div>
       </form>
     </div>
     </panel>
       </div>
     </div>
   </div>
 </div>

 <?php

 if(isset($_POST["btn_submit"])){

   if($_POST["txt_company_name"]!="" && $_POST["txt_supervisors_name"]!="" && $_POST["txt_supervisors_contact"]!="" && $_POST["txt_supervisors_email"]!="" && $_POST["selected_region"]!="" && $_POST["txt_address"]!=""){

      $student_company_name = $_POST["txt_company_name"];
      $student_index_number = $_POST["txt_index_number"];
      $student_supervisor_name = $_POST["txt_supervisors_name"];
      $student_supervisor_contact = $_POST["txt_supervisors_contact"];
      $student_supervisor_email = $_POST["txt_supervisors_email"];
      $student_company_region = $_POST["selected_region"];
      $student_company_address = $_POST["txt_address"];

      $avoid_duplicate = "SELECT * FROM students_assumption WHERE index_number='$student_index_number' LIMIT 1";
      $execute_avoid_duplicate_query = mysqli_query($conn,$avoid_duplicate);
      $check_avoidance_query = mysqli_num_rows($execute_avoid_duplicate_query);

      if($check_avoidance_query==1){
        echo "<script>alert('You have submitted details already')</script>";
      }else{
      $my_insert_query = "INSERT INTO `students_assumption` (`id`, `first_name`, `last_name`, `other_name`,`index_number`, `level`, `programme`, `session`,`company_name`, `supervisor_name`, `supervisor_contact`,`supervisor_email`, `company_region`, `company_address`,`registration_type`, `date`) VALUES (NULL, '$student_fname',
         '$student_lname', '$student_other_name', '$student_index_number',
        '$student_level', '$student_programme', '$student_session', '$student_company_name', '$student_supervisor_name','$student_supervisor_contact', '$student_supervisor_email','$student_company_region', '$student_company_address','$student_registration_type', CURRENT_TIMESTAMP)";

      if($run_query = mysqli_query($conn,$my_insert_query)){
          echo "<script>alert('Details Have Been Submitted Successfully')</script>";

            if($student_registration_type == "VIRA REGISTRATION"){
            $my_update_query = "UPDATE `vira_registration` SET `company_supervisor_name` = '$student_supervisor_name' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query);
            
            $my_update_query2 = "UPDATE `vira_registration` SET `company_supervisor_contact` = '$student_supervisor_contact' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query2);
				
			$my_update_query3 = "UPDATE `vira_registration` SET `attachment_region` = 'Eastern Region' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query3);
            
          }else{
            $my_update_query = "UPDATE `industrial_registration` SET `company_supervisor_name` = '$student_supervisor_name' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query);

            $my_update_query2 = "UPDATE `industrial_registration` SET `company_supervisor_contact` = '$student_supervisor_contact' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query2);
				
			$my_update_query3 = "UPDATE `industrial_registration` SET `attachment_region` = '$student_company_region' WHERE index_number = '$student_index_number'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query3);
           
          }
      }else{
          echo "<script>alert('Details Not Submitted ')</script>";
      }

    }

   }
 }
  ?>

</body>
</html>
