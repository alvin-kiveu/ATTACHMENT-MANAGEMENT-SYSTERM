<?php
include '../database_connection/database_connection.php';
$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];

if(isset($_POST["btn_login"])){
  if($_POST["txtvisiting_supervisor_password"]!=""){
    $supervisors_password = $_POST["txtvisiting_supervisor_password"];
    $supervisor_login_details = "SELECT * FROM supervisors_login WHERE password='$supervisors_password'";
    $execute_supervisors_login = mysqli_query($conn,$supervisor_login_details);
    $check_query = mysqli_num_rows($execute_supervisors_login);

    if($check_query==1){
      header("Location:visiting_supervisor_grade.php");
    }
  }
}

 ?>
<?php include '../header.php' ?>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle">Login - Visiting Supervisor</h2>
       </div>
       <form method="post" action="">
        <div class = "panel-body pbody">
          <div class="panel">
           <div class="panel-body pbody_login_holder">
             <br>
             <div style="text-align:center;font-size:1.2em"><strong>PASSWORD</strong></div>
             <hr>
                  <input type="password" class="form-control form-control-adjusted" id="txtvisiting_supervisor_password" name="txtvisiting_supervisor_password" placeholder="Enter Password"/><br>
                <div id="btn_login_holder">
                <input type="submit" class="btn btn-primary" value="Login" id="btn_visiting_login" name="btn_login"/>
            </div>
       </div>
       </panel>
      </div>
     </div>
     </form>
   </div>
 </div>
</body>
</html>
