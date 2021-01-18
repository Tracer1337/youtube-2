<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/master/css/master.css">
  <script src="/master/js/jquery-3.3.1.min.js"></script>
  <script src="/master/js/fontawesome-all.js"></script>
  <?php
    if(isset($headers)){echo $headers;};
  ?>
  <title>YouTube 2</title>
</head>
<body>
<!-- HEADER -->
<div class="container-fluid header text-dark row m-0">
  <!-- NAVIGATION -->
  <div class="col">
      <a href="/" class="link">Homepage</a>
      <!-- <a href="#" class="link">Categories</a>
      <a href="#" class="link">Trends</a> -->
      <?php
        if(isset($_SESSION["username"])){
          echo "<a href=\"/account\" class=\"link\">Account</a>";
          echo "<a href=\"/upload\" class=\"link\">Upload</a>";
          echo "<a href=\"/?logout=true\" class=\"link\">Logout</a>";
        } else {
          echo "<a href=\"/registration/?page=login\" class=\"link\">Login</a>";
        }
        if(isset($_GET["logout"])){
          session_destroy();
          header("Location: /");
        }
      ?>
  </div>
  <!-- ÜBERSCHRIFT -->
  <div class="container text-center col heading">
    <span><img src="/master/img/logo.jpg"></img> 2</span>
  </div>
  <!-- SUCHE -->
  <div class="col container row search">
    <div class="col-10">
      <input class="search" type="text" placeholder="Search in YouTube2">
    </div>
    <div class="col-2">
      <button class="btn btn-dark"><i class="fas fa-search fa-lg"></i></button>
    </div>
  </div>
</div>
<div class="container-fluid main m-0 w-100">
