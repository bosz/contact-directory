<!-- <div>
	<div class="img-thumbnail">
		<img src="img/default_user.png" >
	</div>
	<h4>User Name ( <small>n contacts</small> ) </h4>
</div> -->

<?php

	// Load XML file from sedna database
	/*if(!sedna_execute('for $user in doc("user")'))
    	die('Could not execute query: <br /> ' . sedna_error() . "\n");*/

	$xml = new DOMDocument;
	 $query = 'doc("users")//user[@email="'.$_SESSION['email'].'"]';
    sedna_execute($query);
    $data = sedna_result_array();
    // echo "<pre>"; var_dump($data); die();
    $data = $data[0];
	$xml->loadXML($data);

	// Load XSL file
	$xsl = new DOMDocument;
	$xsl->load('xdata/profile.xslt');

	// Configure the transformer
	$proc = new XSLTProcessor;

	// Attach the xsl rules
	$proc->importStyleSheet($xsl);

	echo $proc->transformToXML($xml);

?>