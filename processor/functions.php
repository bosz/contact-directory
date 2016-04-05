<?php


function uploadImage($fileArray, $basePath){
    $uploadStatus = false;
    define ("MAX_SIZE","4000");
    $error=0;
    $change="";
    $filename = stripslashes($fileArray['file']['name']);
    $tmpfile = stripslashes($fileArray['file']['tmp_name']);  
    /*Now, am going to do image validation in all aspects.*/

    $extension = getExtension($filename);
    $extension = strtolower($extension);
      $filename = md5(date('Y-m-d h-i-s')) . "." .  $extension;

    if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
    {
      $change = '<div class="msgdiv">Unknown Image extension </div> ';
      $error=1;
    }else{
      $size=filesize($fileArray['file']['tmp_name']);
      if ($size > MAX_SIZE*1024){
        $change = '<div class="alert alert-danger">You have exceeded the size limit!</div> ';
        $error=1;
      }
    }
    
    
    if($error > 0){return $change;}

    else{
      /*at this point, the image has passed all the tests so it can be used freely.*/
      $target = $basePath;
      $target .= $filename;
      if( !move_uploaded_file($fileArray['file']['tmp_name'], $target) ){
        return "Problem uploading file";
      }
      $uploadStatus = true;
      return $target;
    }
  }

  function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) 
        {
          return ""; 
        }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
          return $ext;
  }

?>