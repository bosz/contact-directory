<?php

	# Working with contacts in database
	//sedna_execute("drop document 'contactDir'");
	if(!sedna_execute('doc("contactDir")'))
	{
	    sedna_load('<contactDir></contactDir>', 'contactDir');
	    echo ('<div class="alert alert-warning">Could not create contact document: ' . sedna_error() . "</div>");
  	}
  	else
  	{
	    /*echo "<pre>";
	    var_dump(sedna_result_array());
	    echo "</pre>";*/
  	}

  	if(isset($_POST['new']))
  	{
  		require_once "functions.php";
  		$user_info = null;
  		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$alias = $_POST['alias'];
		$email = $_POST['email'];
		$skype = $_POST['skype_id'];
		$relation = $_POST['relation'];
		$note = $_POST['note'];
		$phone = $_POST['phone'];

		if ($_FILES['file']['name'] == "") { 
	      $image = 'img/default_user.png'; //no image uploaded
	    }else {
	      $image = uploadImage($_FILES, 'img/contacts/'); //uploaded an image
	    }

		$user_id = $_SESSION['email'];

		/*compose query data. Needs to be changed with php's dom parser*/
	    $xml = new DOMDocument("1.0");

	    $query = "doc('contactDir')//contacts[@id='".$user_id."']";

	    if(sedna_execute($query) && sizeof(sedna_result_array())>0)
	    {

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
			       $user_info = $user_info . $xml->saveXML($node);
			      
			   }

			   $query = 'UPDATE insert ' . $user_info . ' into doc("contactDir")//contacts[@id="'.$user_id.'"]';
			   if (!sedna_execute($query)) {
				      die('Could not add the user\'s contact : ' . sedna_error() . "\n");
			   		}

	    }

	    else
	    {
			    $user = $xml->createElement('contacts');
			    $user->setAttribute("id", $user_id);
			    $user = $xml->appendChild($user);
			    $user_contact = $xml->createElement('contact');
			    $user_contact->setAttribute('id', $alias);
			    $user_contact = $user->appendChild($user_contact);
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
			       $user_info = $user_info . $xml->saveXML($node);
			      
			   }
			    /*adding user into users document. look at the sql*/
		    	 $query = 'UPDATE insert ' . $user_info . ' into doc("contactDir")';

		    	/*execute the sql stateuemt to add the user into users*/
			    if (!sedna_execute($query)) {
			      die('Could not add the user\'s contact : ' . sedna_error() . "\n");
		   		}
		   	}

   		unset($_POST);
    	$status = "<div class='alert alert-success'> Contact Successfully Stored in database </div> ";
  	}

?>