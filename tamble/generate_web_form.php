<?php
// Define the XSD schema as a string
$xsd = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
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
      </xs:sequence>
    </xs:complexType>
  </xs:element>
</xs:schema>
XML;

// Create a SimpleXMLElement from the XSD
$element = new SimpleXMLElement($xsd);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form Example</title>
    <!-- <style>
        label {
            font-weight: bold;
            color: #333;
            margin-right: 10px;
        }
        input[type="text"], input[type="date"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style> -->

    <style>
        /* Center the div */
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* width: 100vh; */
        }

        /* Style the form */
        form {
            border: 1px solid #ccc;
            padding: 20px;
            width: 800px;
        }

        /* Style the form labels */
        label {
            display: block;
            margin-bottom: 10px;
        }

        /* Style the form inputs */
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        /* Center the submit button */
        input[type="submit"] {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <div class="center">
    <form method="POST">
        <?php
        // Find the "seminar" element
        $seminarElements = $element->xpath('//xs:element[@name="seminar"]');
        
        if (!empty($seminarElements)) {
            $seminarElement = $seminarElements[0];
            $seminarComplexType = $seminarElement->xpath('xs:complexType');
            
            if (!empty($seminarComplexType)) {
                $seminarComplexType = $seminarComplexType[0];
                $seminarSequence = $seminarComplexType->xpath('xs:sequence');
                
                if (!empty($seminarSequence)) {
                    $seminarSequence = $seminarSequence[0];
                    $seminarElements = $seminarSequence->xpath('xs:element');
                    
                    foreach ($seminarElements as $element) {
                        $name = (string)$element['name'];
                        $type = isset($element->xpath('xs:simpleType/xs:restriction')[0]['base'])
                            ? (string)$element->xpath('xs:simpleType/xs:restriction')[0]['base']
                            : '';
        
                        // Generate the form input based on element name and type
                        echo '<label for="' . $name . '">' . $name . ':</label>';
                        if ($type === 'xs:date') {
                            echo '<input type="date" name="' . $name . '" id="' . $name . '"><br>';
                        } else {
                            echo '<input type="text" name="' . $name . '" id="' . $name . '"><br>';
                        }
                    }
                }
            }
        } else {
            // Handle the case where there is no "seminar" element found in the XSD
            echo '<p>No "seminar" element found in the XSD.</p>';
        }
        ?>
        <input type="submit" value="Submit">
    </form>

  </div>
</body>
</html>
