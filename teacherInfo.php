<?php
include "connection.php";


if(isset($_REQUEST['submit'])){
    if(($_REQUEST['name']=="") || ($_REQUEST['age']=="") || ($_REQUEST['mobile']=="") || ($_REQUEST['subname']=="")){
        echo "<small>Fill all Fields... </small>";
    }else{
        try{
          // Query for inserting the data into database
        $sql = "INSERT INTO teacher (Name, Age, phone, sub_name) VALUES (:name, :age, :mobile, :subname)";
           
        $result = $conn->prepare($sql);

        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':age', $age, PDO::PARAM_INT);
        $result->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $result->bindParam(':subname', $subname, PDO::PARAM_STR);
   
        $name = $_REQUEST['name'];
        $age = $_REQUEST['age'];
        $mobile = $_REQUEST['mobile'];
        $subname = $_REQUEST['subname'];
           
        $result->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        header('location: displayInfo.php');
        exit;

        // end
        // echo $result->rowCount();
        }catch(PDOException $e){
          echo $e->getMessage()."<br/>";
          die("Error 404 found");
        }  
        
        
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud App</title>
</head>

<body>
    <div class="container my-4 col-sm-6">
        <form method="POST">
            <div class="mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" autocomplete="off" minlength="10" maxlength="10"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subname" class="form-control" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>