<?php

include 'database_connection/database_connection.php';

$_SESSION["wrong_password"] = "";

if (isset($_POST["btn_signin"])) {
  $login_index_number = $_POST["txtusername"];
  $login_password = $_POST["txtpassword"];

  $check_user_existence = "SELECT * FROM registered_students WHERE index_number='$login_index_number' AND password='$login_password' LIMIT 1";
  $run_query = mysqli_query($conn, $check_user_existence);
  $user_exist = mysqli_num_rows($run_query);
  if ($user_exist == 1) {
    $get_user_details = "SELECT * FROM registered_students WHERE index_number='$login_index_number'";
    $run_get_details = mysqli_query($conn, $get_user_details);
    $get_detail = mysqli_fetch_assoc($run_get_details);

    $user_first_name = $get_detail["first_name"];
    $user_last_name = $get_detail["last_name"];
    setcookie("student_first_name", $user_first_name, time() + (86400 * 30), "/");
    setcookie("student_last_name", $user_last_name, time() + (86400 * 30), "/");
    setcookie("student_index_number", $login_index_number, time() + (86400 * 30), "/");

    header("Location:instructions_page/instructions_page.php");
  } else {
    $_SESSION["wrong_password"] = "Wrong Username or Password";
  }
}

if (isset($_POST["btn_signup"])) {
  $reg_first_name = $_POST["txt_signup_firstname"];
  $reg_last_name = $_POST["txt_signup_lastname"];
  $reg_index_number = $_POST["txt_signup_indexnumber"];
  $reg_password = $_POST["txt_signup_password"];

  if ($reg_first_name != "" && $reg_last_name != "" && $reg_index_number != "" && $reg_password != "") {
    $check_existence = "SELECT * FROM registered_students WHERE index_number='$reg_index_number'";
    $execute_check_existence = mysqli_query($conn, $check_existence);
    $data_existence = mysqli_num_rows($execute_check_existence);

    if ($data_existence == 1) {
      $message = "Sorry, Account Already Exists";
      echo "<script>alert('$message')</script>";
    } else {
      $register_student_query = "INSERT INTO registered_students (first_name,last_name,index_number,password) VALUES ('$reg_first_name','$reg_last_name','$reg_index_number','$reg_password')";
      if ($execute_register_student = mysqli_query($conn, $register_student_query)) {

        setcookie("student_first_name", $reg_first_name, time() + (86400 * 30), "/");
        setcookie("student_last_name", $reg_last_name, time() + (86400 * 30), "/");
        setcookie("student_index_number", $reg_index_number, time() + (86400 * 30), "/");

        header("Location:instructions_page/instructions_page.php");
      } else {
        $error_message = "Unable to register due to errors";
        echo "<script>alert('$error_message')</script>";
      }
    }
  } else {
    $fill_spaces_message = "Provide Details For All Spaces";
    echo "<script>alert('$fill_spaces_message')</script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/jquery-3.1.1.min.js" />
  </script>
  <script type="text/javascript" src="js/bootstrap.min.js" />
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  </meta>
  <link rel="shortcut icon" href="img/logo.png" />
  <meta property="og:image" content="img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IASMS</title>
  <link rel="stylesheet" href="scss/main.css" />
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .login-wrap {
      width: 100%;
      margin: auto;
      min-height: 570px;
    }

    .login-html {
      width: 50%;
      background: white;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      padding: 5%;
      height: auto;
    }

    html,
    body {
      height: 100%
    }

    a {
      text-decoration: none;
    }

    .login-title {
      text-align: center;
      font-size: 18px;
      font-weight: 700;
      color: black;
      margin-bottom: 20px;
    }

    .tabholder {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
      color: #018374;
      border-color: black;
    }
  </style>
</head>

<body style="background:white;">



  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row shadow-lg  w-40 p-3 mb-5 bg-white align-items-center justify-content-center   rounded">

      <div class="login-html">
        <div class=" panel-heading">
          <div class="panel-title text-center font-weight-bold text-capitalize"> INDUSTRIAL ATTACHMENT MANAGEMENT SYSTEM</div>
        </div>
        <input id="tab-1" type="radio" name="tab" style="color:black;" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
          <form method="post" action="">
            <fieldset>
              <div class="sign-in-htm">
                <div class="mb-3">
                  <label for="user" class="label">Index Number</label>
                  <input id="user" type="text" class="form-control w-35" name="txtusername">
                </div>
                <div class="mb-3">
                  <label for="pass" class="label">Password</label>
                  <input id="pass" type="password" class="form-control w-35nput" data-type="password" name="txtpassword">
                </div>
                <div class="mb-3">
                  <input id="check" type="checkbox" class="check" checked>
                  <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success form-control font-weight-bold" style="background: #018374;" name="btn_signin" id="btn_signin" />
                </div>

                <div class="group" style="text-align: center">
                  <a href="admin/index.php"><u style="color:#26e2f7"></u>Admin Login</a>
                </div>

                <div class="hr"></div>
                <div class="error_message_holder"><span><?php echo $_SESSION["wrong_password"] ?></span></div>
              </div>

            </fieldset>
          </form>

          <form method="post" action="">
            <fieldset>
              <div class="sign-up-htm">
                <div class="mb-3">
                  <label for="firstname" class="label">First Name</label>
                  <input id="firstname" type="text" class="form-control w-35" name="txt_signup_firstname">
                </div>
                <div class="mb-3">
                  <label for="lastname" class="label">Last Name</label>
                  <input id="lastname" type="text" class="form-control w-35" name="txt_signup_lastname">
                </div>
                <div class="mb-3">
                  <label for="index_number" class="label">Index Number</label>
                  <input id="index_number" type="text" class="form-control w-35" name="txt_signup_indexnumber">
                </div>
                <div class="mb-3">
                  <label for="pass" class="label">Password</label>
                  <input id="pass" type="password" class="form-control w-35" data-type="password" name="txt_signup_password">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success form-control font-weight-bold" style="background: #018374;" value="Sign Up" name="btn_signup" id="btn_signup" />
                </div>
                <div class="hr"></div>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>