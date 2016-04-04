<?php
if (isset($_POST['signup']) || isset($_POST['signin'])) {

  /*extract data*/
  $user_info = null;
  $email = $_POST['email'];
  $password = $_POST['password'];

  /* ================= SIGN IN ===================*/
  if (isset($_POST['signin'])) {
    
  }else 

  /*  ================= SIGN UP =================*/
  if (isset($_POST['signup'])) {
    /*extract data*/
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $visible = $_POST['visible'];
    
    /*compose query data. Needs to be changed with php's dom parser*/
    $xml = new DOMDocument("1.0");

    $user = $xml->createElement('user');
    $user = $xml->appendChild($user);

    $xml_email = $xml->createElement('email', $email);
    $xml_password = $xml->createElement('email', $password);
    $xml_firstname = $xml->createElement('first_name', $first_name);
    $xml_lastname = $xml->createElement('last_name', $last_name);
    $xml_visible = $xml->createElement('visible', $visible);

    $xml_email = $user->appendChild($xml_email);
    $xml_password = $user->appendChild($xml_password);
    $xml_password = $user->appendChild($xml_firstname);
    $xml_password = $user->appendChild($xml_lastname);
    $xml_password = $user->appendChild($xml_visible);

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



?>