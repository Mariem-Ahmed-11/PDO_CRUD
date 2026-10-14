<?php
include "./config.php";
$id=$_GET["id"];
$stmt=$pdo->prepare("SELECT image FROM students WHERE id =?");
$stmt->execute([$id]);
$student=$stmt->fetch();

if(!empty($student['image'])){
    unlink("uploads/".$student['image']);
}
$stmt=$pdo->prepare("DELETE FROM students WHERE id =?");
$stmt->execute([$id]);
header("Location: index.php");
exit();
?>