<?php

    $template_dir = "../templates";
    $id = isset($_GET["v"]) ? $_GET["v"] : "";
    require "$template_dir/header.php";
    require "$template_dir/db.php";
    require "server.php";

    $video_url = "/videos/$id/video.mp4";
    require "video.php";
    require "comments.php";

    require "$template_dir/bottom.php";
?>
