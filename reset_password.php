<?php
include 'db.php';

$token = $_GET['token'] ?? '';
$msg = "";
$type = "info";

// 🔐 Token validity check
$now = date("Y-m-d H:i:s");
$res = mysqli_query($conn,
  "SELECT * FROM users 
   WHERE reset_token='$token' 
   AND token_expire > '$now'"
);

if(mysqli_num_rows($res) == 0){
  die("Invalid or expired reset link.");
}

// 🔄 Reset password
if(isset($_POST['reset'])){
  $newpass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  mysqli_query($conn,
    "UPDATE users SET 
      password='$newpass',
      reset_token=NULL,
      token_expire=NULL
     WHERE reset_token='$token'"
  );

  $msg = "Password updated successfully. You can login now.";
  $type = "success";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.18/dist/full.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-base-200 flex items-center justify-center min-h-screen">

<div class="bg-base-100 shadow-xl rounded-2xl p-8 w-full max-w-md">

  <h2 class="text-3xl font-extrabold mb-6 text-center">
    Reset Password
  </h2>

  <?php if($msg): ?>
    <div id="toast"
         class="alert alert-<?= $type ?> mb-4 transition-all duration-500">
      <?= htmlspecialchars($msg) ?>
    </div>
  <?php endif; ?>

  <?php if(!$msg): ?>
  <form method="post" class="space-y-4">

    <input type="password" name="password"
      placeholder="Enter new password"
      class="input input-bordered w-full" required>

    <button name="reset"
      class="btn btn-neutral w-full transition transform
             hover:-translate-y-1 hover:scale-[1.02]
             active:scale-95 duration-200">

      <i class="fa-solid fa-key mr-2"></i>
      Reset Password
    </button>

  </form>
  <?php else: ?>
    <div class="text-center mt-6">
      <a href="login.php"
         class="btn btn-outline transition transform
                hover:-translate-y-1 hover:scale-[1.02]
                active:scale-95 duration-200">
        Go to Login
      </a>
    </div>
  <?php endif; ?>

</div>

<!-- 🔔 Toast Auto Hide -->
<script>
  const toast = document.getElementById("toast");
  if (toast) {
    setTimeout(() => {
      toast.classList.add("opacity-0", "translate-y-2");
      setTimeout(() => toast.remove(), 500);
    }, 3500);
  }
</script>

</body>
</html>
