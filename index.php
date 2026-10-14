<?php
include "./config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="./create.php" class="btn btn-primary mb-3">Add Student</a>
        <div class="table-responsive ">

            <table
                class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Class</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $stm = $pdo->query("SELECT * FROM `students`");
                    while ($row = $stm->fetch()) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['age']; ?></td>
                            <td><?= $row['class']; ?></td>
                            <td><img src="uploads/<?= $row['image']; ?>" width="100"></td>
                            <td>
                                <a href="./delete.php?id=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    <?php }
                    ?>


                </tbody>
            </table>
        </div>

    </div>

</body>

</html>