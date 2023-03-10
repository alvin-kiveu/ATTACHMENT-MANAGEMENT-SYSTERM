<?php
$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
 ?>

<?php include '../header.php' ?>

<div id="main_content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class = "panel">
           <div class = "panel-body pbody pbody_vira">
              <span>In case you have decided and paid to do your Industrial
              Attachment at Kabarak Univeristy,<br><em style="font-weight:bold;color:#2B3775"> Please Click On The Button Below </em></span>
          <br><br>
            <button type="button" class="btn btn-primary btn-medium" style="padding:10px;color:white" id="btn_vira">VIRA</button>
           </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class = "panel">
           <div class = "panel-body pbody pbody_industrial">
              <span>In case you are interning with a company or institution other than Koforidua Technical University,<br><em style="font-weight:bold;color:#2B3775"> Please Click On The Button Below </em></span>
          <br><br>
            <button type="button" class="btn btn-primary btn-medium" style="padding:10px;color:white" id="btn_industrial">INDUSTRIAL</button>
           </div>
        </div>
      </div>
</div>

</div>
</div>

<script>
$(document).ready(function(){
  $("#btn_vira").click(function(){
    var url = "vira_registration_page.php";
    $(location).attr('href',url);
  });

  $("#btn_industrial").click(function(){
    var url = "industrial_registration_page.php";
    $(location).attr('href',url);
  });
});
</script>

</body>
</html>
