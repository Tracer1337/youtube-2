<?php
  require("./templates/header.php");
  require("./templates/db.php");

  require("./templates/video_preview.php");
  // SHOW RECENT VIDEOS
  $query = "SELECT * FROM videos LIMIT 20";
  $res = $db->query($query);
  while($row = $res->fetch_assoc()){
    $video = new Video();
    $id = $row["ID"];
    $ext = $row["extension"];
    $desc = $row["description"];
    $video->init($id, $ext, $desc);
    $video->insert();
  }

  require("./templates/bottom.php");
?>
