<?php
/*test code to display all users in the database*/ 
//add [@email="email@email.com"] after //user to specify what to retrieve. 
  // sedna_execute('drop document "users"');
  if(!sedna_execute('doc("users")//user')){
    sedna_load('<users></users>', 'users');
    echo ('<div class="alert alert-warning">Could not execute query: ' . sedna_error() . "</div>");
  }else{
    // echo "<pre>";
    // var_dump(sedna_result_array());
    // echo "</pre>";
  }





if (isset($_POST['signup']) || isset($_POST['signin'])) {
  require_once "functions.php";
  /*extract data*/
  $user_info = null;
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  /* ================= SIGN IN ===================*/
  if (isset($_POST['signin'])) {
    $query = 'for $user in doc("users")//user 
      where 
        $user/password = "'.$password.'" and 
        $user[@email="'.$email.'"] 
      return $user ';
    if (!sedna_execute($query)) {
      $status = '<div class="alert alert-danger">Error ' . 
      sedna_error() .'getting user\'s information</div>';
    }else {
      $user = sedna_result_array();
      if (sizeof($user) == 0 || sizeof($user) > 1) {
        var_dump($user);
        $status = '<div class="alert alert-warning"> Wrong username or password. Please, verify your details and try again.</div>';
      }else {
        /*i should not actually do this. I should try to make sure the query returns an xml data than the single string. Will checkout how to return xml record instead of record as a single string and then update this point. */
        $_SESSION['id'] = md5($email);
        $_SESSION['email'] = $email;
        $status = ' <div style="text-align: center;" class="alert alert-success"> Succesfully Logged In </div>';
        $status .= "<center>You will be redirected to contacts page shortly. If nothing happends, please <a href='contacts.php'> click here. </a>  </center>";
        ?>
        <script type="text/javascript">
          window.setTimeout(function() {
            location.href = "contacts.php";
            }, 2000);
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
    $visible = isset($_POST['visible']) ? $_POST['visible'] : "off";

    //Upload image 
    if ($_FILES['file']['name'] == "") { 
      $image = 'img/default_user.png'; //no image uploaded
    }else {
      $image = uploadImage($_FILES, 'img/users/'); //uploaded an image
    }
    
    /*compose query data. Needs to be changed with php's dom parser*/
    $xml = new DOMDocument("1.0");

    $user = $xml->createElement('user');
    $user->setAttribute("email", $email);
    $user = $xml->appendChild($user);

    $xml_email = $xml->createElement('email', $email);
    $xml_password = $xml->createElement('password', $password);
    $xml_firstname = $xml->createElement('first_name', $first_name);
    $xml_lastname = $xml->createElement('last_name', $last_name);
    $xml_visible = $xml->createElement('visible', $visible);
    $xml_image = $xml->createElement('image', $image);

    $xml_email = $user->appendChild($xml_email);
    $xml_password = $user->appendChild($xml_password);
    $xml_firstname = $user->appendChild($xml_firstname);
    $xml_lastname = $user->appendChild($xml_lastname);
    $xml_visible = $user->appendChild($xml_visible);
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
      die('Could not add the user\'s information : ' . sedna_error() . "\n");
    }

    /*success message to be displayed on the page*/
    unset($_POST);
    $status = "<div class='alert alert-success'> $email added succesfull </div> ";
    
  }
}

?>