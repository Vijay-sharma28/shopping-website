<?php
// Database configuration
$host = 'localhost';  // Database host
$username = 'root';   // Database username (default for XAMPP is 'root')
$password = '';       // Database password (default for XAMPP is empty)
$database = 'shopping_project'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $order_number = $conn->real_escape_string($_POST['order-number']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare SQL query to insert data
    $sql = "INSERT INTO contact (name, email, order_number, subject, message) 
            VALUES ('$name', '$email', '$order_number', '$subject', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for contacting us! We will get back to you shortly.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
