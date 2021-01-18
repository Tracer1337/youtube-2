<?php

$errors = array();
if(isset($_POST["upload"])){
  $video = $_FILES["video"];
  $pic = $_FILES["thumbnail"];
  echo "<div class='text-white'>";
  // CHECK FOR ERRORS
  if($video["error"] > 0){
    // ERROR
    echo "ERROR Code:".$video["error"];
  }else{
    // NO ERRORS
    $max_size = 314572800;
    $desc = $_POST["desc"];
    $title = $_POST["title"];
    $tags = isset($_POST["tags"]) ? $_POST["tags"] : array();

    // CHECK IF FILE IS VIDEO
    $allowed_exts = array("flv", "mp4", "avi", "wmv", "mov");
    $extension = pathinfo($video["name"], PATHINFO_EXTENSION);
    $type_ok = false;
    foreach($allowed_exts as $ext){
      if($video["type"] == "video/$ext"){ $type_ok = true; };
      if($type_ok){ break; }
    }
    if(!$type_ok){ array_push($errors, "Invalid Video Format"); };
    if($video["size"] > $max_size){ array_push($errors, "Video is too big"); }
    // CHECK IF PICTURE IS IMAGE
    if(exif_imagetype($pic["tmp_name"]) !== IMAGETYPE_PNG){ array_push($errors, "Invalid Thumbnail Format"); };

    if(count($errors) == 0){
      // FILE IS VALID VIDEO
      // INSERT INTO DATABASE
      $id = $_SESSION["user_id"];
      $query = "INSERT INTO videos (user_id, title, description, extension) VALUES ('$id', '$title' ,'$desc', '$extension')";
      $db->query($query);
      $id = $db->insert_id;
      // SET TAGS
      foreach($tags as $tag){
        // CHECK IF TAG EXISTS
        $query = "SELECT * FROM tags WHERE name='$tag'";
        $res = $db->query($query);
        if(mysqli_num_rows($res) > 0){
          // SET TAG
          $query = "INSERT INTO tagvideo (video_ID, tag_Name) VALUES ('$id', '$tag')";
          $db->query($query);
        }
      }
      // MOVE INTO FOLDER
      $dir_save = "../videos/$id/";
      if(!mkdir($dir_save, 0777, true)){ die("Can't create Directory"); };
      move_uploaded_file($video["tmp_name"], $dir_save."video.$extension");
      $extension = pathinfo($pic["name"], PATHINFO_EXTENSION);;
      move_uploaded_file($pic["tmp_name"], $dir_save."thumbnail.$extension");
      header("Location: /");
    }
  }
  echo "</div>";
}
