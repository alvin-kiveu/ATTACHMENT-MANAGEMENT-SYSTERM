<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$student_index_number = $_COOKIE["student_index_number"];


$mysql_check_supervisor_assigned = "SELECT * FROM vira_registration WHERE index_number='$student_index_number' LIMIT 1";

$execute_check_supervisor_assigned = mysqli_query($conn, $mysql_check_supervisor_assigned);

$check_presence = mysqli_num_rows($execute_check_supervisor_assigned);

if ($check_presence == 1) {

   $get_entire_results = mysqli_fetch_array($execute_check_supervisor_assigned);

   $student_faculty = $get_entire_results["faculty"];
   $student_company_region = $get_entire_results["attachment_region"];
   $student_visiting_supervisor_name = $get_entire_results["visiting_supervisor_name"];

   if ($student_company_region != "unassigned" && $student_visiting_supervisor_name != "unassigned") {

      $contains_data = "true";

      $get_supervisors_contact_query = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty='$student_faculty' AND lecturer_name='$student_visiting_supervisor_name' LIMIT 1";

      $execute_get_supervisor_contact = mysqli_query($conn, $get_supervisors_contact_query);

      $get_supervisors_contact = mysqli_fetch_array($execute_get_supervisor_contact);

      $lecturers_contact = $get_supervisors_contact["lecturer_phone_number"];

      $assign_contact_to_student = "UPDATE `vira_registration` SET `visiting_supervisor_contact` = '$lecturers_contact' WHERE `index_number` = '$student_index_number'";

      $execute_assign_contact = mysqli_query($conn, $assign_contact_to_student);
   } else {
      $contains_data = "false";
   }
} else {
   $mysql_check_supervisor_assigned = "SELECT * FROM industrial_registration WHERE index_number='$student_index_number' LIMIT 1";

   $execute_check_supervisor_assigned = mysqli_query($conn, $mysql_check_supervisor_assigned);

   if (mysqli_num_rows($execute_check_supervisor_assigned) > 0) {

      $get_entire_results = mysqli_fetch_array($execute_check_supervisor_assigned);

      $student_faculty = $get_entire_results["faculty"];
      $student_company_region = $get_entire_results["attachment_region"];
      $student_visiting_supervisor_name = $get_entire_results["visiting_supervisor_name"];

      if ($student_company_region != "unassigned" && $student_visiting_supervisor_name != "unassigned") {

         $contains_data = "true";

         $get_supervisors_contact_query = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty='$student_faculty' AND lecturer_name='$student_visiting_supervisor_name' LIMIT 1";

         $execute_get_supervisor_contact = mysqli_query($conn, $get_supervisors_contact_query);

         $get_supervisors_contact = mysqli_fetch_array($execute_get_supervisor_contact);

         $lecturers_contact = $get_supervisors_contact["lecturer_phone_number"];

         $assign_contact_to_student = "UPDATE `industrial_registration` SET `visiting_supervisor_contact` = '$lecturers_contact' WHERE `index_number` = '$student_index_number'";

         $execute_assign_contact = mysqli_query($conn, $assign_contact_to_student);
      }
   } else {
      $contains_data = "false";
   }
}


?>

<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
   <meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
   </meta>
   <link rel="shortcut icon" href="../img/logo.png" />
   <meta property="og:image" content="../img/logo.png">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>IASMS</title>

   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/main_page_style.css" />
   <link rel="stylesheet" href="instructions_page.css" />

   <script type="text/javascript" src="../js/jquery-3.1.1.min.js" />
   </script>
   <script type="text/javascript" src="../js/bootstrap.min.js" />
   </script>
   <link rel="stylesheet" href="../scss/main.css" />
   <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
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
         height: 100px;
         text-align: center;
         padding-top: 10px;
      }

      .logo img {
         width: 80%;
         height: 100%;
      }

      .menu_items_link li{
         border-left: #ffffff 5px solid;
         margin-bottom: 2%;
      }
   </style>
</head>

<body>

   <div id="top-navigation" class="bg-primary">
      <div id="title" class="text-uppercase">
         <h1>Industrial Attachment Management System</h1>
      </div>
      <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo $student_fname . " " . $student_lname; ?></span></div>
   </div>
   <div id="left_side_bar" class="bg-primary">
      <div class='logo'>
         <img src="../img/logo.png" alt="logo" />
      </div>
      <hr>
      <ul id="menu_list">
         <a class="menu_items_link" href="../instructions_page/instructions_page.php">
            <li class="menu_items_list">Instructions</li>
         </a>
         <a class="menu_items_link" href="../Register_Page/register_page.php">
            <li class="menu_items_list">Register</li>
         </a>
         <a class="menu_items_link" href="../student_assumption/student_assumption.php">
            <li class="menu_items_list">Submit Assupmtion</li>
         </a>
         <a class="menu_items_link" href="../e-logbook/elogbook.php">
            <li class="menu_items_list">E-Logbook</li>
         </a>
         <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php">
            <li class="menu_items_list">Company Supervisor</li>
         </a>
         <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php">
            <li class="menu_items_list">Visiting Supervisor</li>
         </a>
         <a class="menu_items_link" href="../submit_report/submit_report.php">
            <li class="menu_items_list">Submit Report</li>
         </a>
         <a class="menu_items_link" href="../index.php">
            <li class="menu_items_list">Logout</li>
         </a>
      </ul>
   </div>