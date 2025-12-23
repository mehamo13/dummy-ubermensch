<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: login_signup.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ubermench";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Übermensch - Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
<style>
body {font-family:'Fredoka', sans-serif; background:#f4f6f8; margin:0; padding:0;}
header{background:#0077cc; color:#fff; padding:15px;}
header h1{margin:0;}
nav a{color:#fff; margin-right:15px; text-decoration:none; font-weight:600;}
.dashboard{padding:20px;}
section{margin-bottom:40px; background:#fff; padding:15px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1);}
h2{margin-top:0;}
table{width:100%; border-collapse:collapse;}
table, th, td{border:1px solid #ddd;}
th, td{padding:10px; text-align:left;}
th{background:#0077cc; color:#fff;}
</style>
</head>
<body>
<header>
<h1>Admin Dashboard</h1>
<nav>
<a href="logout.php">Logout</a>
</nav>
</header>
<div class="dashboard">

<!-- STUDENTS -->
<section>
<h2>All Students</h2>
<table>
<thead>
<tr>
<th>ID</th><th>Name</th><th>DOB</th><th>Gender</th><th>CGPA</th><th>Attendance</th><th>Income</th><th>District</th><th>Upazila</th><th>Verification</th>
</tr>
</thead>
<tbody>
<?php
$result = $conn->query("SELECT * FROM student");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['student_id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['dob']}</td>
    <td>{$row['gender']}</td>
    <td>{$row['cgpa']}</td>
    <td>{$row['attendance_percentage']}</td>
    <td>{$row['household_income']}</td>
    <td>{$row['district']}</td>
    <td>{$row['upazila']}</td>
    <td>{$row['verification_status']}</td>
    </tr>";
}
?>
</tbody>
</table>
</section>

<!-- AID PROVIDERS -->
<section>
<h2>All Aid Providers</h2>
<table>
<thead>
<tr>
<th>ID</th><th>Name</th><th>Type</th><th>Email</th><th>Phone</th><th>Address</th>
</tr>
</thead>
<tbody>
<?php
$result = $conn->query("SELECT * FROM aidprovider");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['provider_id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['provider_type']}</td>
    <td>{$row['contact_email']}</td>
    <td>{$row['contact_phone']}</td>
    <td>{$row['address']}</td>
    </tr>";
}
?>
</tbody>
</table>
</section>

<!-- SCHOLARSHIP PROGRAMS -->
<section>
<h2>Scholarship / Aid Programs</h2>
<table>
<thead>
<tr>
<th>ID</th><th>Name</th><th>Provider ID</th><th>Income Threshold</th><th>CGPA Threshold</th><th>Total Funds</th><th>Funds Remaining</th><th>Start</th><th>End</th>
</tr>
</thead>
<tbody>
<?php
$result = $conn->query("SELECT * FROM scholarshipprogram");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['program_id']}</td>
    <td>{$row['program_name']}</td>
    <td>{$row['provider_id']}</td>
    <td>{$row['eligibility_income_threshold']}</td>
    <td>{$row['eligibility_cgpa_threshold']}</td>
    <td>{$row['total_funds']}</td>
    <td>{$row['funds_remaining']}</td>
    <td>{$row['start_date']}</td>
    <td>{$row['end_date']}</td>
    </tr>";
}
?>
</tbody>
</table>
</section>

<!-- APPLICATIONS -->
<section>
<h2>All Applications</h2>
<table>
<thead>
<tr>
<th>ID</th><th>Student ID</th><th>Program ID</th><th>Status</th><th>Application Date</th><th>Review Date</th><th>Comments</th>
</tr>
</thead>
<tbody>
<?php
$result = $conn->query("SELECT * FROM application");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['application_id']}</td>
    <td>{$row['student_id']}</td>
    <td>{$row['program_id']}</td>
    <td>{$row['status']}</td>
    <td>{$row['application_date']}</td>
    <td>{$row['review_date']}</td>
    <td>{$row['comments']}</td>
    </tr>";
}
?>
</tbody>
</table>
</section>

</div>
</body>
</html>
