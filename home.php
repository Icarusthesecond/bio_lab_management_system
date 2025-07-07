<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Evergreen Ridge University | Bio-Lab Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#0f172a',
            secondary: '#1e293b',
            accent: '#38bdf8',
            warning: '#f59e0b',
            success: '#10b981',
            danger: '#ef4444',
            info: '#3b82f6',
            highlight: '#9333ea',
            base: '#f1f5f9'
          },
        },
      },
    };
  </script>

  <style>
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(255, 255, 255, 0.08);
      z-index: -1;
    }

    #map {
      height: 400px;
      width: 100%;
      margin-top: 1rem;
      border: 2px solid #ccc;
      border-radius: 8px;
    }

    p {
      font-size: 1.25rem;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 0.5rem;
      border-radius: 0.375rem;
    }

    li {
      font-size: 1.25rem;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 0.3rem 0.5rem;
      border-radius: 0.375rem;
      margin-bottom: 0.25rem;
    }
  </style>
</head>

<body class="bg-slate-100 text-gray-900 font-sans relative">

  <!-- Background Video -->
  <video autoplay muted loop id="bg-video" class="fixed top-0 left-0 w-full h-full object-cover -z-10">
    <source src="images/bgv.mp4" type="video/mp4">
  </video>

  <!-- Sidebar with Leaflet Icons -->
  <aside class="w-36 bg-primary text-white fixed h-full flex flex-col items-center py-6 gap-6 shadow-md z-10">
  <?php
  // Assume database connection is already established (e.g., $conn)
  @include 'database.php';
  $conn = mysqli_connect("localhost", "root", "", "bio_lab_management");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $id = $_GET['id'] ?? '';

  $sql = "SELECT * FROM student_registration WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $userId = $_GET['id'] ?? '';
  $degree = '';

  if (!empty($userId)) {
    // Fetch degree from database based on user ID
    $stmt = $conn->prepare("SELECT Degree FROM student_registration WHERE id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($degree);
    $stmt->fetch();
    $stmt->close();
  }

  // Determine the lab file based on degree
  $labPage = 'lab.php'; // default fallback
  if ($degree === 'B.Sc') {
    $labPage = 'BSclab.php';
  } elseif ($degree === 'M.Sc') {
    $labPage = 'MSclab.php';
  }
?>

  <a href="userdetails.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" title="Students">
      <i class="fas fa-users text-xl"></i>
      <span class="text-[10px] mt-1">Student Details</span>
    </a>
    <a href="<?php echo $labPage . '?id=' . htmlspecialchars($userId); ?>" title="Lab">
  <i class="fas fa-flask text-xl"></i>
  <span class="text-[10px] mt-1">Lab</span>
</a>
    <a href="admintimetable.php" title="Timetable">
      <i class="fas fa-clock text-xl"></i>
      <span class="text-[10px] mt-1">Timetable</span>
    </a>
    <a href="#map" title="Map">
      <i class="fas fa-map-marked-alt text-xl"></i>
      <span class="text-[10px] mt-1">Map</span>
    </a>
  </aside>

  <!-- Main Content -->
  <div class="ml-20 min-h-screen relative z-0">
    <!-- Header -->
    <header class="text-center py-10 bg-white/60 shadow-md">
      <img src="images/logo.png" alt="Logo" class="w-24 h-24 mx-auto mb-4 rounded-full border-4 border-primary" />
      <h1 class="text-3xl font-bold text-primary">Evergreen Ridge University</h1>
      <p class="text-sm text-gray-600">Autonomous Research Institution | Since 1975</p>
    </header>

    <!-- Navigation -->
    <nav class="bg-primary text-white px-4 py-2">
      <div class="flex flex-wrap justify-center gap-6 text-sm font-semibold">
        <a href="#undergraduate" class="hover:text-accent transition">B.Sc. Biology</a>
        <a href="#postgraduate" class="hover:text-accent transition">M.Sc. Biology</a>
        <a href="#departments" class="hover:text-accent transition">Departments</a>
        <a href="#admissions" class="hover:text-accent transition">Admissions</a>
        <a href="#contact" class="hover:text-accent transition">Contact</a>
      </div>
    </nav>

    <!-- Hero Banner -->
    <div class="text-white text-center py-16 px-4" style="background: rgba(0, 0, 0, 0.6);">
      <h2 class="text-4xl font-bold mb-2">Explore Life Sciences at ERU</h2>
      <p class="text-lg">Cutting-edge research, field-based learning, and academic excellence</p>
    </div>

    <!-- Content Sections -->
    <main class="p-6 space-y-16 max-w-5xl mx-auto">
      <!-- Undergraduate -->
      <section id="undergraduate">
        <h2 class="text-2xl font-bold text-primary mb-4">B.Sc. in Biology</h2>
        <p class="mb-2">A 3-year undergraduate program integrating Molecular Biology, Physiology, Genetics, and Ecology with immersive lab and field experience.</p>
        <ul class="list-disc list-inside text-sm text-gray-700">
          <li>Field Camps at the Evergreen National Reserve</li>
          <li>Research projects and mentorship from Year 2</li>
          <li>Electives: Marine Biology, Bioinformatics, Plant Biotechnology</li>
        </ul>
      </section>

      <!-- Postgraduate -->
      <section id="postgraduate">
        <h2 class="text-2xl font-bold text-primary mb-4">M.Sc. in Biology</h2>
        <p>Specializations include:</p>
        <ul class="list-disc list-inside text-sm text-gray-700">
          <li>Molecular Biology & Genetics</li>
          <li>Ecology & Evolution</li>
          <li>Plant Biotechnology</li>
          <li>Microbial & Environmental Biology</li>
        </ul>
        <p class="mt-2 text-sm text-gray-600">Students undertake thesis or project-based tracks with access to advanced lab infrastructure.</p>
      </section>

      <!-- Departments -->
      <section id="departments">
        <h2 class="text-2xl font-bold text-primary mb-4">Department of Biological Sciences</h2>
        <p class="text-sm text-gray-700"><strong>Head:</strong> Dr. Elena Morse, Ph.D. in Ecological Genomics</p>
        <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
          <li>Molecular & Cellular Biology Lab</li>
          <li>Aquatic Biology Research Station</li>
          <li>Botanical Greenhouse</li>
          <li>Bioinformatics & Data Sciences Center</li>
        </ul>
      </section>

      <!-- Admissions -->
      <section id="admissions">
        <h2 class="text-2xl font-bold text-primary mb-4">Admissions 2025–26</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full border text-sm bg-white shadow rounded">
            <thead class="bg-slate-200">
              <tr>
                <th class="p-2 border">Program</th>
                <th class="p-2 border">Eligibility</th>
                <th class="p-2 border">Start Date</th>
                <th class="p-2 border">Fee/Semester</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="p-2 border">B.Sc. Biology</td>
                <td class="p-2 border">10+2 Science</td>
                <td class="p-2 border">June 2025</td>
                <td class="p-2 border">₹45,000</td>
              </tr>
              <tr>
                <td class="p-2 border">M.Sc. Biology</td>
                <td class="p-2 border">B.Sc. Biology or related</td>
                <td class="p-2 border">July 2025</td>
                <td class="p-2 border">₹60,000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Map Section -->
      <section id="map">
        <h2 class="text-2xl font-bold text-primary mb-4">Campus Map</h2>
        <div id="map"></div>
        <script>
          const map = L.map('map').setView([27.7172, 85.3240], 15);
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
          }).addTo(map);

          L.marker([27.7172, 85.3240]).addTo(map)
            .bindPopup('<strong>Evergreen Ridge University</strong><br>Main Campus')
            .openPopup();
        </script>
      </section>

    </main>
  </div>
</body>
</html>
