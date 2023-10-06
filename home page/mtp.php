<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three-Part Webpage</title>
    <style>
        /* Apply a CSS flexbox layout to divide the page */
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        /* Style the first part to occupy 10% of the viewport height */
        .first-part {
            background-color: #333;
            color: #fff;
            flex: 0 0 10%; /* Occupies 10% of the available height */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        /* Style the heading in the first part */
        .heading {
            font-size: 24px;
        }

        /* Style the login button in the first part */
        .login-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* Create a container for the second and third parts */
        .second-third-container {
            display: flex;
            flex: 1; /* Occupies the remaining height */
        }

        /* Style the second part to occupy 15% width of the remaining space */
        .second-part {
            background-color: #f0f0f0;
            flex: 0 0 15%; /* Occupies 15% of the available width */
            padding: 20px;
        }

        /* Style the options in the second part */
        .options {
            list-style: none;
            padding: 0;
        }

        /* Style each option item in the second part */
        .option-item {
            font-size: 18px;
            margin-bottom: 10px;
            cursor: pointer;
            border: 1px solid #ccc; /* Add a border to separate the options */
            padding: 10px; /* Add padding to improve readability */
        }

        /* Style the third part to occupy 85% width of the remaining space */
        .third-part {
            background-color: #fff;
            flex: 1; /* Occupies the remaining width (85%) */
            padding: 20px;
        }

        /* Add content styling (optional) */
        .content {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="first-part">
        <div class="heading">Event Management</div>
        <button class="login-button">Login</button>
    </div>
    <div class="second-third-container">
        <div class="second-part">
            <!-- Options for the second part -->
            <ul class="options">
                <li class="option-item">Seminar</li>
                <li class="option-item">Departments</li>
                <li class="option-item">Sports</li>
                <li class="option-item">Clubs/Culturals</li>
                <li class="option-item">Others</li>
            </ul>
        </div>
        <div class="third-part">
            <!-- Content for the third part goes here -->
            <?php require 'index.php'?>
        </div>
    </div>
</body>
</html>
