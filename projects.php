<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projects | Portfolio</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.18/dist/full.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-base-200 text-base-content">

<?php include 'navbar.php'; ?>

<!-- HEADER -->
<section class="container mx-auto px-6 md:px-12 pt-20 pb-12">
  <h1 class="text-4xl md:text-5xl font-extrabold mb-4">My Projects</h1>
  <p class="text-base-content/70 max-w-2xl">
    A collection of projects I have built while learning web development.
  </p>
</section>

<section class="container mx-auto px-6 md:px-12 pb-24">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

<?php
/* ================= DB PROJECTS ================= */
$res = mysqli_query($conn,"SELECT * FROM projects ORDER BY id DESC");

/* 🔗 Manual links for DB projects (SAFE FIX) */
$dbLinks = [
  'Donate Bangladesh' => [
    'live'   => 'https://md-aminul-islam-asif.github.io/assingment-5/',
    'github' => 'https://github.com/Md-Aminul-Islam-Asif/assingment-5'
  ],
  'Rend Company' => [
    'live'   => 'https://md-aminul-islam-asif.github.io/assignment-3/',
    'github' => 'https://github.com/Md-Aminul-Islam-Asif/assignment-3'
  ],
  'Pet Buy Shop' => [
    'live'   => 'https://coruscating-wisp-fa81ac.netlify.app/',
    'github' => '#'
  ]
];

while($row = mysqli_fetch_assoc($res)){
  $title = trim($row['title']);
  $live = $dbLinks[$title]['live'] ?? '#';
  $github = $dbLinks[$title]['github'] ?? '#';
?>
  <div class="bg-base-100 rounded-2xl shadow hover:shadow-xl transition">
    <div class="h-40 bg-base-200 flex items-center justify-center text-3xl">
      <i class="fa-solid fa-code"></i>
    </div>

    <div class="p-6">
      <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($title) ?></h3>

      <p class="text-sm text-base-content/70 mb-4">
        <?= htmlspecialchars($row['description']) ?>
      </p>

      <div class="flex flex-wrap gap-2 mb-4">
        <?php foreach(explode(',',$row['tech']) as $t){ ?>
          <span class="badge badge-outline"><?= trim($t) ?></span>
        <?php } ?>
      </div>

      <div class="flex gap-3">
        <?php if($live !== '#'): ?>
        <a href="<?= $live ?>" target="_blank"
           class="btn btn-sm btn-primary rounded-full">
          <i class="fa-solid fa-eye mr-1"></i> Live
        </a>
        <?php endif; ?>

        <?php if($github !== '#'): ?>
        <a href="<?= $github ?>" target="_blank"
           class="btn btn-sm btn-outline rounded-full">
          <i class="fa-brands fa-github mr-1"></i> GitHub
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php } ?>

<!-- ================= STATIC PROJECTS ================= -->

<!-- Dream 11 BPL -->
<div class="bg-base-100 rounded-2xl shadow hover:shadow-xl transition">
  <div class="h-40 bg-base-200 flex items-center justify-center text-3xl">
    <i class="fa-solid fa-code"></i>
  </div>
  <div class="p-6">
    <h3 class="text-xl font-semibold mb-2">Dream 11 BPL</h3>
    <p class="text-sm text-base-content/70 mb-4">
      Fantasy cricket web app UI built with Tailwind & JavaScript.
    </p>
    <div class="flex gap-2 mb-4">
      <span class="badge badge-outline">HTML</span>
      <span class="badge badge-outline">Tailwind</span>
      <span class="badge badge-outline">JS</span>
    </div>
    <a href="https://magenta-lamington-6dc447.netlify.app/"
       target="_blank"
       class="btn btn-sm btn-primary rounded-full">
      <i class="fa-solid fa-eye mr-1"></i> Live
    </a>
  </div>
</div>

<!-- Gadget Heaven -->
<div class="bg-base-100 rounded-2xl shadow hover:shadow-xl transition">
  <div class="h-40 bg-base-200 flex items-center justify-center text-3xl">
    <i class="fa-solid fa-code"></i>
  </div>
  <div class="p-6">
    <h3 class="text-xl font-semibold mb-2">Gadget Heaven</h3>
    <p class="text-sm text-base-content/70 mb-4">
      Modern gadget store UI with clean layout & animations.
    </p>
    <div class="flex gap-2 mb-4">
      <span class="badge badge-outline">HTML</span>
      <span class="badge badge-outline">CSS</span>
      <span class="badge badge-outline">JS</span>
    </div>
    <a href="https://superlative-croissant-64e95d.netlify.app/"
       target="_blank"
       class="btn btn-sm btn-primary rounded-full">
      <i class="fa-solid fa-eye mr-1"></i> Live
    </a>
  </div>
</div>

  </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
