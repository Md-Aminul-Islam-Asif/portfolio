<?php
session_start();
include 'db.php';

$error = "";

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass  = $_POST['password'];

  $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $user = mysqli_fetch_assoc($res);

  if ($user && password_verify($pass, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['user'] = $user['email'];
    header("Location: index.php");
    exit();
  } else {
    $error = "Invalid email or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>

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
    Login
  </h2>

  <?php if($error): ?>
    <div id="toast"
         class="alert alert-error mb-4 transition-all duration-500">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form method="post" class="space-y-4">

    <input type="email" name="email"
      placeholder="Email"
      class="input input-bordered w-full" required>

    <input type="password" name="password"
      placeholder="Password"
      class="input input-bordered w-full" required>

    <button name="login"
      class="btn btn-neutral w-full transition transform
             hover:-translate-y-1 hover:scale-[1.02]
             active:scale-95 duration-200">

      <i class="fa-solid fa-right-to-bracket mr-2"></i>
      Login
    </button>

  </form>

  <div class="text-sm text-center mt-6 space-y-2">
    <a href="forgot_password.php" class="link">Forgot Password?</a><br>
    <a href="register.php" class="link">Create an account</a>
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
