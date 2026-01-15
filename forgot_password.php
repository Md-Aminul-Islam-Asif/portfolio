<?php
include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$msg = "";
$type = "info"; // success | error

if(isset($_POST['send'])){
  $email = $_POST['email'];

  $res = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($res) > 0){

    $token = bin2hex(random_bytes(16));
    $expire = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    mysqli_query($conn,"UPDATE users SET 
      reset_token='$token',
      token_expire='$expire'
      WHERE email='$email'");

    $resetLink = "http://localhost/portfolio/reset_password.php?token=$token";

    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'aminulasif20@gmail.com';   // your gmail
      $mail->Password = 'pozr nvxy fqnt acei';      // app password
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('aminulasif20@gmail.com', 'Portfolio App');
      $mail->addAddress($email);

      $mail->isHTML(true);
      $mail->Subject = 'Password Reset';
      $mail->Body = "
        <h3>Password Reset</h3>
        <p>Click the link below to reset your password:</p>
        <a href='$resetLink'>$resetLink</a>
        <p>This link will expire in 10 minutes.</p>
      ";

      $mail->send();
      $msg = "Reset email sent successfully. Please check your inbox.";
      $type = "success";

    } catch (Exception $e) {
      $msg = "Mailer Error: " . $mail->ErrorInfo;
      $type = "error";
    }

  } else {
    $msg = "Email not found";
    $type = "error";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>

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
    Forgot Password
  </h2>

  <?php if($msg): ?>
    <div id="toast"
         class="alert alert-<?= $type ?> mb-4 transition-all duration-500">
      <?= htmlspecialchars($msg) ?>
    </div>
  <?php endif; ?>

  <form method="post" class="space-y-4">
    <input type="email" name="email"
      placeholder="Enter your registered email"
      class="input input-bordered w-full" required>

    <button name="send"
      class="btn btn-neutral w-full transition transform
             hover:-translate-y-1 hover:scale-[1.02]
             active:scale-95 duration-200">

      <i class="fa-solid fa-paper-plane mr-2"></i>
      Send Reset Email
    </button>
  </form>

  <div class="text-sm text-center mt-6">
    <a href="login.php" class="link">Back to Login</a>
  </div>

</div>

<!-- 🔔 Toast auto-hide -->
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

