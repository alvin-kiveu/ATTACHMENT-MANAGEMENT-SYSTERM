<?php
include '../database_connection/database_connection.php';

if (isset($_POST["btn_login"])) {
  if ($_POST["admin_password"] != "") {
    $entered_password = $_POST["admin_password"];
    $check_password_query = "SELECT * FROM system_admin WHERE password='$entered_password' LIMIT 1";
    $execute_check_password_query = mysqli_query($conn, $check_password_query);
    $check_admin_validity = mysqli_num_rows($execute_check_password_query);
    if ($check_admin_validity == 1) {
      header("Location:view_registered_students/view_registered_students.php");
    } else {
      echo "<script>alert('Entered Password Is Incorrect')</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  </meta>
  <link rel="shortcut icon" href="img/logo.png" />
  <meta property="og:image" content="img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IASMS</title>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-select.css" />
  <link rel="stylesheet" href="../css/main_page_style.css" />
  <link rel="stylesheet" href="index.css" />

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js" />
  </script>
  <script type="text/javascript" src="../js/bootstrap.min.js" />
  </script>
  <link rel="stylesheet" href="../scss/main.css" />
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

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

<body>


  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row shadow-lg  w-60 p-3 mb-5 bg-white align-items-center justify-content-center   rounded">
      <div class=" panel-heading">
        <div class="panel-title text-center font-weight-bold text-capitalize"> Login - Administrator</div>
      </div>
      <form method="post" action="">
        <fieldset>
          <br>
          <div style="text-align:center;font-size:1.2em"><strong>PASSWORD</strong></div>
          <hr>
          <div class="mb-3">
            <input type="password" class="form-control w-35nput" id="admin_password" name="admin_password" placeholder="Enter Password" /><br>
          </div>
          <input type="submit" class="btn btn-primary form-control font-weight-bold" value="Login" id="btn_visiting_login" name="btn_login" />
        </fieldset>
      </form>
      <div style="margin-top: 5%">
      <span><a href="../index.php" style="text-decoration: none;"><u>Go Back To Main Login</u></a></span>
    </div>
    </div>
   
  </div>

</body>

</html>