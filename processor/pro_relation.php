<?php
// sedna_execute('drop document "Relations"');
if(!sedna_execute('doc("Relations")')){
    sedna_load('<Relations></Relations>', 'Relations');
    echo ('<div class="alert alert-warning">Could not execute query: ' . sedna_error() . "</div>");
}else{
	/*echo "<pre>";
	var_dump(sedna_result_array());
	echo "</pre>";*/
}

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
    	$relation_xml = 'UPDATE insert <relation>'.$relation.'</relation> into doc("Relations")';
		if (!sedna_execute($relation_xml)) {
			die('Could not add the user\'s information : ' . sedna_error() . "\n");
	    }

		unset($_POST['newRel']);
		$status = "<div class='alert alert-success'> $relation added succesfull </div> ";

	}//end of xml validation
}
?>