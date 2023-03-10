<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IASMS</title>

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/main_page_style.css" />
  <link rel="stylesheet" href="view_registered_students.css" />

  <script type="text/javascript" src="../../js/jquery-3.1.1.min.js" />
  </script>
  <script type="text/javascript" src="../../js/bootstrap.min.js" />

<link rel="stylesheet" href="../../scss/main.css" />
   <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
  </script>
  <style>
    .accordion-button {
      border-left: #018374 10px solid;
    }

    .accordion-header {
      width: 100%;
    }

    .accordion-body {
      width: 100%;
      height: 100px;
    }

    #menu_list {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #018374;
    }

    #menu_list li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    #menu_list li a:hover {
      background-color: #111;
    }

    #top-navigation {
      width: 100%;
      background-color: #018374;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 100;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      box-sizing: border-box;
    }

    #title {
      color: white;
      font-size: 1.5em;
      font-weight: 600;
    }

    #student_name {
      color: white;
      font-size: 1.5em;
      font-weight: 600;
    }


    .logo {
      width: 100%;
      height: 150px;
      text-align: center;
      padding-top:10px;
  
    }

    .logo img {
      width: 80%;
      height: 100%;
    }

    .menu_items_link li {
      border-left: #ffffff 5px solid;
      margin-bottom: 2%;
    }
  </style>
</head>

<body>


  <div id="top-navigation"  style="background-color:#018374;" >
    <div id="title" class="text-uppercase">
      <h1>Industrial Attachment Management System</h1>
    </div>
    <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
  </div>



  <div id="left_side_bar" style="background-color:#018374;" >
    <div class='logo'>
      <img src="../../img/logo.png" alt="logo" />
    </div>
    <hr/>
    <ul id="menu_list">
      <a class="menu_items_link" href="../view_registered_students/view_registered_students.php">
        <li class="menu_items_list" >Registered Students</li>
      </a>
      <a class="menu_items_link" href="../students_assumptions/students_assumptions.php">
        <li class="menu_items_list">Student Assumptions</li>
      </a>
      <a class="menu_items_link" href="../assign_supervisors/assign_supervisors.php">
        <li class="menu_items_list">Assign Supervisors</li>
      </a>
      <a class="menu_items_link" href="#">
        <li class="menu_items_list">Visiting Superviors Score</li>
      </a>
      <a class="menu_items_link" href="../company_score/company_supervisor_score.php">
        <li class="menu_items_list">Company Supervisor Score</li>
      </a>
      <a class="menu_items_link" href="../change_password/change_password.php">
        <li class="menu_items_list">Change Password</li>
      </a>
      <a class="menu_items_link" href="../../index.php">
        <li class="menu_items_list">Logout</li>
      </a>
    </ul>
  </div>