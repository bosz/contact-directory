<?php

	/* Don't print anything. We'll handle errors ... */
	ini_set("sedna.verbosity","0");


		/*Parameters of the database to connect to.
		 The default port is 5050. If Sedna server is listening
		on the different port (say 5051) modify host value like:
		$host = 'localhost:5051' */
		$host      = 'localhost';
		$database  = 'testdb';
		$user      = 'SYSTEM';
		$password  = 'MANAGER';

		/* Try to connect to the testdb on the localhost with default credentials */
		$conn = sedna_connect($host,$database,$user,$password);
		if(!$conn) die('Could not connect: ' . sedna_error() . "\n");

?>