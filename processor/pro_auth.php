<?php
  
if (isset($_POST['signup']) || isset($_POST['signin'])) {

  /*extract data*/
  $file_name = "data/" . md5(time('y:m:d h:i:s:u')) . ".xml" ;
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
    $xml->saveXML();
    $xml->save($file_name) or die('Error working with xml');

    $user_info = file_get_contents($file_name);
    


    unlink($file_name);
    if(!sedna_load($user_info, 'user'))
      die('Could not load the document: ' . sedna_error() . "\n");
    echo "Data loaded succesfully";
    
  }
}



?>