<?php
include 'connect.php';

$id = $_GET['id'];

$conn->query("DELETE FROM task WHERE id=$id");

header("Location: index.php");
?>