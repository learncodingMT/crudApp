<?php
include "connection.php";

$id = $_GET['deleteid'];

$sql = "Delete from teacher where ID = $id";

$result = $conn->prepare($sql);

if($result->execute()){
    header('location: displayInfo.php');
}else{
    echo "Error Occured";
}


?>