<?php
	if (isset($_POST['edit'])) {
		require_once "functions.php";
  		$contact_info = null;
		$user_id = $_SESSION['email'];
  		
  		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$alias = $_POST['alias'];
		$email = $_POST['email'];
		$skype = $_POST['skype_id'];
		$relation = $_POST['relation'];
		$note = $_POST['note'];
		$phone = $_POST['phone'];
		

		if ($_FILES['file']['name'] == "") { 
	      $image = $_POST['old_img']; //maintain old image
	    }else {
	      $image = uploadImage($_FILES, 'img/contacts/'); //uploaded an image
	    }

	    $xml = new DOMDocument("1.0");
	    $user_contact = $xml->createElement('contact');
	    $user_contact->setAttribute('id', $alias);
	    $user_contact = $xml->appendChild($user_contact);
	    $xml_name = $xml->createElement('name', $fname.' '.$lname);
	    $xml_alias = $xml->createElement('alias', $alias);
	    $xml_email = $xml->createElement('email', $email);
	    $xml_skype = $xml->createElement('skype', $skype);
	    $xml_relation = $xml->createElement('relation', $relation);
	    $xml_note = $xml->createElement('note', $note);
	    $xml_phone = $xml->createElement('phone', $phone);
	    $xml_image = $xml->createElement('image', $image);

	    $xml_name = $user_contact->appendChild($xml_name);
	    $xml_alias = $user_contact->appendChild($xml_alias);
	    $xml_email = $user_contact->appendChild($xml_email);
	    $xml_skype = $user_contact->appendChild($xml_skype);
	    $xml_relation = $user_contact->appendChild($xml_relation);
	    $xml_note = $user_contact->appendChild($xml_note);
	    $xml_phone = $user_contact->appendChild($xml_phone);
	    $xml_image = $user_contact->appendChild($xml_image);

	    $xml->formatOutput = true;

	    /*remove the <?xml version="1.0"?> from the xml generated document*/
	    foreach ($xml->childNodes as $node) {
	       $contact_info = $contact_info . $xml->saveXML($node);
	      
	   }
	   $query = 
	   'UPDATE replace $contact in doc("contactDir")//contacts[@id="'.$user_id.'"]//contact[@id="'.$alias.'"] with '.$contact_info;
	   if (!sedna_execute($query)) {
	      die('Could not update the user\'s contact : ' . sedna_error() . "\n");
	   }

	}

	if(isset($_GET['alias']))
    {
        $alias = $_GET['alias'];
        $query = 'doc("contactDir")//contacts//contact[@id="'.$alias.'"]';
        if (!sedna_execute($query)) {
                  echo $status = '<div class="alert alert-danger">Error ' . 
                  sedna_error() .'getting user\'s information</div>';
                }
                

        elseif(sizeof($contacts = sedna_result_array()) > 0)
        {
          $contact = $contacts[0];
          $xml = new SimpleXMLElement($contact);
          $name = explode(" ", $xml->name);
          $fname = $name[0];
          $lname = $name[1];
          $phone =  $xml->phone;
          $alias = $xml->alias;
          $image = $xml->image;
          $email = $xml->email;
          $skype = $xml->skype;
          $relation = $xml->relation;
          $note = $xml->note;

        }else {
          
        }
        unset($_GET);
    }else {

    }
?>