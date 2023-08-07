<?php
    include "./crudClass.php";

    // instance
    $view = new Employee();

    if (isset($_GET["id"])){
        // from class
        $row= $view -> viewEmployee($_GET["id"]);
        
    }
    else {
        echo "invalid query";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h3 class="mb-5">Details</h3>

    <table class="table border">
        <thead>
            <tr>
                <th scope="col" class="text-success">Employee ID</th>
                <th scope="col" class="text-success">Name</th>
                <th scope="col" class="text-success">Address</th>
                <th scope="col" class="text-success">City</th>
                <th scope="col" class="text-success">Gender</th>
                <th scope="col" class="text-success">Salary</th>
                <th scope="col" class="text-success">Skills</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $_GET["id"]; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['skills']; ?></td>
            </tr>
        </tbody>
    </table>
    
    <a href="../index.php">Back to Employee List</a>
    </div>

</body>
</html>