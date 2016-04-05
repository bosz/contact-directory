<?php

if(isset($_POST['newRel']))
{
	$relation = $_POST['relName'];
	$filename = '../xdata/relation.xml';
  	$filename = realpath($filename);


	$xml = simplexml_load_file($filename);
	$xml = new SimpleXMLElement($xml->asXML());	
	$relations = $xml;
	$relation = $relations->addChild("relation", $relation);

	$xml->asXML($filename);
}
?>