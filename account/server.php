<?php

echo "<div class='text-white'";
$errors = array();
if(isset($_POST["upload"])){
  // UPLOAD PROFILE PICTURE
  $pic = $_FILES["image"];
  $max_size = 26214400;
  // CHECK FOR UPLOAD ERRORS
  if($pic["error"] > 0){
    array_push($errors, "Something went wrong");
  }
  // CHECK IF PICTURE IS AN IMAGE
  if(exif_imagetype($pic["tmp_name"]) !== IMAGETYPE_PNG){ array_push($errors, "Invalid Image Format"); };
  // CHECK IMAGE SIZE
  if($pic["size"] > $max_size){ array_push($errors, "Image is too big"); };
  list($width, $height) = getimagesize($pic["tmp_name"]);
  if($width !== $height){ array_push($errors, "Image has to be a Square"); }
  if(count($errors) == 0){
    // INSERT IMAGE IN FOLDER
    $id = $_SESSION["user_id"];
    $dir_save = "../users/$id/";
    $extension = pathinfo($pic["name"], PATHINFO_EXTENSION);
    if(!move_uploaded_file($pic["tmp_name"], $dir_save."pb.$extension")){ array_push($errors, "Unable to move image"); }
  }
}
echo "</div>";

function loadVideos($db){
  require $db;
  // GET VIDEOS OF USER
  $query = "SELECT * FROM videos WHERE user_id='".$_SESSION["user_id"]."' LIMIT 20";
  $res = $db->query($query);
  while($row = $res->fetch_assoc()){
    $video = new Video();
    $id = $row["ID"];
    $ext = $row["extension"];
    $desc = $row["description"];
    $video->init($id, $ext, $desc);
    $video->insert();
  }
}
