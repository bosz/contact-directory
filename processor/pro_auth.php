<?php
/*test code to display all users in the database*/ 
//add [@email="email@email.com"] after //user to specify what to retrieve. 
  // sedna_execute('drop document "users"');
  if(!sedna_execute('for $user in doc("users")//user 
                   return $user')){
    sedna_load('<users></users>', 'users');
    echo ('<div class="alert alert-warning">Could not execute query: ' . sedna_error() . "</div>");
  }else{
    echo "<pre>";
    var_dump(sedna_result_array());
    echo "</pre>";
  }





if (isset($_POST['signup']) || isset($_POST['signin'])) {


  /*extract data*/
  $user_info = null;
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  /* ================= SIGN IN ===================*/
  if (isset($_POST['signin'])) {
    /*need to add something like this for password, curently, it does not work*/
    /* [password="'.$password.'"] */
    $query = 
      'for $user in doc("users")/user[@email="'.
      $email.'"] return $user';
    if (!sedna_execute($query)) {
      $status = '<div class="alert alert-danger">Error ' . 
      sedna_error() .'getting user\'s information</div>';
    }else {
      $user = sedna_result_array();
      if (sizeof($user) == 0 || sizeof($user) > 1) {
        $status = '<div class="alert alert-warning"> Wrong username or password. Please, verify your details and try again.</div>';
      }else {
        /*i should not actually do this. I should try to make sure the query returns an xml data than the single string. Will checkout how to return xml record instead of record as a single string and then update this point. */
        $user = explode("\n", $user[0]);
        $_SESSION['id'] = md5($email);
        $_SESSION['email'] = $email;
        $_SESSION['image'] = $user[6];
        echo ' <div style="text-align: center;" class="alert alert-success"> Succesfully Logged In </div>';
        echo "<center>You will be redirected to contacts page shortly. If nothing happends, please <a href='contacts.php'> click here. </a>  </center>";
        ?>
        <script type="text/javascript">
          window.setTimeout(function() {
            location.href = "contacts.php";
            }, 4000);
        </script>
        <?php
      }
    }
  }else 

  /*  ================= SIGN UP =================*/
  if (isset($_POST['signup'])) {
    /*extract data*/
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $visible = $_POST['visible'];

    //Upload image 
    $image = uploadImage($_FILES, 'img/users/');
    
    /*compose query data. Needs to be changed with php's dom parser*/
    $xml = new DOMDocument("1.0");

    $user = $xml->createElement('user');
    $user->setAttribute("email", $email);
    $user = $xml->appendChild($user);

    $xml_email = $xml->createElement('email', $email);
    $xml_password = $xml->createElement('email', $password);
    $xml_firstname = $xml->createElement('first_name', $first_name);
    $xml_lastname = $xml->createElement('last_name', $last_name);
    $xml_visible = $xml->createElement('visible', $visible);
    $xml_image = $xml->createElement('image', $image);

    $xml_email = $user->appendChild($xml_email);
    $xml_password = $user->appendChild($xml_password);
    $xml_password = $user->appendChild($xml_firstname);
    $xml_password = $user->appendChild($xml_lastname);
    $xml_password = $user->appendChild($xml_visible);
    $xml_image = $user->appendChild($xml_image);

    $xml->formatOutput = true;

    /*remove the <?xml version="1.0"?> from the xml generated document*/
    foreach ($xml->childNodes as $node) {
       $user_info = $user_info . $xml->saveXML($node);
    }

    /*adding user into users document. look at the sql*/
    $query = 'UPDATE insert ' . $user_info . ' into doc("users")';

    /*execute the sql stateuemt to add the user into users*/
    if (!sedna_execute($query)) {
      die('Could not load the document: ' . sedna_error() . "\n");
    }

    /*success message to be displayed on the page*/
    unset($_POST);
    $status = "<div class='alert alert-success'> $email added succesfull </div> ";
    
  }
}




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