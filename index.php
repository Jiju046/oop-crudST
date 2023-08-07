<?php 
  include "./include/crudClass.php";
    
  // creating instance
  $employee = new Employee();
  $data = $employee -> viewHome();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

  <!-- employee table -->
  <div class="container">
    <h3 class="my-5">Employees Details<a href="./include/create.php" class="btn btn-success fw-bold float-end" >+ Add New Employee</a></h3>
    <table class="table table-striped my-4 border">
      <thead>
        <tr>
          <th scope="col" class="text-success">#</th>
          <th scope="col" class="text-success">Name</th>
          <th scope="col" class="text-success">Address</th>
          <th scope="col" class="text-success">City</th>
          <th scope="col" class="text-success">Gender</th>
          <th scope="col" class="text-success">Salary</th>
          <th scope="col" class="text-success">Skills</th>
          <th scope="col" class="text-success">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- to insert row dynamically -->
        <?php

          if (!empty($data)) {
            $count = 1;
            foreach ($data as $row) {
          ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <?php
                    $fieldsToDisplay = ["name", "address", "city", "gender", "salary", "skills"];

                    foreach ($fieldsToDisplay as $field) {
                    ?>
                        <td><?php echo $row[$field]; ?></td>
                    <?php
                    }
                    ?>
                    <td>
                        <a class="text-success" href='./include/view.php?id=<?php echo $row["id"]; ?>'><i class='bi bi-eye-fill'></i></a>  
                        <a class="text-success" href='./include/update.php?id=<?php echo $row["id"]; ?>'><i class='bi bi-pencil-fill'></i></a>  
                        <a class="text-danger" href="#" onclick="handleClick('<?php echo $row['id']; ?>')"><i class='bi bi-trash-fill'></i></a>
                    </td>
                </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='8'>No Employees Found!</td></tr>";
          }
          ?>
      </tbody>
    </table>  
</div>

    <script>
      // script to view confirm before deleting
      function handleClick(id){
        if (confirm('Proceed to delete?')) {
          window.location = './include/delete.php?id='+ id;
        }
      }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>