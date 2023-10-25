<?php

// Define the XML content (XSD)
$xsd = <<<XML
<xs:schema attributeFormDefault="unqualified" elementFormDefault="qualified" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:element name="events">
    <xs:complexType mixed="true">
      <xs:sequence>
        <xs:element maxOccurs="unbounded" name="seminar">
          <xs:complexType mixed="true">
            <xs:sequence>
              <xs:element name="Seminar_Type" type="xs:string" />
              <xs:element name="title" type="xs:string" />
              <xs:element name="Department" type="xs:string" />
              <xs:element name="start" type="xs:date" />
              <xs:element name="end" type="xs:date" />
              <xs:element name="Location" type="xs:string" />
              <xs:element name="Speaker" type="xs:string" />
              <xs:element name="Speaker_Biography" type="xs:string" />
              <xs:element name="Speaker_Affiliation" type="xs:string" />
              <xs:element name="Organizer" type="xs:string" />
              <xs:element name="Organizer_Mail" type="xs:string" />
              <xs:element name="Approver" type="xs:string" />
              <xs:element name="Approver_Mail" type="xs:string" />
              <xs:element name="Abstract" type="xs:string" />
            </xs:sequence>
          </xs:complexType>
        </xs:element>
        <!-- <xs:element name="sport">
          <xs:complexType mixed="true">
            <xs:sequence>
              <xs:element name="Event_Title" type="xs:string" />
              <xs:element name="Sport_Club_Name" type="xs:string" />
              <xs:element name="Sport_Name" type="xs:string" />
              <xs:element name="Start_Date" type="xs:string" />
              <xs:element name="End_Date" type="xs:string" />
              <xs:element name="Start_Time" type="xs:time" />
              <xs:element name="End_Time" type="xs:time" />
              <xs:element name="Location" type="xs:string" />
              <xs:element name="Organizer" type="xs:string" />
              <xs:element name="Organizer_Mail" type="xs:string" />
              <xs:element name="Approver" type="xs:string" />
              <xs:element name="Approver_Mail" type="xs:string" />
              <xs:element name="Abstract" type="xs:string" />
            </xs:sequence>
          </xs:complexType>
        </xs:element> -->
      </xs:sequence>
    </xs:complexType>
  </xs:element>
</xs:schema>
XML;


// // Load the XML content
// $xml = simplexml_load_string($xsd);

// // Define the XML namespace
// $xml->registerXPathNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

// // Find the 'seminar' element
// $seminarElement = $xml->xpath('//xs:element[@name="seminar"]');

// // Get the child element names and types within 'seminar'
// $childElements = $seminarElement[0]->xpath('//xs:element');

// // Initialize variables for table name and columns
// $tableName = "seminar";
// $columns = [];

// // Iterate through child elements and build columns
// foreach ($childElements as $element) {
//     $name = $element['name'];
//     $type = $element['type'];

//     // Define SQL data types based on XSD types (adjust as needed)
//     $sqlType = 'VARCHAR(255)'; // Default to VARCHAR(255)
//     if ($type == 'xs:string') {
//         $sqlType = 'VARCHAR(255)';
//     } elseif ($type == 'xs:int') {
//         $sqlType = 'INT';
//     } elseif ($type == 'xs:date') {
//         $sqlType = 'DATE';
//     } // Add more type mappings as needed

//     $columns[] = "$name $sqlType NOT NULL";
// }

// // Combine the columns into the SQL CREATE TABLE query
// $sql = "CREATE TABLE $tableName (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     " . implode(",\n    ", $columns) . "
// )";

// // Database connection settings
// $servername = "localhost"; // Change to your database server
// $username = "root"; // Change to your database username
// $password = ""; // Change to your database password
// $dbname = "test"; // Change to your database name

// // Create a database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Execute the SQL query to create the table
// if ($conn->query($sql) === TRUE) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// // Close the database connection
// $conn->close();



// Load the XML content
$xml = simplexml_load_string($xsd);

// Define the XML namespace
$xml->registerXPathNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

// Find the 'seminar' element
$seminarElement = $xml->xpath('//xs:element[@name="seminar"]');

// Get the child element names and types within 'seminar'
$childElements = $seminarElement[0]->xpath('//xs:element');

// Initialize variables for table name and columns
$tableName = "dynamic_table_1";
$columns = [];

// Iterate through child elements and build columns
foreach ($childElements as $element) {
    $name = $element['name'];
    $type = $element['type'];

    // Define SQL data types based on XSD types (adjust as needed)
    $sqlType = 'VARCHAR(255)'; // Default to VARCHAR(255)
    if ($type == 'xs:string') {
        $sqlType = 'VARCHAR(255)';
    } elseif ($type == 'xs:int') {
        $sqlType = 'INT';
    } elseif ($type == 'xs:date') {
        $sqlType = 'DATE';
    } // Add more type mappings as needed

    // Append a unique suffix to avoid duplicate column names
    $uniqueName = generateUniqueColumnName($name, $columns);

    $columns[] = "$uniqueName $sqlType NOT NULL";
}

// Combine the columns into the SQL CREATE TABLE query
$sql = "CREATE TABLE $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    " . implode(",\n    ", $columns) . "
)";

// Database connection settings
$servername = "localhost"; // Change to your database server
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "test"; // Change to your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the SQL query to create the table
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();

// Function to generate a unique column name
function generateUniqueColumnName($name, $existingColumns) {
    $uniqueName = $name;
    $suffix = 1;
    while (in_array($uniqueName, $existingColumns)) {
        $uniqueName = $name . '_' . $suffix;
        $suffix++;
    }
    return $uniqueName;
}