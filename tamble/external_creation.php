<?php

// Define the URL where the XSD is located
$xsdUrl = 'http://localhost/tamble/seminar.xsd'; // Replace with the actual URL of your XSD

// Load the XSD content from the external source
$xsd = file_get_contents($xsdUrl);

if ($xsd === false) {
    die("Failed to load the XSD file");
}

// Load the XML content
$xml = simplexml_load_string($xsd);

// Define the XML namespace
$xml->registerXPathNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

// Find the 'seminar' element
$seminarElement = $xml->xpath('//xs:element[@name="seminar"]');

// Get the child element names and types within 'seminar'
$childElements = $seminarElement[0]->xpath('//xs:element');

// Initialize variables for table name and columns
$tableName = "dynamic_table_3";
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

    $columns[] = "$name $sqlType NOT NULL";
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
