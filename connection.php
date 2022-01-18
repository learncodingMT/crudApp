<?php
$dsn = "mysql:host=localhost;dbname=crudapp";
$db_user = "root";
$db_password = "";

try{
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successfully";
}
catch(PDOException $e){
    echo $e->getMessage()."<br/>";
    die("Error 404 found");
}


?>