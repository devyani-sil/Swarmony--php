<?php
// Database connection
require_once "db.php";

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $artistType = mysqli_real_escape_string($conn, $_POST['artistType']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $sdes = mysqli_real_escape_string($conn, $_POST['sdes']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);

    $uploadDir = 'assets/images/'; // Directory where uploaded images will be stored
    $targetFile = $uploadDir . basename($_FILES['image']['name']); 
    // Insert data into the database
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    $query = "INSERT INTO artists (artistType, name, location, sdes, description, email,image,experience) VALUES ('$artistType', '$name', '$location', '$sdes','$description','$email','$targetFile','$experience')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success message
        echo "<script>alert('Portfolio created successfully!');</script>";
        echo "<script>window.location.href = 'index.php';</script>"; // Redirect to homepage or any other page
    } else {
        // Error message
        echo "Error: " . mysqli_error($conn);
    }
    } else {
    // Error message if file upload fails
    echo "Error uploading image.";
}
}

// Close connection
mysqli_close($conn);
?>
