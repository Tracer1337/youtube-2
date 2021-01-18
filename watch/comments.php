<div class="container w-75">
  <?php
    if(isset($_SESSION["user_id"])){
      echo "
      <form class='form-group' method=POST>
        <div class='row'>
          <div class='col-10'>
            <textarea name='comment' rows='1' class='form-control' required></textarea>
          </div>
          <div class='col-2'>
            <button type='submit' name='sendComment' value='send' class='btn btn-outline-success'>Send Comment</button>
          </div>
        </div>
      </form>
      ";
    }
  ?>

  <div class="text-white">
    <?php loadComments("$template_dir/db.php"); ?>
  </div>
</div>
