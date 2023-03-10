<?php

include '../../database_connection/database_connection.php';

if(isset($_POST["btn_submit"])){

  $user_current_password = $_POST["txt_current_password"];
  $user_new_password = $_POST["txt_new_password"];
  $user_password_confirm = $_POST["txt_confirm_password"];

  if($user_password_confirm!="" && $user_current_password!="" && $user_new_password!=""){

    $my_query_command = "SELECT * FROM supervisors_login WHERE password='$user_current_password'";
    $mysql_query = mysqli_query($conn,$my_query_command);
    $fetch_rows = mysqli_fetch_assoc($mysql_query);

    if($fetch_rows["password"]=="$user_current_password"){

      if($user_new_password == $user_password_confirm){
      $insert_command = "UPDATE supervisors_login SET password = '$user_new_password' WHERE password='$user_current_password'";
      $execute_insert_query = mysqli_query($conn,$insert_command);
      echo "<script>alert('Password Has Been Updated Successfully')</script>";
    }
  }
  }
}

?>
<?php include '../header.php'; ?>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading industrial_phead">
          <h2 class = "panel-title industrial_ptitle"> Change Password</h2>
       </div>

            <div class = "panel-body industrial_pbody">

         <div class="panel">
           <div class="panel-body">
             <form method="post" action="">
               <div class="form-group">
                <label for="txt_current_password">Current Password</label>
                <input type="password" class="form-control form-control-adjusted" id="txt_current_password" placeholder="Enter current password" name="txt_current_password">
              </div>

              <div class="form-group">
               <label for="txt_new_password">New Password </label>
               <input type="password" class="form-control form-control-adjusted" id="txt_new_password" placeholder="Enter new password" name="txt_new_password">
             </div>

             <div class="form-group">
              <label for="txt_confirm_password">Confirm New Password </label>
              <input type="password" class="form-control form-control-adjusted" id="txt_confirm_password" placeholder="Confirm new password" name="txt_confirm_password">
            </div>

          <div id="btn_submit_holder">
          <input type="submit" class="btn btn-primary" value="Submit"  name="btn_submit"/>
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
