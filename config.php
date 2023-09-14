
<?php
    // Create the videodb if is not exist and connect with it.
    try{
        // test if the videodb database is exist  
        // and test if videos table is exist in videodb database
        $dbname = 'videodb';
        $pdo = new PDO("mysql:host=localhost;dbname=$dbname","root","");
        $query = $pdo->prepare("SHOW TABLES");
        $query->execute();
    }
    catch (PDOException $e){
        // create the videodb database and a table videos
        // if they not exist
        $dbname = 'mysql';
        $pdo = new PDO("mysql:host=localhost;dbname=$dbname","root","");
        $query = $pdo->prepare("CREATE DATABASE videodb;");
        $query->execute();
        $query = $pdo->prepare("USE videodb;");
        $query->execute();
        $query = $pdo->prepare("CREATE TABLE videos(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            location VARCHAR(255),
            title VARCHAR(50) NOT NULL UNIQUE,
            subject VARCHAR(100) 
        );");
        $query->execute();
    }

?>