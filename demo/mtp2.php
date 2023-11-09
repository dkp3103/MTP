<?php 

session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['user_name'])) {

 ?>


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

        /* Style the login modal */
        .modal {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Style the modal content with increased size */
        .modal-content {
            background-color: #fff;
            padding: 40px; /* Increase padding for more space */
            border-radius: 10px; /* Increase border radius for rounded corners */
            width: 60%; /* Increase width */
            max-width: 500px; /* Set a maximum width for larger screens */
        }

        /* Close button for the modal */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <div class="first-part">
        <div class="heading">Event Management</div>
        <!-- <h1>Welcome, <?php echo $_SESSION['name']; ?></h1> -->
        <a href="logout.php">Logout</a>
    </div>
    <div class="second-third-container">
        <div class="second-part">
            <!-- Options for the second part -->
            <ul class="options">
                <li class="option-item" id="seminar">Seminar</li>
                <li class="option-item" id="Departments">Departments</li>
                <li class="option-item" id="Sports">Sports</li>
                <li class="option-item" id="Clubs">Clubs/Culturals</li>
                <li class="option-item">Others</li>
                <li class="option-item" id="create-event">Create Event</li>
                <li class="option-item" id="Event-Dashboard">Event Dashboard</li>
            </ul>
        </div>
        <div class="third-part">
            <!-- Content for the third part goes here -->
            <?php require 'index.php'?>
        </div>
    </div>
    <!-- Add this code after the existing content -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Login</h2>
            <form action="process_login.php" method="post">
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" class="login-button" value="Login">
            </form>
        </div>
    </div>
    <!-- Add this code within the <script> section in your HTML file -->

<script>
  // Function to open the login modal
  function openModal() {
    // const modal = document.getElementById('ex.php');
    // modal.style.display = 'block';
    window.location.href='mtp.php';
  }

  // Function to close the login modal
  function closeModal() {
    const modal = document.getElementById('loginModal');
    modal.style.display = 'none';
  }

  // Function to handle the login form submission
  function login() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Create an object with the user's credentials
    const userData = { email, password };

    // Send a POST request to the server's /login endpoint
    fetch('/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(userData),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          // Handle login error (e.g., display an error message)
          console.error(data.error);
        } else {
          // Handle successful login (e.g., redirect to a dashboard)
          console.log(data.message);
          // Optionally, you can redirect to a different page after login.
          // window.location.href = '/dashboard.html';
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }

  document.getElementById('create-event').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'create_event_test.html';
  });

  document.getElementById('Event-Dashboard').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'dashboard.php';
  });


  document.getElementById('seminar').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'loadseminar.php';
  });


  document.getElementById('Departments').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'dashboard.php';
  });

  document.getElementById('Sports').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'loadsport.php';
  });

  document.getElementById('Clubs').addEventListener('click', function() {
    // Redirect to the new file for creating events
    window.location.href = 'loadclub.php';
  });
</script>


</body>
</html>

<?php 

}else{

     header("Location: login_form.php");

     exit();

}

 ?>