<?php

$name = "Krein Irish Nicole Gutay";
$title = "Software Engineer";
$phone = "09123456789";
$email = "krein.gutay@email.com";
$linkedin = "linkedin.com/in/krein-gutay";
$github = "github.com/krein-gutay";
$address = "Laoac, Pangasinan";
$dob = "10 March 2003";
$gender = "Female";
$nationality = "Filipino";

$objective = "Motivated software engineer with skills in web and mobile app development. 
Passionate about solving real-world problems through simple and efficient coding solutions.";

$education = [
    "2015–2019: High School Diploma, Laoac National High School (With Honors)",
    "2019–2023: BS in Information Technology, PSU Urdaneta (Dean’s Lister)"
];

$experience = [
    "2022–Present: Freelance Web Developer – Created websites for local businesses.",
    "2021: Internship at Local IT Office – Assisted in database management."
];

$skills = ["HTML, CSS, JavaScript", "C, C++", "Java", "SQL, MS Access"];


$image_url = "./profile.png"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resume - <?php echo $name; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 700px;
      margin: 20px auto;
      background: white;
      padding: 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: row;
      gap: 20px;
    }
    .sidebar {
      flex: 0 0 180px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      margin-right: 20px;
    }
    .sidebar img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(0,0,0,0.15);
      margin-bottom: 10px;
    }
    .main-content {
      flex: 1;
    }
    .header {
      background: #004080;
      color: white;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    .header h1 {
      margin: 0;
      font-size: 24px;
    }
    .header p {
      margin: 5px 0;
    }
    h2 {
      border-bottom: 2px solid #004080;
      padding-bottom: 5px;
      font-size: 18px;
      margin-top: 20px;
    }
    ul {
      margin: 5px 0 15px 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="sidebar">
    <img src="<?php echo $image_url; ?>" alt="Profile Image of <?php echo $name; ?>">
  </div>
  <div class="main-content">
    <div class="header">
      <h1><?php echo $name; ?></h1>
      <p><?php echo $title; ?></p>
      <p>Phone: <?php echo $phone; ?></p>
      <p>Email: <?php echo $email; ?></p>
      <p>LinkedIn: <?php echo $linkedin; ?></p>
      <p>GitHub: <?php echo $github; ?></p>
      <p>Address: <?php echo $address; ?></p>
      <p>Date of Birth: <?php echo $dob; ?></p>
      <p>Gender: <?php echo $gender; ?></p>
      <p>Nationality: <?php echo $nationality; ?></p>
    </div>

    <h2>Objective</h2>
    <p><?php echo $objective; ?></p>

    <h2>Education</h2>
    <ul>
      <?php
        foreach ($education as $edu) {
          echo "<li>$edu</li>";
        }
      ?>
    </ul>

    <h2>Experience</h2>
    <ul>
      <?php
        foreach ($experience as $exp) {
          echo "<li>$exp</li>";
        }
      ?>
    </ul>

    <h2>Skills</h2>
    <ul>
      <?php
        foreach ($skills as $skill) {
          echo "<li>$skill</li>";
        }
      ?>
    </ul>
  </div>
</div>

</body>
</html> 