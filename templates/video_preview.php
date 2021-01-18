<?php
function template($id, $ext, $desc){
  $temp = "<div class=\"d-inline-block\">
            <div class=\"video-preview\">
              <a href=\"./watch/?v=$id\" class=\"remove-default\" style=\"color:#000; text-decoration:none\">
               <div class=\"video-preview-thumbnail\">
                 <img src=\"./videos/$id/thumbnail.png\">
                 <div class=\"video-preview-length\"></div>
               </div>
               <div class=\"text-center video-preview-title\">
                 <span>$desc</span>
               </div>
               </a>
             </div>
            </div>";
  echo $temp;
};

class video {
 public $id = "";
 public $extension = "";
 public $desc = "";
 public $time = "";

 public function init($id, $ext, $desc){
   $this->id = $id;
   $this->extension = $ext;
   $this->desc = $desc;
 }

 public function insert(){
   template($this->id, $this->extension, $this->desc);
 }
}
