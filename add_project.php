<?php
include 'db.php';

if (
  !isset($_POST['title']) ||
  !isset($_POST['tech']) ||
  !isset($_POST['description'])
) {
  header("Location: dashboard.php?msg=Invalid request");
  exit();
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$tech  = mysqli_real_escape_string($conn, $_POST['tech']);
$desc  = mysqli_real_escape_string($conn, $_POST['description']);

// ✅ New project = NOT protected
$query = "INSERT INTO projects (title, description, tech, is_protected)
          VALUES ('$title', '$desc', '$tech', 0)";

if (mysqli_query($conn, $query)) {
  header("Location: dashboard.php?msg=Project added successfully");
} else {
  header("Location: dashboard.php?msg=Failed to add project");
}
exit();
