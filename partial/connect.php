<?php
/****************************************************************************** 
 * File:  01-connect.php
 * 
 * Copyright (C) 2010, Apache License 2.0 
 * The Institute for System Programming of the Russian Academy of Sciences
 *  
 * This is an example application that works with Sedna XML DBMS through 
 * PHP API using sedna module. The application opens a session to the "testdb"
 * database and closes the session.
 *
 * Note! Before running this example make sure that Sedna server is running on
 * localhost:5050 and 'testdb' database is started:
 *
 * se_gov
 * se_cdb testdb
 * se_sm testdb
 *****************************************************************************/
 
/* Don't print anything. We'll handle errors ... */
ini_set("sedna.verbosity","0");

/* Parameters of the database to connect to.
 * The default port is 5050. If Sedna server is listening
 * on the different port (say 5051) modify host value like:
 * $host = 'localhost:5051' */
$host      = 'localhost';
$database  = 'contact';
$user      = 'SYSTEM';
$password  = 'MANAGER';

/* Try to connect to the testdb on the localhost with default credentials */
$conn = sedna_connect($host,$database,$user,$password);

if(!$conn) 
    die('Could not connect: ' . sedna_error() . "\n");

/* // Properly close the connection 
if(!sedna_close($conn)) 
    die('Could not close connection:' . sedna_error() . "\n");
	
 // Just print OK if we opened and closed session successfully 
echo "OK connection done\n";*/
?>