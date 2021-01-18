<?php

if(isset($_POST["sendComment"])){
  // COMMENT
  $text = $_POST["comment"];
  $video_id = $id;
  if(empty($text)){
    // COMMENT INVALID
    echo "<div class='alert alert-danger my-1'>Comment can't be empty</div>";
  }else{
    // SEND COMMENT
    $user_id = $_SESSION["user_id"];
    $query = "INSERT INTO comments (video_ID, user_ID, content) VALUES ('$video_id', '$user_id', '$text')";
    $res = $db->query($query);
    header("Location: /watch/index.php?v=$video_id");
  }
}

function loadComments($db){
  require $db;
  // GET COMMENTS JOINING USERNAMES
  $query = "SELECT comments.content, users.username FROM comments INNER JOIN users ON comments.user_ID = users.ID ORDER BY comments.ID DESC";
  $res = $db->query($query);
  while($row = $res->fetch_assoc()){
    echo "<div class='alert alert-info row m-0'>
      <div class='col-2 border-right border-secondary'>
        <span class=''>".$row["username"]."</span>
      </div>
      <div class='col-10'>
        <span class=''>".$row["content"]."</span>
      </div>
    </div>";
  }
}
