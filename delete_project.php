<?php
include 'db.php';

if (!isset($_GET['id'])) {
  header("Location: dashboard.php?msg=Invalid request");
  exit();
}

$id = intval($_GET['id']);

// 🔒 Check protection
$res = mysqli_query($conn,
  "SELECT is_protected FROM projects WHERE id=$id"
);

$row = mysqli_fetch_assoc($res);

if ($row && $row['is_protected'] == 0) {
  mysqli_query($conn, "DELETE FROM projects WHERE id=$id");
  header("Location: dashboard.php?msg=Project deleted");
} else {
  header("Location: dashboard.php?msg=This project is protected");
}
exit();
