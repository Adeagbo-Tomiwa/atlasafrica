<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atlas Africa — Subscribers</title>
   <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">

   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.5/css/buttons.dataTables.css"/>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --navy: #0A174E;
      --gold: #F5D042;
      --muted: #6B7280;
    }
    html, body {
      font-family: 'Outfit', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    .brand-navy { color: var(--navy); }
    .brand-gold { color: var(--gold); }
    .bg-gold { background: var(--gold); }
    .text-muted { color: var(--muted); }

    /* soft glow and focus */
    .focus-ring {
      box-shadow: 0 6px 24px rgba(10,23,78,0.08), 0 0 0 4px rgba(245,208,66,0.08);
      outline: none;
    }

    /* subtle pattern background */
    .pattern-bg {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='400' viewBox='0 0 600 400'%3E%3Cdefs%3E%3Cpattern id='p' width='80' height='80' patternUnits='userSpaceOnUse'%3E%3Crect width='80' height='80' fill='%23fff' opacity='0'/%3E%3Cpath d='M0 40h80M40 0v80' stroke='%230a174e' stroke-opacity='0.04' stroke-width='6'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23p)'/%3E%3C/svg%3E");
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="bg-white text-gray-900 antialiased">

  <!-- Header -->
<?php include "header.php"; ?>

  <!-- Main -->
  <main class="flex-1 max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-24">
    <div class="mb-6">
      <h2 class="text-2xl font-bold brand-navy">Email Subscribers</h2>
      <p class="text-sm text-gray-500">All users who subscribed to be notified of Atlas Africa launch.</p>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200 display nowrap" id="subscribersTable">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date Subscribed</th>
          </tr>
        </thead>
        <tbody id="subscriberList" class="divide-y divide-gray-100">
          <tr>
            <td colspan="3" class="text-center py-6 text-gray-400">Loading subscribers...</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center text-xs py-4 text-gray-500 border-t mt-auto">
    © <span id="year"></span> Atlas Africa. All rights reserved.
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();

    // Fetch subscribers
    async function loadSubscribers() {
      const tableBody = document.getElementById("subscriberList");
      try {
        const res = await fetch("../api/get_subscribers.php");
        const data = await res.json();

        if (data.success && data.subscribers.length > 0) {
          tableBody.innerHTML = "";
          data.subscribers.forEach((sub, index) => {
            const row = `
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-3 text-sm text-gray-600">${index + 1}</td>
                <td class="px-6 py-3 text-sm font-medium">${sub.email}</td>
                <td class="px-6 py-3 text-sm text-gray-500">${sub.created_at}</td>
              </tr>`;
            tableBody.innerHTML += row;
          });
        } else {
          tableBody.innerHTML = `<tr><td colspan="3" class="text-center py-6 text-gray-400">No subscribers yet.</td></tr>`;
        }
      } catch (err) {
        console.error(err);
        tableBody.innerHTML = `<tr><td colspan="3" class="text-center py-6 text-red-500">Error loading subscribers.</td></tr>`;
      }
    }

    loadSubscribers();
  </script>
  <!-- DataTables + Buttons -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
  $('#subscribersTable').DataTable({
    responsive: true,
    pageLength: 10,
    dom: 'Bfrtip',
    buttons: [
      { extend: 'copy', className: 'btn btn-outline text-xs' },
      { extend: 'csv', className: 'btn btn-outline text-xs' },
      { extend: 'excel', className: 'btn btn-outline text-xs' },
      { extend: 'pdf', className: 'btn btn-outline text-xs' },
      { extend: 'print', className: 'btn btn-outline text-xs' },
      { extend: 'colvis', className: 'btn btn-outline text-xs' }
    ]
  });
});
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.5/css/buttons.dataTables.min.css"/>
</body>
</html>
