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
              <xs:element name="start" type="xs:Datetime" />
              <xs:element name="end" type="xs:Datetime" />
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
        <xs:element name="sport">
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
        </xs:element>
      </xs:sequence>
    </xs:complexType>
  </xs:element>
</xs:schema>
XML;

// Load the XML content
$xml = simplexml_load_string($xsd);

// Define the XML namespace
$xml->registerXPathNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

// Find the 'seminar' element
$seminarElement = $xml->xpath('//xs:element[@name="seminar"]');

// Get the child element names and types within 'seminar'
$childElements = $seminarElement[0]->xpath('//xs:element');

// // Print the child element names and types under 'seminar'
// foreach ($childElements as $element) {
//     echo 'Name: ' . $element['name'] . ', Type: ' . $element['type'] . PHP_EOL;

// foreach ($childElements as $element) {
//     echo 'Name: ' . $element['name'] . PHP_EOL;
//     echo 'Type: ' . $element['type'] .'\r\n'.PHP_EOL;
//     echo '\r\n' . PHP_EOL;

foreach ($childElements as $element) {
    echo 'Name: ' . $element['name'] . "\n";
    echo 'Type: ' . $element['type'] . "\n";
    echo "\n"; // Separate elements with an empty line
}
