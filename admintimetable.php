<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Labguru Clone with Timetable</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }

    .sidebar {
      background: -webkit-linear-gradient(rgba(19, 134, 117, 0.73), #ac873624);
      width: 80px;
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      gap: 30px;
      position: fixed;
    }

    .sidebar a {
      color: white;
      font-size: 24px;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar a:hover {
      color: #b7e4c7;
    }

    .label {
      font-size: 11px;
      color: white;
      text-align: center;
      margin-top: 5px;
    }

    .main {
      margin-left: 80px;
      padding: 24px;
    }

    .title {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 10px 20px;
      background: -webkit-linear-gradient(#ac873624, rgba(19, 134, 117, 0.6));
      margin-left: 80px;
    }

    .title .logo {
      width: 50px;
      height: 50px;
    }

    h1 {
      margin: 0;
      font-size: 24px;
      color: rgb(119, 164, 146);
    }

    .timetable-section {
      margin-left: 85px;
      padding: 24px;
    }

    .timetable {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .timetable th, .timetable td {
      border: 1px solid #e5e7eb;
      padding: 16px;
      text-align: center;
    }

    .timetable th {
      background-color: #f3f4f6;
      font-weight: 600;
    }

    .timetable td {
      height: 80px;
    }

    .time-col {
      background-color: #f9fafb;
      font-weight: bold;
    }
        a {
      font-size: 24px;
      color: rgb(0, 0, 0);
      text-decoration: initial;
    }

    a:hover {
      color: white;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <a href="students.php" title="Manage Students">
      <i class="fas fa-user-graduate"></i>
      <div class="label">Students</div>
    </a>
    <a href="lab.php" title="Lab Components">
      <i class="fas fa-microscope"></i>
      <div class="label">Lab</div>
    </a>
    <a href="#" title="Edit Timetable">
      <i class="fas fa-calendar-alt"></i>
      <div class="label">Timetable</div>
    </a>
  </div>

  <div class="title">
    <img class="logo" src="images/logo.png" alt="Logo">
    <h1><a href="admin.php">Evergreen Ridge University</a></h1>
  </div>

  <div class="timetable-section">
    <table class="timetable">
      <thead>
        <tr>
          <th>Time</th>
          <th>9:00 AM - 10:40 AM</th>
          <th>10:50 AM - 12:30 PM</th>
          <th>01:15 PM - 02:55 PM </th>
          <th>03:05 PM - 4:45 PM</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="time-col">Monday</td>
          <td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="time-col">Tuesday</td>
          <td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="time-col">Wednesday</td>
          <td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="time-col">Thursday</td>
          <td></td><td></td><td></td><td></td><td></td>
        </tr>
                <tr>
          <td class="time-col">Friday</td>
          <td></td><td></td><td></td><td></td><td></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
