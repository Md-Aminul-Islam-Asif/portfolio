<?php
include 'db.php';
$msg = "";
$type = "info"; // info | success | error

if(isset($_POST['register'])){
  $email = $_POST['email'];
  $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($check) > 0){
    $msg = "Email already registered";
    $type = "error";
  } else {
    mysqli_query($conn,"INSERT INTO users(email,password)
    VALUES('$email','$pass')");
    $msg = "Registration successful. You can login now.";
    $type = "success";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>

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
    Create Account
  </h2>

  <?php if($msg): ?>
    <div id="toast"
         class="alert alert-<?= $type ?> mb-4 transition-all duration-500">
      <?= htmlspecialchars($msg) ?>
    </div>
  <?php endif; ?>

  <form method="post" class="space-y-4">

    <input type="email" name="email"
      placeholder="Email"
      class="input input-bordered w-full" required>

    <input type="password" name="password"
      placeholder="Password"
      class="input input-bordered w-full" required>

    <button name="register"
      class="btn btn-neutral w-full transition transform
             hover:-translate-y-1 hover:scale-[1.02]
             active:scale-95 duration-200">

      <i class="fa-solid fa-user-plus mr-2"></i>
      Register
    </button>

  </form>

  <div class="text-sm text-center mt-6">
    <a href="login.php" class="link">
      Already have an account? Login
    </a>
  </div>

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
