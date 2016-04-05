<?php

if(isset($_POST['new'])){

	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$alias = $_POST['alias'];
	$email = $_POST['email'];
	$skype = $_POST['skype_id'];
	$relation = $_POST['relation'];
	$note = $_POST['note'];
	$phone = $_POST['phone'];


	$filename = 'contacts.xml';
  	$filename = realpath($filename);


	$xml = simplexml_load_file($filename);
	$xml = new SimpleXMLElement($xml->asXML());	

	//$itemsNode = $xml;

	//adding new record

	$i = 0;
	$user_id = $_SESSION['email'];


	if($xml->children())
	{
		
		foreach ($xml->children() as $user) {
			# code...
			
			//Finding the contact book for a user to add a contact using the session id
			if($xml->contacts[$i]['id'] == $user_id)
			{

				$contacts = $xml->contacts[$i];

				$contact = $contacts->addChild('contact');
				

				$contact->addChild('name', $fname.' '.$lname);
				$contact->addChild('phone', $phone);
				$contact->addChild('alias', $alias);
				$contact->addChild('email', $email);
				$contact->addChild('skype', $skype);
				$contact->addChild('relation', $relation);
				$contact->addChild('note', $note);
				$found = True;
				break;
			}
			$i = $i + 1;

		}

		//create a new contact book for user if contact book not found
		if(!$found){
			$contacts = $xml;
			$contacts = $contacts->addChild('contacts');
			$contacts->addAttribute('id', $user_id);
			$contact = $contacts->addChild('contact');

			//adding contact elements
			$contact->addChild('name', $fname.' '.$lname);
			$contact->addChild('phone', $phone);
			$contact->addChild('alias', $alias);
			$contact->addChild('email', $email);
			$contact->addChild('skype', $skype);
			$contact->addChild('relation', $relation);
			$contact->addChild('note', $note);
		}
		
	}

	//create new contact book in file
	else
	{
		
		$contacts = $xml;
		$contacts = $contacts->addChild('contacts');
		$contacts->addAttribute('id', $user_id);
		$contact = $contacts->addChild('contact');
		$contact->addChild('name', $fname.' '.$lname);
		$contact->addChild('phone', $phone);
		$contact->addChild('alias', $alias);
		$contact->addChild('email', $email);
		$contact->addChild('skype', $skype);
		$contact->addChild('relation', $relation);
		$contact->addChild('note', $note);
		//adding contact elements
									
	}

	

	
	$xml->asXML($filename);

	unset($_POST['new']);
	$status = "<div class='alert alert-success'> Contact Successfully Added </div> ";

}

?>