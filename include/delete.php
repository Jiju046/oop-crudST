<?php
    include "./crudClass.php";
    // instance
    $delete = new Employee();

    if (isset($_GET["id"])) {
        // from class
        $delete -> deleteEmployee($_GET["id"]);
        header("Location: ../index.php");
        
    } else {
        echo "Invalid request";
    }
?>
