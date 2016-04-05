<?php

if(isset($_POST['newRel']))
{
	$relation = $_POST['relName'];

	$relation_xml = '<Relations><relation>'.$relation.'</relation></Relations>';
    $xml = new DOMDocument(); 
    $xml->loadXML($relation_xml);
    /*validate input*/
    if (@(!$xml->schemaValidate('xdata/relation.xsd'))) {

      $status = '<div class="alert alert-warning">Invalid relation name, relation shoudl be between 3 and 100 letters</div>';

    }else{

		$filename = 'xdata/relation.xml';
	  	$filename = realpath($filename);


		$xml = simplexml_load_file($filename);
		$xml = new SimpleXMLElement($xml->asXML());	
		$relations = $xml;
		$relation = $relations->addChild("relation", $relation);

		$xml->asXML($filename);
		unset($_POST['newRel']);
		$status = "<div class='alert alert-success'> Relation added succesfull </div> ";

	}//end of xml validation
}
?>