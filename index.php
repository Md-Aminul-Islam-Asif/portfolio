<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Portfolio</title>

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
      animation: fadeIn 0.9s ease-out both;
    }
  </style>
</head>

<body class="bg-base-200 text-base-content">

<!-- NAVBAR -->
<?php include 'navbar.php'; ?>

<!-- ================= HERO SECTION ================= -->
<section class="container mx-auto px-6 md:px-12 py-24
                grid grid-cols-1 md:grid-cols-2 gap-12 items-center
                animate-fade-in">

  <!-- LEFT TEXT -->
  <div>

    <p class="uppercase text-sm tracking-widest text-base-content/60 mb-3">
      My Portfolio
    </p>

    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
      Hi, I'm <br>
      <span class="text-primary">Aminul Islam</span>
    </h1>

    <h2 class="text-xl md:text-2xl font-semibold text-base-content/80 mb-6">
      Computer Science & Engineering Student
    </h2>

    <p class="text-base-content/70 text-base md:text-lg mb-8 max-w-xl">
      I build clean, functional, and responsive web applications using modern
      technologies. Frontend Developer • UI Designer • Tech Enthusiast
    </p>

    <div class="flex gap-4 flex-wrap">

      <a href="projects.php"
         class="btn btn-outline rounded-full transition transform
                hover:-translate-y-1 hover:scale-[1.02]
                active:scale-95 duration-200">

        <i class="fa-solid fa-folder mr-2"></i>
        View Work
      </a>

      <a href="contact.php"
         class="btn btn-primary rounded-full transition transform
                hover:-translate-y-1 hover:scale-[1.02]
                active:scale-95 duration-200">

        <i class="fa-solid fa-envelope mr-2"></i>
        Contact Me
      </a>

    </div>
  </div>

  <!-- RIGHT IMAGE (FIXED) -->
  <div class="flex justify-center md:justify-end">
    <div class="avatar">
      <div class="w-64 md:w-80 rounded-full
                  ring ring-primary ring-offset-base-100 ring-offset-4
                  shadow-xl overflow-hidden
                  transition duration-300 hover:scale-105">
        <img
          src="assets/img/aminul.png"
          alt="Aminul Islam Asif"
          class="w-full h-full object-cover">
      </div>
    </div>
  </div>

</section>

<!-- ================= QUICK LINKS ================= -->
<section class="container mx-auto px-6 md:px-12 pb-24">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <a href="projects.php"
       class="card bg-base-100 shadow transition transform
              hover:-translate-y-1 hover:shadow-xl duration-300">
      <div class="card-body">
        <h3 class="card-title">
          <i class="fa-solid fa-code"></i> Projects
        </h3>
        <p>See all my development work</p>
      </div>
    </a>

    <a href="dashboard.php"
       class="card bg-base-100 shadow transition transform
              hover:-translate-y-1 hover:shadow-xl duration-300">
      <div class="card-body">
        <h3 class="card-title">
          <i class="fa-solid fa-chart-line"></i> Dashboard
        </h3>
        <p>Manage portfolio content</p>
      </div>
    </a>

    <a href="logout.php"
       class="card bg-base-100 shadow transition transform
              hover:-translate-y-1 hover:shadow-xl duration-300">
      <div class="card-body">
        <h3 class="card-title text-error">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </h3>
        <p>Sign out safely</p>
      </div>
    </a>

  </div>
</section>

<!-- FOOTER -->
<?php include 'footer.php'; ?>

</body>
</html>
