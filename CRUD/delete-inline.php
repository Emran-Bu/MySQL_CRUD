<?php

$conn = mysqli_connect("localhost", "root", "", "crud2") or die("Connection Failed");

$stu_id = $_GET['id'];

$sql = "DELETE  FROM student WHERE sid = {$stu_id}";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

header("location: http://localhost/CRUD/index.php");

mysqli_close($conn);

?>