<?php

class DB_CONNECT {
 
    // Constructor
    function __construct() {
        // Trying to connect to the database
        $this->connect();
    }
 
    // Destructor
    function __destruct() {
        // Closing the connection to database
        $this->close();
    }
 
   // Function to connect to the database
    function connect() {

        //importing dbconfig.php file which contains database credentials 
        $filepath = realpath (dirname(__FILE__));

        require_once($filepath."/dbconfig.php");
        
		// Connecting to mysql (phpmyadmin) database
        $con =  new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysql_error());
       
        
        // returing connection cursor
        return $con;
    }
 
	// Function to close the database
    function close() {
        // Closing data base connection
        mysql_close();
    }
 
}
 
?>