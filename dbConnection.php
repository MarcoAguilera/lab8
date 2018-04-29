<?php   
    function connectDB($dbName){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lab8"; 
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       return $dbConn; 
    }
    
?>