<?php
include "./config.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $class = $_POST["class"];

    $image = $_FILES["image"]["name"];  // Get the name of the uploaded file
    $target = "uploads/" . basename($image);  // Set the target directory for the uploaded file
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);  // Move the uploaded file to the target directory

    // Prepare and execute the SQL statement to insert the student data into the database
    $stm = $pdo->prepare("INSERT INTO `students`( `name`, `age`, `class`, `image`) VALUES (?,?,?,?)");
    $stm->execute([$name, $age, $class, $image]);

    // Redirect to index.php after successful insertion
    header("Location:index.php");
    exit();
}

?>



<div class="container-fluid">
    <form text-align: center;" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="age" placeholder="Age"><br><br>
        <input type="text" name="class" placeholder="Class"><br><br>
        <input type="file" name="image"><br><br>
        <input type="submit" value="Add Student"><br><br>
    </form>
</div>