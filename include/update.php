<?php
    include "./crudClass.php";
    //instance
    $update = new Employee();

    // show data
    if (isset($_GET['id'])) {
        // from class
        $row = $update -> showUpdate($_GET['id']);
    }

    // update 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // from class
        $result=$update -> updateEmployee($_POST, $_GET);
        
         if ($result) {
            header("Location: ../index.php");
            exit();
        }
        else {
            echo "Error updating record: " . $update -> connection-> error;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <title>Update</title>
</head>
<body>
    <div class="container">
        <h1 class="my-5">Update Records</h1>

        <form method="POST" action="">

            <!-- name -->
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
            </div>

            <!-- Address -->
            <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea type="text" class="form-control" id="address" name="address"><?php echo $row["address"]; ?></textarea>
            </div>

            <!-- city select -->
            <div class="mb-3">
            <label class="form-label" for="city">City</label>
                <select class="form-select" id="city" aria-label="city" name="city">
                    <option value="">Choose City</option>
                    <option value="Coimbatore" <?php if($row["city"] === "Coimbatore") echo "selected"; ?>>Coimbatore</option>
                    <option value="Chennai" <?php if($row["city"] === "Chennai") echo "selected"; ?>>Chennai</option>
                    <option value="Bangalore" <?php if($row["city"] === "Bangalore") echo "selected"; ?>>Bangalore</option>
                </select>
            </div>

            <!-- gender radio -->
            <div class="mb-3">
            <label class="form-label" for="gender">Gender</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($row["gender"] === "Male") echo "checked"; ?>>
                <label class="form-check-label" for="male">Male</label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if($row["gender"] === "Female") echo "checked"; ?>>
                <label class="form-check-label" for="female">Female</label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="others" value="Others" <?php if($row["gender"] === "Others") echo "checked"; ?>>
                <label class="form-check-label" for="others">Others</label>
                </div>
            </div>


            <!-- salary -->
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row["salary"]; ?>" >
            </div>

            <!-- skills -->
            <div class="mb-3">
            <p>Skills</p>
                <input class="form-check-input" name="skill[]" type="checkbox" value="C" id="c" <?php if(in_array('C',explode(", ",$row["skills"]))) echo 'checked'; ?>>
                <label class="form-check-label" for="c">C</label>
                <input class="form-check-input" name="skill[]" type="checkbox" value="C++" id="c++" <?php if(in_array('C++',explode(", ",$row["skills"]))) echo 'checked'; ?>>
                <label class="form-check-label" for="c++">C++</label>
                <input class="form-check-input" name="skill[]" type="checkbox" value="Java" id="java" <?php if(in_array('Java',explode(", ",$row["skills"]))) echo 'checked'; ?>>
                <label class="form-check-label" for="java">Java</label>
            </div>
                        
        
            <button class="btn btn-success">Update</button>
        </form>
        <a href="../index.php">Back to Employee List</a>
    </div>
</body>
</html>