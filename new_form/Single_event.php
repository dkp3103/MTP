<!DOCTYPE html>
<html>
<head>
    <title>Event Form</title>
    <script>
        function showEventDetails() {
            var eventType = document.getElementById("event_type").value;
            var eventDetailsContainer = document.getElementById("event_details_container");
            eventDetailsContainer.innerHTML = "";

            if (eventType === "seminar") {
                eventDetailsContainer.innerHTML = `
                    <label for="seminar_type_">Seminar Type:</label>
                    <input type="text" id="seminar_type_" name="seminar_type_">
                    <br>
                    <label for="event_title_">Event Title:</label>
                    <input type="text" id="event_title_" name="event_title_">
                    <br>
                    <label for="department_">Department:</label>
                    <input type="text" id="department_" name="department_">
                    <br>
                    <label for="start_time_">Start Time:</label>
                    <input type="datetime-local" id="start_time_" name="start_time_">
                    <br>
                    <label for="end_time_">End Time:</label>
                    <input type="datetime-local" id="end_time_" name="end_time_">
                    <br>
                    <label for="location_">Location:</label>
                    <input type="text" id="location_" name="location_">
                    <br>
                    <label for="speaker_">Speaker:</label>
                    <input type="text" id="speaker_" name="speaker_">
                    <br>
                    <label for="speaker_bio_">Speaker Biography:</label>
                    <textarea id="speaker_bio_" name="speaker_bio_" rows="4"></textarea>
                    <br>
                    <label for="speaker_affiliation_">Speaker Affiliation:</label>
                    <input type="text" id="speaker_affiliation_" name="speaker_affiliation_">
                    <br>
                    <label for="organizer_">Organizer:</label>
                    <input type="text" id="organizer_" name="organizer_">
                    <br>
                    <label for="organizer_mail_">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_" name="organizer_mail_">
                    <br>
                    <label for="approver_">Approver:</label>
                    <input type="text" id="approver_" name="approver_">
                    <br>
                    <label for="approver_mail_">Approver Mail:</label>
                    <input type="email" id="approver_mail_" name="approver_mail_">
                    <br>
                    <label for="abstract_">Abstract:</label>
                    <textarea id="abstract_" name="abstract_" rows="4"></textarea>
                `;
            } else if (eventType === "sport") {
                eventDetailsContainer.innerHTML = `
                    <label for="event_title_">Event Title:</label>
                    <input type="text" id="event_title_" name="event_title_">
                    <br>
                    <label for="sport_club_name_">Sport Club Name:</label>
                    <input type="text" id="sport_club_name_" name="sport_club_name_">
                    <br>
                    <label for="sport_name_">Sport Name:</label>
                    <input type="text" id="sport_name_" name="sport_name_">
                    <br>
                    <label for="start_date_">Start Date:</label>
                    <input type="date" id="start_date_" name="start_date_">
                    <br>
                    <label for="end_date_">End Date:</label>
                    <input type="date" id="end_date_" name="end_date_">
                    <br>
                    <label for="start_time_">Start Time:</label>
                    <input type="time" id="start_time_" name="start_time_">
                    <br>
                    <label for="end_time_">End Time:</label>
                    <input type="time" id="end_time_" name="end_time_">
                    <br>
                    <label for="location_">Location:</label>
                    <input type="text" id="location_" name="location_">
                    <br>
                    <label for="organizer_">Organizer:</label>
                    <input type="text" id="organizer_" name="organizer_">
                    <br>
                    <label for="organizer_mail_">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_" name="organizer_mail_">
                    <br>
                    <label for="approver_">Approver:</label>
                    <input type="text" id="approver_" name="approver_">
                    <br>
                    <label for="approver_mail_">Approver Mail:</label>
                    <input type="email" id="approver_mail_" name="approver_mail_">
                    <br>
                    <label for="abstract_">Abstract:</label>
                    <textarea id="abstract_" name="abstract_" rows="4"></textarea>
                `;
            } else if (eventType === "club") {
                eventDetailsContainer.innerHTML = `
                    <label for="event_title_">Event Title:</label>
                    <input type="text" id="event_title_" name="event_title_">
                    <br>
                    <label for="club_name_">Club Name:</label>
                    <input type="text" id="club_name_" name="club_name_">
                    <br>
                    <label for="start_date_">Start Date:</label>
                    <input type="date" id="start_date_" name="start_date_">
                    <br>
                    <label for="end_date_">End Date:</label>
                    <input type="date" id="end_date_" name="end_date_">
                    <br>
                    <label for="start_time_">Start Time (HH:MM):</label>
                    <input type="time" id="start_time_" name="start_time_">
                    <br>
                    <label for="end_time_">End Time (HH:MM):</label>
                    <input type="time" id="end_time_" name="end_time_">
                    <br>
                    <label for="location_">Location:</label>
                    <input type="text" id="location_" name="location_">
                    <br>
                    <label for="organizer_">Organizer:</label>
                    <input type="text" id="organizer_" name="organizer_">
                    <br>
                    <label for="organizer_mail_">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_" name="organizer_mail_">
                    <br>
                    <label for="approver_">Approver:</label>
                    <input type="text" id="approver_" name="approver_">
                    <br>
                    <label for="approver_mail_">Approver Mail:</label>
                    <input type="email" id="approver_mail_" name="approver_mail_">
                    <br>
                    <label for="abstract_">Abstract:</label>
                    <textarea id="abstract_" name="abstract_" rows="4"></textarea>
                `;
            }
        }
    </script>
</head>
<body>
    <h1>Event Form</h1>
    <form action="insert_single_event.php" method="post">
        <label for="event_type">Event Type:</label>
        <select id="event_type" name="event_type" onchange="showEventDetails()">
            <option value="none">Select</option>
            <option value="seminar">Seminar</option>
            <option value="sport">Sports</option>
            <option value="club">Club</option>
        </select>
        <div id="event_details_container">
            <!-- Event-specific fields will be displayed here dynamically -->
        </div>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
