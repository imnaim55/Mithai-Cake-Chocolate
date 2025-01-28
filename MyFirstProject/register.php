<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $middleName = $conn->real_escape_string($_POST['middleName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $age = $conn->real_escape_string($_POST['age']);
    $mobileNumber = $conn->real_escape_string($_POST['mobileNumber']);
    $email = $conn->real_escape_string($_POST['email']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO registration (first_name, middle_name, last_name, age, mobile_number, email) 
            VALUES ('$firstName', '$middleName', '$lastName', '$age', '$mobileNumber', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        // Display detailed error message
        echo "Error: " . $sql . "<br>Error details: " . $conn->error;
    }
}

$conn->close();
?>
