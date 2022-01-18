<?php
include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4 col-sm-8">
        <a href="teacherInfo.php"><button type="submit" class="btn btn-primary my-4" name="submit">Add User</button></a>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $sql = "Select * from teacher";

    $result = $conn->prepare($sql);

    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      echo " <tr>
      <th>".$row['ID']."</th>
      <td>".$row['Name']."</td>
      <td>".$row['Age']."</td>
      <td>".$row['phone']."</td>
      <td>".$row['sub_name']."</td>
      <td>"."<a href='update.php?updateid=".$row['ID']."'><button type='submit' class='btn btn-primary' name='submit'>Update</button></a>
      <a href='Delete.php?deleteid=".$row['ID']."'><button type='submit' class='btn btn-danger' name='submit'>Delete</button></a>"."</td>
    </tr>";
    }

    ?>
            </tbody>
        </table>
    </div>
</body>

</html>