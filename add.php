<?php
include 'connect.php';

$task = $_POST['task_name'];

$conn->query("INSERT INTO task (task_name) VALUES ('$task')");

header("Location: index.php");
?>