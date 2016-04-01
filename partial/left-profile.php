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
	$xml->load('data/user.xml');

	// Load XSL file
	$xsl = new DOMDocument;
	$xsl->load('xdata/profile.xslt');

	// Configure the transformer
	$proc = new XSLTProcessor;

	// Attach the xsl rules
	$proc->importStyleSheet($xsl);

	echo $proc->transformToXML($xml);

?>