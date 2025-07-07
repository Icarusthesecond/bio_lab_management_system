  <!DOCTYPE html> 
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evergreen Ridge University</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.css" rel="stylesheet"/>

    <style>
      body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
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

      a {
        font-size: 24px;
        color: rgb(0, 0, 0);
        text-decoration: initial;
      }

      a:hover {
        color: white;
      }

      .alerts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 16px;
        margin: 24px 0 24px 85px;
      }

      .alert {
        background: white;
        border: 1px solid #e5e7eb;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 8px;
      }

      .alert-icon {
        width: 24px;
        height: 24px;
        background: black;
        border-radius: 50%;
      }

      .calendar-section {
        display: flex;
        gap: 24px;
        margin-left: 85px;
        padding: 24px;
        align-items: flex-start;
      }

      .flatpickr-box {
        flex: 1;
        background: rgba(255, 255, 255, 0.705);
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      }

      .flatpickr-calendar {
        border-radius: 15px !important;
        padding: 10px;
      }

      .flatpickr-day.selected {
        background: #d9b5ea;
        border-color: #d9b5ea;
      }

      .fc-box {
        flex: 2;
        background: rgba(255, 255, 255, 0.714);
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      }

      #calendar {
        width: 100%;
      }

      .fc-toolbar-chunk button {
        margin-right: 6px;
      }

      .fc .fc-button-primary {
        background-color: #e5e7eb;
        color: black;
        border: none;
      }

      .fc .fc-button-primary.fc-button-active {
        background-color: #7c3aed;
        color: white;
      }

      .fc-header-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
      }

      .new-event-btn {
        background-color: #7c3aed;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
      }

      input#flatpickr {
        margin: auto;
        display: block;
      }

      .video-background {
        position: fixed;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
      }

      .video-background video {
        object-fit: cover;
        width: 100%;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="video-background">
      <video id="vid" autoplay muted loop>
        <source src="images/3191420-uhd_3840_2160_25fps.mp4" type="video/mp4">
      </video>
    </div>

    <div class="sidebar">
      <a href="students.php" title="Manage Students">
        <i class="fas fa-user-graduate"></i>
        <div class="label">Students</div>
      </a>
      <a href="lab.php" title="Lab Components">
        <i class="fas fa-microscope"></i>
        <div class="label">Lab</div>
      </a>
      <a href="admintimetable.php" title="Edit Timetable">
        <i class="fas fa-calendar-alt"></i>
        <div class="label">Timetable</div>
      </a>
      <a href="adminregistration.php" title="Admin Panel">
  <i class="fas fa-user-shield"></i>
  <div class="label">Admin</div>
</a>

    </div>

    <div class="title">
      <img class="logo" src="images/logo.png" alt="Logo">
      <h1><a href="#">Evergreen Ridge University</a></h1>
    </div>

    <div class="alerts">
      <div class="alert"><div class="alert-icon"></div>Expired stocks alert</div>
      <div class="alert"><div class="alert-icon"></div>New arrived stocks</div>
      <div class="alert"><div class="alert-icon"></div>Equipment require maintenance</div>
      <div class="alert"><div class="alert-icon"></div>Open tasks for the next 7 days</div>
    </div>

    <div class="calendar-section">
      <div class="flatpickr-box">
        <input type="text" id="flatpickr" placeholder="Select a date" />
      </div>

      <div class="fc-box">
        <div class="fc-header-tools">
          <button onclick="calendar.today()" class="fc-button fc-button-primary">Today</button>
          <button class="new-event-btn">+ New event</button>
        </div>
        <div id="calendar"></div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js"></script>

    <script>
      let calendar;

      // Flatpickr setup
      flatpickr("#flatpickr", {
        inline: true,
        disableMobile: true,
        onChange: function(selectedDates) {
          if (selectedDates.length > 0 && calendar) {
            calendar.changeView("timeGridDay", selectedDates[0]);
          }
        }
      });

      // FullCalendar setup
      const calendarEl = document.getElementById('calendar');
      calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'title',
          center: '',
          right: 'dayGridMonth,timeGridWeek,timeGridDay prev,next'
        },
        selectable: true,
        editable: true,
        height: "auto",
        events: [
          { title: 'Blue Event', start: '2022-07-04', end: '2022-07-06', color: '#3b82f6' },
          { title: 'Purple Event', start: '2022-07-01', end: '2022-07-08', color: '#8b5cf6' },
          { title: 'Yellow Dot', start: '2022-07-13', color: '#facc15' },
          { title: 'Orange Task', start: '2022-07-18', end: '2022-07-19', color: '#f97316' },
          { title: 'Cyan Event', start: '2022-07-19', end: '2022-07-20', color: '#22d3ee' },
          { title: 'Yellow Event', start: '2022-07-26', end: '2022-07-28', color: '#fbbf24' }
        ],
        dateClick: function(info) {
          const title = prompt('Enter Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: info.dateStr,
              allDay: false
            });
          }
        }
      });

      calendar.render();
    </script>
  </body>
  </html>
