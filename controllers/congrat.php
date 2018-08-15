<?php 
include_once('db.php');
$name = $_POST['user'];
$score = $_POST['score'];
$rst = mysqli_query($conn, "INSERT INTO candyresult (user_id, score)
VALUES ('$name','$score')") or die(mysqli_error($conn));

unset($_SESSION['candId']);

?>