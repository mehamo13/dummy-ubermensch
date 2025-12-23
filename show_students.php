<?php
// DBconnect.php content
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ubermench";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />
    <title>Übermensch – Students List</title>
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }

        header {
            background-color: #0d3b66;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav_logo h1 a {
            color: #fff;
            text-decoration: none;
            font-size: 26px;
        }

        .nav_link {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        .nav_link li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav_link li a:hover {
            color: #ffdd00;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            color: #0d3b66;
            font-weight: 600;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #0d3b66;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 15px;
            }

            th {
                display: none;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: calc(50% - 30px);
                text-align: left;
                font-weight: 600;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="nav_logo">
                <h1><a href="index.php">Übermensch</a></h1>
            </div>
            <ul class="nav_link">
                <li><a href="show_students.php">Students</a></li>
                <li><a href="show_providers.php">Aid Providers</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Students List</h1>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>gpa</th>
                    <th>Attendance (%)</th>
                    <th>Household Income</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>Upazila</th>
                    <th>Verification Status</th>
                    <th>Institution ID</th>
                    <th>Region ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Student";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td data-label='Student ID'>{$row['student_id']}</td>";
                        echo "<td data-label='Name'>{$row['name']}</td>";
                        echo "<td data-label='DOB'>{$row['DOB']}</td>";
                        echo "<td data-label='Gender'>{$row['gender']}</td>";
                        echo "<td data-label='gpa'>{$row['gpa']}</td>";
                        echo "<td data-label='Attendance'>{$row['attendance']}</td>";
                        echo "<td data-label='Household Income'>{$row['household_income']}</td>";
                        echo "<td data-label='Address'>{$row['address']}</td>";
                        echo "<td data-label='District'>{$row['district']}</td>";
                        echo "<td data-label='Upazila'>{$row['upazila']}</td>";
                        echo "<td data-label='Verification Status'>{$row['verification_status']}</td>";
                        echo "<td data-label='Institution ID'>{$row['institution_id']}</td>";
                        echo "<td data-label='Region ID'>{$row['region_id']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13' style='text-align:center;'>No students found.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
