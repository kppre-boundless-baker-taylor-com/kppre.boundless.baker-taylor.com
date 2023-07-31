<?php
// Ensure the script is accessed via a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $fullName = $_POST["fullName"];
    $libraryName = $_POST["libraryName"];
    $libraryCardNo = $_POST["libraryCardNo"];
    $emailAddress = $_POST["emailAddress"];
    $contactNumber = $_POST["contactNumber"];

    // Sanitize the data (use proper sanitization functions to prevent potential security issues)
    $fullName = htmlspecialchars($fullName);
    $libraryName = htmlspecialchars($libraryName);
    $libraryCardNo = htmlspecialchars($libraryCardNo);
    $emailAddress = htmlspecialchars($emailAddress);
    $contactNumber = htmlspecialchars($contactNumber);

    // Create the data string to be stored in the text file
    $data = "Full Name: " . $fullName . "\n" .
            "Library Name: " . $libraryName . "\n" .
            "Library Card No.: " . $libraryCardNo . "\n" .
            "Email Address: " . $emailAddress . "\n" .
            "Contact Number: " . $contactNumber . "\n\n";

    // Path to the text file
    $filePath = "credentials.txt";

    // Open the file in append mode and write the data
    $file = fopen($filePath, "a");
    if ($file) {
        fwrite($file, $data);
        fclose($file);
        echo "Data stored successfully.";
    } else {
        echo "Error: Unable to open the file.";
    }
}
?>
