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
  <title>About | Portfolio</title>

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
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fadeIn 0.8s ease-out both;
    }
  </style>
</head>

<body class="bg-base-200 text-base-content">

<?php include 'navbar.php'; ?>

<!-- ABOUT SECTION -->
<section class="container mx-auto px-6 md:px-12 pt-20 pb-24 animate-fade-in">

  <!-- TOP GRID -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center mb-16">

    <!-- LEFT TEXT -->
    <div class="md:col-span-2">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-6">About Me</h1>

      <p class="text-base-content/80 mb-4 leading-relaxed">
        I am a Computer Science & Engineering student passionate about web and app
        development, software engineering, and emerging technologies.
      </p>

      <p class="text-base-content/80 leading-relaxed">
        I enjoy building clean, functional, and responsive applications while
        continuously learning new tools, frameworks, and problem-solving skills.
      </p>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="flex justify-center">
      <div class="avatar">
        <div class="w-56 rounded-full ring ring-primary ring-offset-base-100 ring-offset-4 shadow-xl">
          <img src="assets/img/aminul.png" alt="Aminul Islam Asif">
        </div>
      </div>
    </div>

  </div>

  <!-- SKILLS -->
  <div class="mb-16">

    <h3 class="text-xl font-bold mb-4">⚙️ Programming Languages</h3>
    <div class="flex flex-wrap gap-3 mb-8">
      <span class="badge badge-outline badge-success">C</span>
      <span class="badge badge-outline badge-success">C++</span>
      <span class="badge badge-outline badge-error">Java</span>
      <span class="badge badge-outline badge-info">Python</span>
      <span class="badge badge-outline badge-warning">JavaScript</span>
      <span class="badge badge-outline badge-neutral">R</span>
      <span class="badge badge-outline badge-neutral">MATLAB</span>
    </div>

    <h3 class="text-xl font-bold mb-4">🌐 Web & App Technologies</h3>
    <div class="flex flex-wrap gap-3 mb-8">
      <span class="badge badge-outline badge-primary">HTML5</span>
      <span class="badge badge-outline badge-secondary">CSS3</span>
      <span class="badge badge-outline badge-accent">Tailwind CSS</span>
      <span class="badge badge-outline badge-info">DaisyUI</span>
      <span class="badge badge-outline badge-warning">Bootstrap</span>
      <span class="badge badge-outline badge-info">React</span>
      <span class="badge badge-outline badge-secondary">React Native</span>
      <span class="badge badge-outline badge-warning">Node.js</span>
    </div>

    <h3 class="text-xl font-bold mb-4">🛠 Tools & Cloud</h3>
    <div class="flex flex-wrap gap-3">
      <span class="badge badge-outline badge-success">MySQL</span>
      <span class="badge badge-outline badge-accent">Firebase</span>
      <span class="badge badge-outline badge-info">Google Cloud</span>
      <span class="badge badge-outline badge-neutral">GitHub</span>
      <span class="badge badge-outline badge-warning">Notion</span>
    </div>

  </div>

  <!-- 📄 RESUME & RESEARCH -->
  <div class="mb-20">
    <h2 class="text-3xl font-bold mb-4">📄 Resume & Research</h2>

    <p class="text-base-content/70 mb-6 max-w-xl">
      Download my resume and explore my academic research work.
    </p>

    <div class="flex flex-wrap gap-4">

      <!-- CV -->
      <a href="assets/files/CV.aminul.pdf"
         download
         class="btn btn-primary rounded-full transition transform
                hover:-translate-y-1 hover:scale-[1.02]
                active:scale-95">
        <i class="fa-solid fa-file-arrow-down mr-2"></i>
        Download CV
      </a>

      <!-- Research -->
      <a href="assets/files/Research_Paper.pdf"
         target="_blank"
         class="btn btn-outline rounded-full transition transform
                hover:-translate-y-1 hover:scale-[1.02]
                active:scale-95">
        <i class="fa-solid fa-book-open mr-2"></i>
        Research Paper
      </a>

    </div>
  </div>

  <!-- EDUCATION -->
  <h2 class="text-3xl font-bold mb-8">🎓 Education</h2>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="card bg-base-100 shadow-xl">
      <figure class="px-6 pt-6 flex items-center justify-center">
        <img src="assets/img/versity.png" class="h-32 w-full object-contain">
      </figure>
      <div class="card-body">
        <h3 class="card-title">Southeast University</h3>
        <p class="font-semibold">B.Sc. in Computer Science & Engineering</p>
        <p class="text-sm text-base-content/70">2023 – Present</p>
      </div>
    </div>

    <div class="card bg-base-100 shadow-xl">
      <figure class="px-6 pt-6 flex items-center justify-center">
        <img src="assets/img/collage.png" class="h-32 w-full object-contain">
      </figure>
      <div class="card-body">
        <h3 class="card-title">Ideal College</h3>
        <p class="font-semibold">HSC – Science</p>
        <p class="text-sm text-base-content/70">2019 – 2021</p>
      </div>
    </div>

    <div class="card bg-base-100 shadow-xl">
      <figure class="px-6 pt-6 flex items-center justify-center">
        <img src="assets/img/school.png" class="h-32 w-full object-contain">
      </figure>
      <div class="card-body">
        <h3 class="card-title">Nawabpur Government High School</h3>
        <p class="font-semibold">SSC – Science</p>
        <p class="text-sm text-base-content/70">2011 – 2019</p>
      </div>
    </div>

  </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>
