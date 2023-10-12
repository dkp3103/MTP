<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management Dashboard</title>
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
    
<style>
    /* Style the event items */
    .event-item {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        max-width: 600px; 
        display: flex;
        flex-direction: column;
    }

    .event-item h3 {
        font-size: 24px;
        margin: 0;
    }

    .event-item p {
        font-size: 16px;
        margin: 0;
    }
    /* CSS to style the event details as inline-block elements */
    .event-details {
        display: block;
    }

    .event-detail {
        display: inline-block;
        margin-right: 10px; /* Add some spacing between the details */
    }

</style>



</head>
<body>
    <div class="first-part">
        <div class="heading">Event Management</div>
        <button class="login-button" onclick="openModal()">Logout</button>
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
                <li class="option-item">Create Event</li>
                <li class="option-item" onclick="loadEventDashboard()">Event Dashboard</li>
            </ul>
        </div>
        <div class="third-part" id="eventDashboard">
            <!-- Content for the event dashboard goes here -->
            <!-- Events will be displayed here dynamically -->
        </div>
    </div>

   
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
        // Function to load and display the event dashboard
        function loadEventDashboard() {
            // Send an AJAX request to fetch seminar data from the server
            fetch('http://localhost/event/getseminar.php') // Replace with the actual API endpoint
                .then(response => response.json())
                .then(data => {
                    // Handle the seminar data and render it in the third-part container
                    const eventDashboard = document.getElementById('eventDashboard');
                    eventDashboard.innerHTML = ''; // Clear existing content

                    // Loop through the seminar data and create HTML elements to display it
                    data.forEach(seminar => {
                        const seminarItem = document.createElement('div');
                        seminarItem.classList.add('event-item');

                        const seminarName = document.createElement('h3');
                        seminarName.textContent = seminar.name;

                        const detailsContainer = document.createElement('div'); // Container for date, start time, and end time
                        detailsContainer.classList.add('event-details');

                        const seminarDate = document.createElement('span');
                        seminarDate.textContent = `Date: ${seminar.date}`;
                        seminarDate.classList.add('event-detail');

                        const seminarStartTime = document.createElement('span');
                        seminarStartTime.textContent = `Start Time: ${seminar.starttime}`;
                        seminarStartTime.classList.add('event-detail');

                        const seminarEndTime = document.createElement('span');
                        seminarEndTime.textContent = `End Time: ${seminar.endtime}`;
                        seminarEndTime.classList.add('event-detail');

                        // Append elements to the details container
                        detailsContainer.appendChild(seminarDate);
                        detailsContainer.appendChild(seminarStartTime);
                        detailsContainer.appendChild(seminarEndTime);

                        // Append elements to the seminar item
                        seminarItem.appendChild(seminarName);
                        seminarItem.appendChild(detailsContainer);

                        // Append the seminar item to the event dashboard
                        eventDashboard.appendChild(seminarItem);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

    </script>
</body>
</html>
