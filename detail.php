<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Details</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .custom-navbar {
            background-color: gray;
        }

        .custom-navbar-brand, .custom-navbar-nav .custom-nav-link {
            color: black;
        }

        .custom-navbar-nav {
            margin-left: auto; /* Align navbar items to the right */
        }

        .custom-nav-link {
            color: #fff;
        }

        .nav-item {
            margin-left: 20px; /* Adjust margin between navbar items */
        }

        .custom-artist-details {
            max-width: 1150px; /* Increase the maximum width if needed */
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start; /* Align items at the start (top) of the flex container */
        }

        .custom-artist-details img {
            flex: 0 0 200px; /* Set the image width */
            height: auto;
            border-radius: 10px;
            margin-right: 20px; /* Add spacing between the image and details */
        }

        .custom-artist-details div {
            flex-grow: 1; /* Allow details to grow and fill available space */
        }

        .custom-artist-details h2,
        .custom-artist-details p {
            margin: 0 0 10px 0; /* Adjust margins to increase spacing between texts */
            color: #333; /* Adjust text color */
            font-size: 18px; /* Increase font size */
            line-height: 1.5; /* Increase line height for better readability */
        }

        .custom-artist-details p:last-child {
            margin-bottom: 0; /* Remove bottom margin from the last paragraph */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand custom-navbar-brand" href="index.php">
                <img src="logo.png" alt="Logo" width="160" height="36" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link custom-nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Artist Details Section -->
    <?php
        // Include database connection code
        require('db.php');

        // Check if artist ID is provided in the URL
        if (isset($_GET['id'])) {
            // Retrieve artist ID from the URL
            $artist_id = $_GET['id'];

            // Prepare SQL query to retrieve artist information based on ID
            $query = "SELECT * FROM artists WHERE id = $artist_id";
            $result = mysqli_query($conn, $query);

            // Check if artist record exists
            if (mysqli_num_rows($result) > 0) {
                // Fetch artist details
                $artist = mysqli_fetch_assoc($result);

                // Display artist details
                ?>
                <div class="custom-artist-details">
                    <img src="<?php echo $artist['image']; ?>" alt="<?php echo $artist['name']; ?>">
                    <div>
                        <h1><?php echo $artist['name']; ?></h1>
                        <p><strong>Location:</strong> <?php echo $artist['location']; ?></p>
                        <p><?php echo $artist['description']; ?></p>
                        <p><strong>Experience:</strong> <?php echo $artist['experience']; ?></p>
                        <p><strong>Contact:</strong> <?php echo $artist['email']; ?></p>
                    </div>
                </div>
                <?php
            } else {
                // If artist not found
                echo "Artist not found.";
            }
        } else {
            // If artist ID is not provided in the URL
            echo "Artist ID not provided.";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>

    <!-- Bootstrap JS CDN (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.2/js/bootstrap.bundle.min.js" integrity="sha384-+3mJCzjoqmcFxlz1gA8FX3SsFkD4O/5zC9rQK/6v1gDjIsqz4FS+YO5fCk8cny5v" crossorigin="anonymous"></script>
</body>
</html>
