<?php
// session_start();
// DATABASE
require("../templates/db.php");

// REGISTER/LOGIN FORMULAR
$errors = array();
$username = "";
$pwd = "";
$email = "";

if(isset($_POST["register"])){

// REGISTER

$username = mysqli_real_escape_string($db, $_POST["username"]);
$pwd = mysqli_real_escape_string($db, $_POST["pwd"]);
$email = mysqli_real_escape_string($db, $_POST["email"]);

// ERRORS
if(empty($username)){ array_push($errors, "Username is empty"); }
if(empty($pwd)){ array_push($errors, "Password is empty"); }
if(empty($email)){ array_push($errors, "E-Mail is empty"); }

  if(count($errors) == 0){
    // CHECK IF USER EXISTS
    $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = $db->query($query);
    $user = $result->fetch_assoc();

    if ($user) {
      if ($user['name'] === $username) {
        array_push($errors, "Username already exists");
      }
      if ($user['email'] === $email) {
        array_push($errors, "E-Mail already exists");
      }
    }else{
      // REGISTER USER
      if(count($errors == 0)){
        $pwd_hashed = md5($pwd);

        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$pwd_hashed', '$email')";
        $db->query($query);
        $id = $db->insert_id;
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $id;
        $user_dir = "../users/$id";
        if(!mkdir($user_dir, 0777, true)){ die("Can't create Directory"); };
        header("Location: /");
      }
    }
  }
}

if(isset($_POST["login"])){

  // LOGIN

  $username = mysqli_real_escape_string($db, $_POST["username"]);
  $pwd = mysqli_real_escape_string($db, $_POST["pwd"]);

  // ERRORS
  if(empty($username)){ array_push($errors, "Username is empty"); }
  if(empty($pwd)){ array_push($errors, "Password is empty"); }

  if(count($errors) == 0){
    // LOGIN USER
    $pwd_hashed = md5($pwd);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$pwd_hashed'";
    $result = $db->query($query);

    // LOGIN SUCCEDED
    if(mysqli_num_rows($result) == 1){
      $result = $result->fetch_row();
      $_SESSION["username"] = $username;
      $_SESSION["user_id"] = intval($result[0]);
      header("Location: /");
    } else {
      // LOGIN FAILED
      $query = "SELECT * FROM users WHERE username='$username'";
      $result = $db->query($query);
      if(mysqli_num_rows($result) == 1){
        array_push($errors, "Wrong Password");
      } else {
        array_push($errors, "User doesnt exist");
      }
    }
  }

}
