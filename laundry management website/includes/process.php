<?php
// Database connection credentials
$host = "localhost"; // Your MySQL host (e.g., localhost)
$user = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "test"; // Your MySQL database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $pickupDate = $_POST['pickupDate'];
    $pickupTime = $_POST['pickupTime'];
    $dropoffDate = $_POST['dropoffDate'];
    $dropoffTime = $_POST['dropoffTime'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $landmarks = $_POST['landmarks'];
    $location = $_POST['location'];

    // Prepare SQL statement to insert form data
    $stmt = $conn->prepare("INSERT INTO pickup_requests (pickup_date, pickup_time, dropoff_date, dropoff_time, address_line1, address_line2, city, landmarks, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $pickupDate, $pickupTime, $dropoffDate, $dropoffTime, $addressLine1, $addressLine2, $city, $landmarks, $location);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "<script>alert('Data successfully inserted'); window.location.href = 'index.html';</script>"; // Redirect back to the homepage after successful insertion
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>