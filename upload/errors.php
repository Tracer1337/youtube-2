<?php
if(count($errors) > 0){
  ?> <div class="container"> <?php
  foreach($errors as $error){
    echo "
    <div class='alert alert-danger my-1'>
      <strong>$error</strong>
    </div>
    ";
  }
  ?> </div> <?php
}
