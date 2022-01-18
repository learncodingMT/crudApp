<?php
include "connection.php";

$id = $_GET['updateid'];

$sql = "Select * from teacher where ID = $id";
$result = $conn->prepare($sql);

$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

if(isset($_REQUEST['submit'])){ 
    if(($_REQUEST['name']=="") || ($_REQUEST['age']=="") || ($_REQUEST['mobile']=="") || ($_REQUEST['subname']=="")){
        echo "<small>Fill all Fields... </small>";
    }else{
           
        $sql = "UPDATE teacher SET Name= :name, Age= :age, phone= :mobile, sub_name= :subname
        WHERE ID=$id";
           
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

        header('location: displayInfo.php');
        exit;

        // echo $result->rowCount();
        
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

    <title>Update Information</title>
</head>

<body>
    <div class="container my-4 col-sm-6">
        <form method="POST">
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" autocomplete="off"
                    value="<?php echo $row['Name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" autocomplete="off"
                    value="<?php echo $row['Age']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" minlength="10" maxlength="10" autocomplete="off"
                    value="<?php echo $row['phone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Subject</label>
                <input type="text" name="subname" class="form-control" autocomplete="off"
                    value="<?php echo $row['sub_name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>

</html>