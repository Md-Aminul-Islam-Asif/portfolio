<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<div class="navbar bg-base-100 px-6 md:px-12 shadow-sm sticky top-0 z-50">

  <!-- Left: Logo -->
  <div class="flex-1 flex items-center gap-3">
   <div class="flex items-center gap-2">
  <div class="w-9 h-9 rounded-full bg-black text-white
              flex items-center justify-center font-bold">
    A
  </div>
  <span class="text-lg font-semibold">
    Aminul
  </span>
</div>

    <a href="index.php" class="text-lg font-semibold">
       Portfolio
    </a>
  </div>

  <!-- Desktop Menu -->
  <div class="hidden md:flex gap-2 items-center">

    <a href="projects.php"
       class="btn btn-sm rounded-full <?= $current=='projects.php'?'btn-active':'btn-ghost' ?>
              transition hover:-translate-y-0.5">
      Work
    </a>

    <a href="about.php"
       class="btn btn-sm rounded-full <?= $current=='about.php'?'btn-active':'btn-ghost' ?>
              transition hover:-translate-y-0.5">
      About
    </a>

    <a href="contact.php"
       class="btn btn-sm rounded-full <?= $current=='contact.php'?'btn-active':'btn-ghost' ?>
              transition hover:-translate-y-0.5">
      Contact
    </a>

    <!-- Theme Toggle -->
    <label class="swap swap-rotate btn btn-sm btn-ghost">
      <input type="checkbox" id="themeToggle" />
      <i class="fa-solid fa-sun swap-on"></i>
      <i class="fa-solid fa-moon swap-off"></i>
    </label>

    <a href="logout.php" class="btn btn-sm btn-error rounded-full">
      Logout
    </a>
  </div>

  <!-- Mobile Menu -->
  <div class="md:hidden dropdown dropdown-end">
    <label tabindex="0" class="btn btn-ghost text-xl">☰</label>

    <ul tabindex="0"
        class="menu dropdown-content bg-base-100 rounded-box
               w-44 shadow mt-3">

      <li><a href="projects.php">Work</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>

      <li class="flex items-center px-4 py-2 gap-2">
        <span class="text-sm">Dark Mode</span>
        <input type="checkbox" class="toggle toggle-sm" id="themeToggleMobile">
      </li>

      <li>
        <a href="logout.php" class="text-red-500">Logout</a>
      </li>
    </ul>
  </div>

</div>

<!-- 🌗 DARK / LIGHT MODE SCRIPT -->
<script>
  const html = document.documentElement;
  const desktopToggle = document.getElementById("themeToggle");
  const mobileToggle  = document.getElementById("themeToggleMobile");

  const savedTheme = localStorage.getItem("theme") || "light";
  html.setAttribute("data-theme", savedTheme);

  function syncToggles(isDark){
    if (desktopToggle) desktopToggle.checked = isDark;
    if (mobileToggle) mobileToggle.checked = isDark;
  }

  syncToggles(savedTheme === "dark");

  function setTheme(isDark){
    const theme = isDark ? "dark" : "light";
    html.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    syncToggles(isDark);
  }

  desktopToggle?.addEventListener("change", e => setTheme(e.target.checked));
  mobileToggle?.addEventListener("change",  e => setTheme(e.target.checked));
</script>
