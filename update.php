<?php
include 'connect.php';

$id = $_GET['id'];

// ✅ Status Update (Complete / Pending)
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $conn->query("UPDATE task SET status='$status' WHERE id=$id");
    header("Location: index.php");
    exit();
}

// ✅ Fetch task for editing
if (isset($_GET['edit'])) {
    $result = $conn->query("SELECT * FROM task WHERE id=$id");
    $task = $result->fetch_assoc();
}

// ✅ Save updated task
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTask = $_POST['task_name'];
    $conn->query("UPDATE task SET task_name='$newTask' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .edit-box {
            width: 350px;
            margin: 80px auto;
            padding: 25px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 12px;
            text-align: center;
        }

        .edit-box h3 {
            margin-bottom: 15px;
        }

        .edit-box input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .edit-box button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        .edit-box button:hover {
            background: #0056b3;
        }

        .back-btn {
            display: inline-block;
            margin-top: 10px;
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php if (isset($task)) { ?>

<div class="edit-box">
    <h3>✏️ Edit Task</h3>

    <form method="POST">
        <input type="text" name="task_name" value="<?= $task['task_name'] ?>" required>
        <button type="submit">Update Task</button>
    </form>

    <a class="back-btn" href="index.php">← Back</a>
</div>

<?php } ?>

</body>
</html>