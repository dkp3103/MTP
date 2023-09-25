<!DOCTYPE html>
<html>
<head>
    <title>Event Form</title>
    <script>
        function showEventFields() {
            var numEvents = parseInt(document.getElementById("no_of_events").value);
            var eventFieldsContainer = document.getElementById("event_fields_container");
            eventFieldsContainer.innerHTML = "";

            for (var i = 1; i <= numEvents; i++) {
                var eventFieldSet = document.createElement("fieldset");
                eventFieldSet.innerHTML = `<legend>Event ${i}</legend>
                    <label for="event_type_${i}">Event Type:</label>
                    <select id="event_type_${i}" name="event_type_${i}" onchange="showEventDetails(${i})">
                        <option value="none">Select</option>
                        <option value="seminar">Seminar</option>
                        <option value="sport">Sports</option>
                        <option value="club">Club</option>
                    </select>
                    <div id="event_details_${i}"></div>`;

                eventFieldsContainer.appendChild(eventFieldSet);
            }
        }

        function showEventDetails(eventNumber) {
            var eventType = document.getElementById(`event_type_${eventNumber}`).value;
            var eventDetailsContainer = document.getElementById(`event_details_${eventNumber}`);
            eventDetailsContainer.innerHTML = "";

            if (eventType === "seminar") {
                eventDetailsContainer.innerHTML = `
                    <label for="event_title_${eventNumber}">Event Title:</label>
                    <input type="text" id="event_title_${eventNumber}" name="event_title_${eventNumber}">
                    <br>
                    <label for="start_time_${eventNumber}">Start Time:</label>
                    <input type="datetime-local" id="start_time_${eventNumber}" name="start_time_${eventNumber}">
                    <br>
                    <label for="end_time_${eventNumber}">End Time:</label>
                    <input type="datetime-local" id="end_time_${eventNumber}" name="end_time_${eventNumber}">
                    <br>
                    <label for="location_${eventNumber}">Location:</label>
                    <input type="text" id="location_${eventNumber}" name="location_${eventNumber}">
                    <br>
                    <label for="speaker_${eventNumber}">Speaker:</label>
                    <input type="text" id="speaker_${eventNumber}" name="speaker_${eventNumber}">
                    <br>
                    <label for="speaker_bio_${eventNumber}">Speaker Biography:</label>
                    <textarea id="speaker_bio_${eventNumber}" name="speaker_bio_${eventNumber}" rows="4"></textarea>
                    <br>
                    <label for="speaker_affiliation_${eventNumber}">Speaker Affiliation:</label>
                    <input type="text" id="speaker_affiliation_${eventNumber}" name="speaker_affiliation_${eventNumber}">
                    <br>
                    <label for="organizer_${eventNumber}">Organizer:</label>
                    <input type="text" id="organizer_${eventNumber}" name="organizer_${eventNumber}">
                    <br>
                    <label for="organizer_mail_${eventNumber}">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_${eventNumber}" name="organizer_mail_${eventNumber}">
                    <br>
                    <label for="approver_${eventNumber}">Approver:</label>
                    <input type="text" id="approver_${eventNumber}" name="approver_${eventNumber}">
                    <br>
                    <label for="approver_mail_${eventNumber}">Approver Mail:</label>
                    <input type="email" id="approver_mail_${eventNumber}" name="approver_mail_${eventNumber}">
                    <br>
                    <label for="abstract_${eventNumber}">Abstract:</label>
                    <textarea id="abstract_${eventNumber}" name="abstract_${eventNumber}" rows="4"></textarea>
                `;
            } else if (eventType === "sport") {
                eventDetailsContainer.innerHTML = `
                    <label for="event_title_${eventNumber}">Event Title:</label>
                    <input type="text" id="event_title_${eventNumber}" name="event_title_${eventNumber}">
                    <br>
                    <label for="sport_club_name_${eventNumber}">Sport Club Name:</label>
                    <input type="text" id="sport_club_name_${eventNumber}" name="sport_club_name_${eventNumber}">
                    <br>
                    <label for="sport_name_${eventNumber}">Sport Name:</label>
                    <input type="text" id="sport_name_${eventNumber}" name="sport_name_${eventNumber}">
                    <br>
                    <label for="start_date_${eventNumber}">Start Date:</label>
                    <input type="date" id="start_date_${eventNumber}" name="start_date_${eventNumber}">
                    <br>
                    <label for="end_date_${eventNumber}">End Date:</label>
                    <input type="date" id="end_date_${eventNumber}" name="end_date_${eventNumber}">
                    <br>
                    <label for="start_time_${eventNumber}">Start Time:</label>
                    <input type="time" id="start_time_${eventNumber}" name="start_time_${eventNumber}">
                    <br>
                    <label for="end_time_${eventNumber}">End Time:</label>
                    <input type="time" id="end_time_${eventNumber}" name="end_time_${eventNumber}">
                    <br>
                    <label for="location_${eventNumber}">Location:</label>
                    <input type="text" id="location_${eventNumber}" name="location_${eventNumber}">
                    <br>
                    <label for="organizer_${eventNumber}">Organizer:</label>
                    <input type="text" id="organizer_${eventNumber}" name="organizer_${eventNumber}">
                    <br>
                    <label for="organizer_mail_${eventNumber}">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_${eventNumber}" name="organizer_mail_${eventNumber}">
                    <br>
                    <label for="approver_${eventNumber}">Approver:</label>
                    <input type="text" id="approver_${eventNumber}" name="approver_${eventNumber}">
                    <br>
                    <label for="approver_mail_${eventNumber}">Approver Mail:</label>
                    <input type="email" id="approver_mail_${eventNumber}" name="approver_mail_${eventNumber}">
                    <br>
                    <label for="abstract_${eventNumber}">Abstract:</label>
                    <textarea id="abstract_${eventNumber}" name="abstract_${eventNumber}" rows="4"></textarea>
                `;
            } else if (eventType === "club") {
                eventDetailsContainer.innerHTML = `
                    <label for="event_title_${eventNumber}">Event Title:</label>
                    <input type="text" id="event_title_${eventNumber}" name="event_title_${eventNumber}">
                    <br>
                    <label for="club_name_${eventNumber}">Club Name:</label>
                    <input type="text" id="club_name_${eventNumber}" name="club_name_${eventNumber}">
                    <br>
                    <label for="start_date_${eventNumber}">Start Date:</label>
                    <input type="date" id="start_date_${eventNumber}" name="start_date_${eventNumber}">
                    <br>
                    <label for="end_date_${eventNumber}">End Date:</label>
                    <input type="date" id="end_date_${eventNumber}" name="end_date_${eventNumber}">
                    <br>
                    <label for="start_time_${eventNumber}">Start Time (HH:MM):</label>
                    <input type="time" id="start_time_${eventNumber}" name="start_time_${eventNumber}">
                    <br>
                    <label for="end_time_${eventNumber}">End Time (HH:MM):</label>
                    <input type="time" id="end_time_${eventNumber}" name="end_time_${eventNumber}">
                    <br>
                    <label for="location_${eventNumber}">Location:</label>
                    <input type="text" id="location_${eventNumber}" name="location_${eventNumber}">
                    <br>
                    <label for="organizer_${eventNumber}">Organizer:</label>
                    <input type="text" id="organizer_${eventNumber}" name="organizer_${eventNumber}">
                    <br>
                    <label for="organizer_mail_${eventNumber}">Organizer Mail:</label>
                    <input type="email" id="organizer_mail_${eventNumber}" name="organizer_mail_${eventNumber}">
                    <br>
                    <label for="approver_${eventNumber}">Approver:</label>
                    <input type="text" id="approver_${eventNumber}" name="approver_${eventNumber}">
                    <br>
                    <label for="approver_mail_${eventNumber}">Approver Mail:</label>
                    <input type="email" id="approver_mail_${eventNumber}" name="approver_mail_${eventNumber}">
                    <br>
                    <label for="abstract_${eventNumber}">Abstract:</label>
                    <textarea id="abstract_${eventNumber}" name="abstract_${eventNumber}" rows="4"></textarea>
                `;
            }
        }
    </script>
</head>
<body>
    <h1>Event Form</h1>
    <form>
        <label for="event_title">Event Title:</label>
        <input type="text" id="event_title" name="event_title" required>
        <br>
        <label for="no_of_events">Number of Events:</label>
        <input type="number" id="no_of_events" name="no_of_events" min="1" oninput="showEventFields()">
        <div id="event_fields_container">
            <!-- Event fields will be displayed here dynamically -->
        </div>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>