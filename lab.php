<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Evergreen Ridge University</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
      margin-left: 100px;
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

    .video-background {
      position: fixed;
      top: 0;
      left: 0;
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

    .labs-list {
      margin-left: 120px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 20px;
    }

    .labs-entry {
      background-color: #1e1e2f;
      border-radius: 10px;
      padding: 15px;
      color: white;
    }

    .labs-header {
      font-size: 1.2em;
      font-weight: bold;
      cursor: pointer;
    }

    .labs-header .arrow {
      display: inline-block;
      margin-right: 8px;
      border: 1px solid white;
      border-radius: 3px;
      padding: 0 5px;
    }

    .labs-content {
      display: none;
      padding-top: 10px;
      flex-direction: row;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .labs-text {
      flex: 1 1 60%;
    }

    .labs-video {
      flex: 1 1 35%;
      display: flex;
      justify-content: flex-end;
    }

    .labs-video iframe {
      width: 100%;
      height: 100%;
      max-width: 320px;
      aspect-ratio: 16 / 9;
      border: none;
    }
    .lab-list {
      margin-left: 120px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 20px;
    }

    .lab-entry {
      background-color: #1e1e2f;
      border-radius: 10px;
      padding: 15px;
      color: white;
    }

    .lab-header {
      font-size: 1.2em;
      font-weight: bold;
      cursor: pointer;
    }

    .lab-header .arrow {
      display: inline-block;
      margin-right: 8px;
      border: 1px solid white;
      border-radius: 3px;
      padding: 0 5px;
    }

    .lab-content {
      display: none;
      padding-top: 10px;
      flex-direction: row;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .lab-text {
      flex: 1 1 60%;
    }

    .lab-video {
      flex: 1 1 35%;
      display: flex;
      justify-content: flex-end;
    }

    .lab-video iframe {
      width: 100%;
      height: 100%;
      max-width: 320px;
      aspect-ratio: 16 / 9;
      border: none;
    }

    h1{
        margin-left: 120px;
        color: white;
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
    <a href="#" title="Lab Components">
      <i class="fas fa-microscope"></i>
      <div class="label">Lab</div>
    </a>
    <a href="admintimetable.php" title="Edit Timetable">
      <i class="fas fa-calendar-alt"></i>
      <div class="label">Timetable</div>
    </a>
  </div>

  <div class="title">
    <img class="logo" src="images/logo.png" alt="Logo">
    <h1><a href="#">Evergreen Ridge University</a></h1>
  </div>
  <h1> B.Sc Labs <h1>
  <div class="lab-list" id="labList"></div>

  <script>
    const labs = [
      {
        title: "Lab 1: Gram Staining of Bacteria",
        video: "sxa46xKfIOY",
        purpose: "Differentiate between Gram-positive and Gram-negative bacteria.",
        procedure: `Use a sterile loop to transfer a drop of bacterial culture onto a clean glass slide.<br>
        Spread the sample into a thin smear and air dry.<br>
        Heat-fix the slide by passing it quickly through a flame.<br>
        Flood the slide with crystal violet for 1 minute.<br>
        Rinse gently with water.<br>
        Flood with iodine (mordant) for 1 minute.<br>
        Rinse with water.<br>
        Decolorize with alcohol (95% ethanol) for 10–20 seconds.<br>
        Immediately rinse with water.<br>
        Counterstain with safranin for 1 minute.<br>
        Rinse and blot dry with paper towel.<br>
        Observe under oil immersion lens (100x objective) using a microscope.`
      },
      {
        title: "Lab 2: Plant Transpiration Rate Measurement",
        video: "FWxh28CTEcM",
        purpose: "Measure water loss from plants.",
        procedure: `Cut a leafy twig underwater to avoid air entering the xylem.<br>
        Insert the twig into a water-filled potometer and seal all joints with Vaseline.<br>
        Introduce a small air bubble into the capillary tube.<br>
        Start the stopwatch and measure the distance the bubble travels over a set time.<br>
        Repeat under different conditions: light, wind, humidity, temperature.<br>
        Record and calculate transpiration rate (e.g., mm/min).`
      },
      {
        title: "Lab 3: DNA Extraction (Strawberries/Bananas)",
        video: "W1DVEtzrl9g",
        purpose: "Extract visible DNA using household reagents.",
        procedure: `Mash strawberries/bananas in a ziplock bag or use a blender.<br>
        Mix a solution of dish soap + salt + water (DNA extraction buffer).<br>
        Add buffer to the mashed fruit and mix well.<br>
        Filter the mixture through cheesecloth/coffee filter into a beaker.<br>
        Add chilled rubbing alcohol slowly down the side of the container to form a layer.<br>
        Let sit for a few minutes. DNA will appear as white, stringy precipitate at the interface.<br>
        Use a pipette or stirring rod to collect the DNA strands.`
      },
      {
        title: "Lab 4: Enzyme Activity (Catalase and H₂O₂)",
        video: "3PYdMaClUmw",
        purpose: "Investigate enzyme activity by observing oxygen release.",
        procedure: `Cut potato or liver into small cubes.<br>
        Add 10 mL of hydrogen peroxide (3–6%) to a beaker or test tube.<br>
        Add the tissue sample and start the stopwatch.<br>
        Observe and measure the amount of foam produced.<br>
        Vary conditions: temperature (using water bath), pH, enzyme concentration.<br>
        Record time and foam height for each condition.`
      },
      {
        title: "Lab 5: Photosynthesis Rate Measurement",
        video: "id0aO_OdFwA",
        purpose: "Measure photosynthesis via oxygen output.",
        procedure: `Place Elodea (pondweed) in a beaker filled with sodium bicarbonate solution (provides CO₂).<br>
        Cut the stem underwater and orient the cut end upward.<br>
        Place a gas collection tube or count oxygen bubbles released.<br>
        Shine a lamp at a fixed distance.<br>
        Start the stopwatch and count bubbles for a set time.<br>
        Repeat with different light intensities or wavelengths.<br>
        Record results and graph rate vs. light intensity.`
      },
      {
        title: "Lab 6: Diffusion/Osmosis with Dialysis Tubing",
        video: "2CNGe3jMej0",
        purpose: "Model selective permeability of cell membranes.",
        procedure: `Soak dialysis tubing in water to soften it.<br>
        Tie one end, fill it with glucose/starch solution, then tie the other end.<br>
        Place the tubing in a beaker with water + iodine.<br>
        Leave for 30–60 minutes.<br>
        Observe color change in tubing and surrounding solution.<br>
        Test external solution for glucose using Benedict’s test (heat required).<br><br>
        <strong>Expected Results:</strong><br>
        Iodine enters tubing: turns blue-black (indicates starch inside).<br>
        Glucose diffuses out: Benedict’s solution turns orange/red upon heating.`
      },
      {
        title: "Lab 7: Aseptic Technique and Microbial Culture",
        video: "bRadiLXkqoU",
        purpose: "Grow and handle microbes safely.",
        procedure: `Sterilize inoculation loop by flaming until red-hot.<br>
        Cool the loop, then dip into bacterial culture.<br>
        Streak bacteria onto nutrient agar plate using the quadrant method.<br>
        Flame the loop between quadrants.<br>
        Seal the Petri dish with tape (not completely airtight).<br>
        Label and place in incubator at 25–30°C for 24–48 hours.<br>
        Observe colony growth and morphology.`
      },
      {
        title: "Lab 8: Effect of Exercise on Heart Rate",
        video: "U0rnucxG9hE",
        purpose: "Measure physiological changes due to physical activity.",
        procedure: `Have a volunteer rest for 5 minutes.<br>
        Measure resting heart rate using pulse oximeter or stethoscope for 1 minute.<br>
        Perform light exercise (e.g., jumping jacks, jogging in place) for 1–3 minutes.<br>
        Immediately measure heart rate post-exercise and every minute until baseline is reached.<br>
        Plot recovery curve using graph paper/software.`
      },
      {
        title: "Lab 9: Microscopy of Onion or Cheek Cells",
        video: "EUXmC84aRFQ",
        purpose: "View cell structures under microscope.",
        procedure: `Peel a thin layer of onion epidermis or collect cheek cells using a cotton swab.<br>
        Place sample on a slide with a drop of water or stain (methylene blue for cheek cells, iodine for onion).<br>
        Add a coverslip slowly at an angle to avoid air bubbles.<br>
        View under microscope, starting at low magnification (4x), then 10x, then 40x.<br>
        Sketch and label: nucleus, cell wall, cytoplasm, etc.`
      },
      {
        title: "Lab 10: Antibiotic Sensitivity Test (Kirby-Bauer Method)",
        video: "4eLcjk3Iv9Y",
        purpose: "Assess bacterial resistance to antibiotics.",
        procedure: `Use a sterile swab to spread bacterial culture evenly over an agar plate.<br>
        Place antibiotic discs (or soaked filter paper) on the surface with sterile forceps.<br>
        Label plate and incubate for 24–48 hours at 25–37°C.<br>
        Measure the zones of inhibition (clear areas around discs) using a ruler.<br>
        Larger zones = more effective antibiotic.`
      }
    ];

    const container = document.getElementById("labList");

    labs.forEach((lab) => {
      const labDiv = document.createElement("div");
      labDiv.className = "labs-entry";
      labDiv.innerHTML = `
        <div class="labs-header" onclick="toggleLab(this)">
          <span class="arrow">▶</span> ${lab.title}
        </div>
        <div class="labs-content">
          <div class="labs-text">
            <strong>Purpose:</strong> ${lab.purpose}<br><br>
            <strong>Procedure:</strong><br>
            ${lab.procedure}
          </div>
          <div class="labs-video">
            <iframe loading="lazy" src="https://www.youtube.com/embed/${lab.video}" allowfullscreen></iframe>
          </div>
        </div>
      `;
      container.appendChild(labDiv);
    });

    function toggleLab(el) {
      const content = el.nextElementSibling;
      const arrow = el.querySelector('.arrow');
      const isOpen = content.style.display === 'flex';
      content.style.display = isOpen ? 'none' : 'flex';
      arrow.innerHTML = isOpen ? '▶' : '▼';
    }
  </script>
      <h1> M.Sc Labs <h1>
    <div class="lab-list" id="labListContainer"></div>
<script>
  const lab = [
    {
      title: "Lab 1: Diffusion in Agar Cubes",
      purpose: "Demonstrate how surface area to volume ratio affects diffusion.",
      procedure: `Prepare agar cubes containing pH indicator (e.g., phenolphthalein) and NaOH.\nCut cubes into different sizes.\nPlace them in vinegar (acidic solution).\nObserve color change from pink to clear as acid diffuses in.\nMeasure depth of diffusion and analyze effect of cube size.`,
      video: "https://www.youtube.com/embed/sample1"
    },
    {
      title: "Lab 2: Investigating Enzyme Temperature Sensitivity",
      purpose: "Determine how temperature affects enzyme catalysis.",
      procedure: `Prepare solutions of catalase (e.g., from potato).\nSet up water baths at different temperatures (0°C–60°C).\nAdd hydrogen peroxide and catalase in test tubes.\nMeasure height or rate of bubble formation.\nGraph enzyme activity vs. temperature.`,
      video: "https://www.youtube.com/embed/sample2"
    },
    {
      title: "Lab 3: Virtual Dissection of a Frog",
      purpose: "Identify internal organs and body systems of a vertebrate.",
      procedure: `Use an online frog dissection simulation (e.g., McGraw-Hill).\nFollow instructions to expose and identify organs.\nLabel digestive, circulatory, and reproductive structures.\nComplete guided questions based on virtual observations.`,
      video: "https://www.youtube.com/embed/sample3"
    },
    {
      title: "Lab 4: Investigating pH Effect on Enzyme Activity",
      purpose: "Explore how pH influences enzymatic function.",
      procedure: `Prepare buffered solutions at different pH levels.\nMix enzyme (e.g., amylase) with starch in each.\nUse iodine to test starch breakdown over time.\nRecord time taken for solution to stop changing color.\nDetermine optimal pH for activity.`,
      video: "https://www.youtube.com/embed/sample4"
    },
    {
      title: "Lab 5: Population Sampling with Quadrats",
      purpose: "Estimate population density in an ecosystem.",
      procedure: `Select field site and mark area with tape.\nRandomly place quadrats (square frames) at intervals.\nCount organisms (e.g., grass, insects) in each quadrat.\nCalculate average number per quadrat.\nMultiply to estimate total population in area.`,
      video: "https://www.youtube.com/embed/sample5"
    },
    {
      title: "Lab 6: Heart Rate and Exercise",
      purpose: "Study how physical activity affects heart rate.",
      procedure: `Measure resting heart rate.\nPerform 2 minutes of jumping jacks or running in place.\nMeasure pulse immediately, then at 1-min intervals for 5 minutes.\nGraph heart rate over recovery time.\nCompare between individuals or fitness levels.`,
      video: "https://www.youtube.com/embed/sample6"
    },
    {
      title: "Lab 7: Investigating Tropism with Bean Seedlings",
      purpose: "Examine how plants grow in response to stimuli.",
      procedure: `Germinate bean seeds in moist paper towels.\nPlace seedlings in boxes with light from one direction.\nObserve growth direction (phototropism).\nRepeat with gravity manipulation for geotropism.\nRecord and photograph changes daily.`,
      video: "https://www.youtube.com/embed/sample7"
    },
    {
      title: "Lab 8: CO₂ Levels and Photosynthesis",
      purpose: "Analyze the role of carbon dioxide in photosynthesis.",
      procedure: `Submerge elodea (aquatic plant) in water with bromothymol blue.\nBlow CO₂ into the solution to acidify it (color turns yellow).\nPlace in light and observe color change back to blue.\nUse dark control to compare.\nInfer photosynthetic carbon uptake.`,
      video: "https://www.youtube.com/embed/sample8"
    },
    {
      title: "Lab 9: Testing for Vitamin C in Juices",
      purpose: "Determine vitamin C content in various drinks.",
      procedure: `Use iodine solution and starch as indicator.\nTitrate fruit juice into the indicator solution drop by drop.\nCount number of drops until blue color disappears.\nCompare results across samples.\nInfer vitamin C concentration based on volume needed.`,
      video: "https://www.youtube.com/embed/sample9"
    },
    {
      title: "Lab 10: Modeling Meiosis with Beads",
      purpose: "Visualize chromosome behavior during meiosis.",
      procedure: `Use colored beads and strings to represent chromosomes.\nSimulate stages: prophase I, metaphase I, anaphase I, telophase I, etc.\nInclude crossing over with bead exchanges.\nObserve gametes at end of meiosis II.\nDiscuss genetic variation outcomes.`,
      video: "https://www.youtube.com/embed/sample10"
    }
  ];

  const labListContainer = document.getElementById('labListContainer');

  lab.forEach((lab, index) => {
    const labEntry = document.createElement('div');
    labEntry.className = 'lab-entry';

    const labHeader = document.createElement('div');
    labHeader.className = 'lab-header';
    labHeader.setAttribute('onclick', 'toggleLab(this)');
    labHeader.innerHTML = `<span class="arrow">▶</span> ${lab.title}`;

    const labContent = document.createElement('div');
    labContent.className = 'lab-content';

    const labText = document.createElement('div');
    labText.className = 'lab-text';
    labText.innerHTML = `<strong>Purpose:</strong> ${lab.purpose}<br><br><strong>Procedure:</strong><br>${lab.procedure.replace(/\n/g, '<br>')}`;

    const labVideo = document.createElement('div');
    labVideo.className = 'lab-video';
    labVideo.innerHTML = `<iframe loading="lazy" src="${lab.video}" allowfullscreen></iframe>`;

    labContent.appendChild(labText);
    labContent.appendChild(labVideo);

    labEntry.appendChild(labHeader);
    labEntry.appendChild(labContent);

    labListContainer.appendChild(labEntry);
  });

  function toggleLab(el) {
    const content = el.nextElementSibling;
    const arrow = el.querySelector('.arrow');
    const isOpen = content.style.display === 'flex';
    content.style.display = isOpen ? 'none' : 'flex';
    arrow.innerHTML = isOpen ? '▶' : '▼';
  }
</script>
</body>
</html>
