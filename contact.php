<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}

// toast flags
$success = isset($_GET['success']);
$error   = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact | Portfolio</title>

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
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fadeIn 0.8s ease-out both;
    }
  </style>
</head>

<body class="bg-base-200 text-base-content">

<!-- NAVBAR -->
<?php include 'navbar.php'; ?>

<section class="container mx-auto px-6 md:px-12 pt-20 pb-24 animate-fade-in">

  <h1 class="text-4xl md:text-5xl font-extrabold mb-6">
    Contact Me
  </h1>

  <p class="text-base-content/70 max-w-xl mb-12">
    Feel free to reach out for collaboration, project discussions,
    or any opportunities.
  </p>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

    <!-- CONTACT INFO -->
    <div class="space-y-6 text-lg">

      <a href="mailto:aminulasif20@gmail.com"
         target="_blank"
         class="flex items-center gap-3 hover:translate-x-1 transition">
        <i class="fa-solid fa-envelope"></i>
        <span class="hover:underline">
          aminulasif20@gmail.com
        </span>
      </a>

      <a href="https://github.com/Md-Aminul-Islam-Asif"
         target="_blank"
         rel="noopener"
         class="flex items-center gap-3 hover:translate-x-1 transition">
        <i class="fa-brands fa-github"></i>
        <span class="hover:underline">
          github.com/Md-Aminul-Islam-Asif
        </span>
      </a>

      <a href="https://www.linkedin.com/in/aminul-asif/"
         target="_blank"
         rel="noopener"
         class="flex items-center gap-3 hover:translate-x-1 transition">
        <i class="fa-brands fa-linkedin"></i>
        <span class="hover:underline">
          linkedin.com/in/aminul-asif
        </span>
      </a>

    </div>

    <!-- FEEDBACK FORM -->
    <div class="bg-base-100 rounded-2xl shadow-xl p-8
                transition transform hover:-translate-y-1 duration-300">

      <!-- FEEDBACK HEADING -->
      <h3 class="text-2xl font-bold mb-2">
        Send Feedback
      </h3>

      <p class="text-base-content/70 mb-6">
        Have a question or feedback? Send me a message directly.
      </p>

      <!-- TOAST -->
      <?php if($success): ?>
        <div class="alert alert-success mb-6 animate-fade-in">
          <i class="fa-solid fa-check"></i>
          Message sent successfully!
        </div>
      <?php endif; ?>

      <?php if($error): ?>
        <div class="alert alert-error mb-6 animate-fade-in">
          Failed to send message. Please try again.
        </div>
      <?php endif; ?>

      <form method="post" action="send_feedback.php" class="space-y-4">

        <input type="text" name="name"
               placeholder="Your Name"
               class="input input-bordered w-full" required>

        <input type="email" name="email"
               placeholder="Your Email"
               class="input input-bordered w-full" required>

        <textarea name="message"
                  placeholder="Your Message"
                  class="textarea textarea-bordered w-full"
                  rows="4" required></textarea>

        <button name="send"
                class="btn btn-neutral w-full transition transform
                       hover:-translate-y-1 hover:scale-[1.02]
                       active:scale-95 duration-200">
          <i class="fa-solid fa-paper-plane mr-2"></i>
          Send Message
        </button>

      </form>

    </div>

  </div>

</section>

<!-- FOOTER -->
<?php include 'footer.php'; ?>

</body>
</html>

