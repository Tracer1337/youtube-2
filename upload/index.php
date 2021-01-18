<?php
  $headers = "<link rel='stylesheet' href='css/master.css'>";
  require("../templates/header.php");
  require("../templates/db.php");
  require("server.php");
  require("errors.php");
?>
  <div class="container w-50">
    <form method="post" enctype="multipart/form-data">
      <!-- VIDEO UPLOAD -->
      <div class="">
        <input type="hidden" name="MAX_FILE_SIZE" value="314572800">
        <input type="file" name="video" id="videoUp" class="d-none" required>
        <div class="btnWrap">
          <button type="button" id="triggerVideoUp">
            <div class="container w-100 h-100 text-white position-relative">
              <div class="uploadLabelWrap" id="uploadText">
                <span class="uploadLabel">Upload Video</span>
                <i class="fas fa-upload"></i>
              </div>
            </div>
          </button>
        </div>
      </div>
      <!-- VIDEO THUMBNAIL -->
      <div class="text-white">
        <label for="thumbnail">Select Thumbnail</label>
        <input type="file" name="thumbnail">
      </div>
      <!-- VIDEO NAME -->
      <div class="">
        <input type="text" name="title" placeholder="Title" class="form-control" required></input>
      </div>
      <!-- VIDEO DESCRIPTION -->
      <div class="">
        <textarea name="desc" placeholder="Description" class="form-control" required></textarea>
      </div>
      <!-- VIDEO TAGS -->
      <div class="">
        <?php
          // QUERY TAGS FROM DATABASE
          $query = "SELECT name FROM tags";
          $result = $db->query($query);
          while($row = $result->fetch_assoc()){
            $tag = $row["name"];
            echo "<label class='text-white'>$tag</label>&nbsp;&nbsp;&nbsp;";
            echo "<input type='checkbox' name='tags[]' value='$tag'></input><br>";
          }
        ?>
      </div>
      <div class="">
        <button type="submit" name="upload" class="btn btn-primary my-1">Upload Video</button>
      </div>
    </form>
  </div>
<?php
  $tags = "<script src='js/main.js'></script>";
  require("../templates/bottom.php");
?>
