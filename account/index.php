<?php
  $headers = "<link rel='stylesheet' href='css/master.css'>";
  require("../templates/header.php");
  require("../templates/db.php");
  require("../templates/video_preview.php");
  require("server.php");
  require("errors.php");
?>

<div class="container h-100 text-white pt-2">
  <div class="container w-50">
    <div class="position-relative">
      <!-- PROFILE PICTURE -->
      <form id="PBForm" method="post" enctype="multipart/form-data">
        <div class="pb text-dark">
          <input type="hidden" name="MAX_FILE_SIZE" value="26214400">
          <input type="file" id="PBUp" name="image" class="d-none">
          <button type="button" id="PBTrigger" class="w-100 h-100 bg-none">
            <span id="PBText">
              <?php
                $id = $_SESSION["user_id"];
                if(file_exists("../users/$id/pb.png")){
                  echo "<img src='../users/$id/pb.png' id='pb'></img>";
                }else{
                  echo "<i class='fas fa-camera fa-3x'></i>";
                }
              ?>
            </span>
          </button>
          <button type="submit" id="PBSubmit" name="upload" class="d-none">Upload Image</button>
        </div>
      </form>
      <!-- USERNAME -->
      <div class="my-2 text-center">
        <span><h4><?php echo $_SESSION["username"]; ?></h4></span>
      </div>
    </div>
  </div>
  <!-- VIDEOS FROM USER -->
  <div class="my-5">
      <?php loadVideos("../templates/db.php"); ?>
  </div>
</div>

<?php
  $tags = "<script src='js/main.js'></script>";
  require("../templates/bottom.php");
?>
