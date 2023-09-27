<?php
// Database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "events"; 

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$event_title = $_POST['event_title'];
$no_of_events = $_POST['no_of_events'];

for ($i = 1; $i <= $no_of_events; $i++) {
    // $event_type = $_POST["event_type_${i}"];
    // Retrieve the event type from the hidden field

    // seminar fields
    $event_type = $_POST["event_type_${i}"];
   

    // sports fields 
    // $event_title_i = $_POST["event_title_${i}"];
   


    if ($event_type === "seminar") {

        $seminar_type_i = $_POST["seminar_type_${i}"];
        $event_title_i = $_POST["event_title_${i}"];
        $department_i = $_POST["department_${i}"];
        $start_time_i = $_POST["start_time_${i}"];
        $end_time_i = $_POST["end_time_${i}"];
        $location_i = $_POST["location_${i}"];
        $speaker_i = $_POST["speaker_${i}"];
        $speaker_bio_i = $_POST["speaker_bio_${i}"];
        $speaker_affiliation_i = $_POST["speaker_affiliation_${i}"];
        $organizer_i = $_POST["organizer_${i}"];
        $organizer_mail_i = $_POST["organizer_mail_${i}"];
        $approver_i = $_POST["approver_${i}"];
        $approver_mail_i = $_POST["approver_mail_${i}"];
        $abstract_i = $_POST["abstract_${i}"];

        // Insert into the 'seminar' table
        // $event_title_ = $_POST["event_title_"];
        $sql = "INSERT INTO seminar (Seminar_Type,Event_Title,Department, Start_Time, End_Time, Location, Speaker, Speaker_Biography, Speaker_Affiliation, Organizer, Organizer_Mail, Approver, Approver_Mail, Abstract)
                VALUES ('$seminar_type_i','$event_title_i','$department_i', '$start_time_i', '$end_time_i', '$location_i', '$speaker_i', '$speaker_bio_i', '$speaker_affiliation_i', '$organizer_i', '$organizer_mail_i', '$approver_i', '$approver_mail_i', '$abstract_i')";
    

        } elseif ($event_type === "sport") {


        $event_title_i = $_POST["event_title_${i}"];
        $sport_club_name_i = $_POST["sport_club_name_${i}"];
        $sport_name_i = $_POST["sport_name_${i}"];
        $start_date_i = $_POST["start_date_${i}"];
        $end_date_i = $_POST["end_date_${i}"];
        $start_time_ii = $_POST["start_time_${i}"];
        $end_time_ii = $_POST["end_time_${i}"];
        $location_i = $_POST["location_${i}"];
        $organizer_i = $_POST["organizer_${i}"];
        $organizer_mail_i = $_POST["organizer_mail_${i}"];
        $approver_i = $_POST["approver_${i}"];
        $approver_mail_i = $_POST["approver_mail_${i}"];
        $abstract_i = $_POST["abstract_${i}"];
        // Insert data into the appropriate table
        // Insert into the 'sports' table
        // $sql = "INSERT INTO sports (event_title, start_date, end_date, start_time, end_time, location, organizer, organizer_mail, approver, approver_mail, abstract)
        //         VALUES ('$event_title', '$start_date', '$end_date', '$start_time', '$end_time', '$location', '$organizer', '$organizer_mail', '$approver', '$approver_mail', '$abstract')";

        $sql = "INSERT INTO sport (Event_Title, Sport_Club_Name, Sport_Name, Start_Date, End_Date, Start_Time, End_Time, Location, Organizer, Organizer_Mail, Approver, Approver_Mail, Abstract)
        VALUES ('$event_title_i', '$sport_club_name_i', '$sport_name_i', '$start_date_i', '$end_date_i', '$start_time_ii', '$end_time_ii', '$location_i', '$organizer_i', '$organizer_mail_i', '$approver_i', '$approver_mail_i', '$abstract_i')";

    } elseif ($event_type === "club") {
        // Insert into the 'club' table
        // $sql = "INSERT INTO club (event_title, start_date, end_date, start_time, end_time, location, organizer, organizer_mail, approver, approver_mail, abstract)
        //         VALUES ('$event_title', '$start_date', '$end_date', '$start_time', '$end_time', '$location', '$organizer', '$organizer_mail', '$approver', '$approver_mail', '$abstract')";

        // $event_type = $_POST["event_type_${i}"];
        $event_title_i = $_POST["event_title_${i}"];
        $club_name_i = $_POST["club_name_${i}"];
        $start_date_i = $_POST["start_date_${i}"];
        $end_date_i = $_POST["end_date_${i}"];
        $start_time_i = $_POST["start_time_${i}"];
        $end_time_i = $_POST["end_time_${i}"];
        $location_i = $_POST["location_${i}"];
        $organizer_i = $_POST["organizer_${i}"];
        $organizer_mail_i = $_POST["organizer_mail_${i}"];
        $approver_i = $_POST["approver_${i}"];
        $approver_mail_i = $_POST["approver_mail_${i}"];
        $abstract_i = $_POST["abstract_${i}"];
    
        // Insert club data into the database
        if ($event_type === "club") {
            $sql = "INSERT INTO club (event_title, club_name, start_date, end_date, start_time, end_time, location, organizer, organizer_mail, approver, approver_mail, abstract)
                    VALUES ('$event_title_i', '$club_name_i', '$start_date_i', '$end_date_i', '$start_time_i', '$end_time_i', '$location_i', '$organizer_i', '$organizer_mail_i', '$approver_i', '$approver_mail_i', '$abstract_i')";
        }
    }

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Form Submission</title>
</head>
<body>
    <h1>Event Form Submission</h1>
    <p>Data has been successfully submitted to the database.</p>
</body>
</html>
