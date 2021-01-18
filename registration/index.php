<?php
  $headers = "<link rel='stylesheet' href='css/master.css'>";
  require("../templates/header.php");
  require("server.php");
  require("errors.php");

  if(isset($_GET["page"])){
    if($_GET["page"] == "login"){
      require("login.php");
    }else if($_GET["page"] == "register"){
      require("register.php");
    }
  }else{
    header("Location: /");
  }

  $tags = "<script src='js/main.js'></script>";
  require("../templates/bottom.php");
?>
