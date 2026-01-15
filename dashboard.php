<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}
include 'db.php';

// Toast message
$msg = $_GET['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard | Backend</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.18/dist/full.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-base-200 text-base-content">

<?php include 'navbar.php'; ?>

<div class="container mx-auto px-6 md:px-12 pt-16 pb-24">

  <!-- Header -->
  <div class="mb-10">
    <h1 class="text-4xl font-extrabold">Backend Dashboard</h1>
    <p class="text-base-content/60">Manage portfolio content</p>
  </div>

  <!-- Toast -->
  <?php if($msg): ?>
  <div id="toast"
       class="alert alert-success mb-8 shadow transition-all duration-500">
    <i class="fa-solid fa-check"></i>
    <span><?= htmlspecialchars($msg) ?></span>
  </div>
  <?php endif; ?>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

    <!-- Add Project -->
    <div class="card bg-base-100 shadow transition transform hover:-translate-y-1 duration-300">
      <div class="card-body">
        <h2 class="card-title">
          <i class="fa-solid fa-plus"></i> Add Project
        </h2>

        <form method="post" action="add_project.php" class="space-y-4">

          <input type="text" name="title"
            placeholder="Project title"
            class="input input-bordered w-full" required>

          <input type="text" name="tech"
            placeholder="Tech (HTML, CSS, JS)"
            class="input input-bordered w-full" required>

          <textarea name="description"
            placeholder="Short description"
            class="textarea textarea-bordered w-full" required></textarea>

          <button
            class="btn btn-primary w-full transition transform
                   hover:-translate-y-1 hover:scale-[1.02]
                   active:scale-95 duration-200">
            <i class="fa-solid fa-floppy-disk mr-2"></i>
            Save Project
          </button>
        </form>
      </div>
    </div>

    <!-- Project List -->
    <div class="card bg-base-100 shadow">
      <div class="card-body">
        <h2 class="card-title">
          <i class="fa-solid fa-folder-open"></i> Projects
        </h2>

        <?php
        $res = mysqli_query($conn,"SELECT * FROM projects ORDER BY id DESC");

        if(mysqli_num_rows($res)==0){
          echo "<p class='text-base-content/60'>No projects yet.</p>";
        }

        while($row = mysqli_fetch_assoc($res)){
        ?>
        <div class="flex justify-between items-center border rounded-lg p-4 mb-3
                    hover:bg-base-200 transition">

          <div>
            <p class="font-semibold">
              <?= htmlspecialchars($row['title']) ?>
            </p>
            <p class="text-sm text-base-content/60">
              <?= htmlspecialchars($row['tech']) ?>
            </p>

            <?php if($row['is_protected']): ?>
              <span class="badge badge-neutral mt-1">Protected</span>
            <?php endif; ?>
          </div>

          <?php if(!$row['is_protected']): ?>
            <a href="delete_project.php?id=<?= $row['id'] ?>"
               onclick="return confirm('Delete this project?')"
               class="btn btn-sm btn-error btn-outline transition
                      transform hover:scale-110 active:scale-95">
              <i class="fa-solid fa-trash"></i>
            </a>
          <?php endif; ?>

        </div>
        <?php } ?>

      </div>
    </div>

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
