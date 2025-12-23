<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />

    <title>Übermensch – Education Aid Disbursement System</title>

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
        }

        .nav_link li a:hover {
            color: #ffdd00;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
            flex-direction: column;
        }

        main h1 {
            color: #0d3b66;
        }

        main p {
            color: #333;
            font-size: 18px;
            max-width: 600px;
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
            <li><a href="admin_dashboard.php">Aid Providers</a></li>
            <li><a href="#">Reports</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="home">
        <h1>Welcome to Übermensch</h1>
        <p>
            Übermensch is an Education Aid Disbursement System that helps talented students in rural Bangladesh access scholarships and aid.
            Track applications, verify students, monitor disbursements, and analyze regional impact transparently and efficiently.
        </p>
    </section>
</main>
</body>
</html>
