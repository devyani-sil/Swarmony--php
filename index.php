<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}

if(isset($_SESSION['user'])) {
    $initial = substr($_SESSION['user'], 0, 1); // Get the first letter of the username
    $initial = strtoupper($initial); // Convert to uppercase
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swarmony</title>

    <!-- <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->


    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="styles.css">


  
</head>

<body class="body-fixed">
    <!-- start of header  -->
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header-logo">
                    <a href="index.php">
                        <img src="logo.png" width="160" height="36" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="main-navigation">
                    <button class="menu-toggle"><span></span><span></span></button>
                    <nav class="header-menu">
                        <ul class="menu food-nav-menu">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#menu">Artists</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="header-right">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="header-search-form for-des">
    <input type="search" class="form-input" placeholder="Enter Location" name="search_location">
    <button type="submit">
        <i class="uil uil-search"></i>
    </button>
</form>

<!-- location filter query -->
<?php
// Establish database connection (replace with your connection code)require_once "db.php";
require_once "db.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_location"])) {
    // Get the search keyword (location) from the form
    $search_location = $_POST["search_location"];

    // Prepare SQL query to select artists based on the provided location
    $sql = "SELECT * FROM artists WHERE location LIKE '%$search_location%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Display artist details (replace with your display code)
            echo "Artist: " . $row["name"] . " - Location: " . $row["location"] . "<br>";
        }
    } else {
        echo "No artists found in the specified location.";
    }
}
?>


   <!-- <a href="javascript:void(0)" class="header-btn">
                                <i class="uil uil-user-md"></i>
                            </a>   -->

                        <a href="#" class="header-btn" id="addIcon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="uil uil-plus-circle"></i> <!-- Add icon -->
                        </a>
                        <a href="logout.php"class="header-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header ends  -->

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content" style="margin-left: 15px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Your Portfolio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="artistType" class="form-label">Artist Type</label>
                <select class="form-select" id="artistType" name="artistType" required>
                    <option value="">Select Artist Type</option>
                    <option value="Singers">Singers</option>
                    <option value="Guitarists">Guitarists</option>
                    <option value="Rappers">Rappers</option>
                    <option value="Songwriters">Songwriters</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="mb-3">
                <label for="shortDescription" class="form-label">Pitch Yourself</label>
                <textarea class="form-control" id="shortDescription" name="sdes" rows="4" maxlength="100" required></textarea>
            </div>
            <div class="mb-3">
                <label for="longDescription" class="form-label">Tell Potential Collaborators Your Story</label>
                <textarea class="form-control" id="longDescription" name="description" rows="5" maxlength="1000" required></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Experience</label>
                <input type="text" class="form-control" id="experience" name="experience" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image (Dimensions should be equal)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Additional buttons or actions -->
      </div>
    </div>
  </div>
</div>


<!-- Modal ends -->


    <div id="viewport">
        <div id="js-scroll-content">
            <section class="main-banner" id="home">
                <div class="js-parallax-scene">
                    <div class="banner-shape-1 w-100" data-depth="0.30">
                        <img src="assets/images/PPP.png" alt="">
                    </div>
                   
                  
                </div>
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Welcome to
                                        <span>Collaboration</span>
                                        world.
                                    </h1>
                                    <p>At SwarMony, we believe in the power of musical harmony to connect individuals across the globe
                                    SwarMony offers a haven 
                                    where artists of all stripes can come together to weave their sonic tapestries. Join us on this extraordinary journey, 
                                    where every beat is a testament to the power of collaboration and the beauty of diversity.
                                    </p>
                                    <div class="banner-btn mt-4">
                                        <a href="#menu" class="sec-btn">Explore</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img" style="background-image: url(assets/images/main-b.jpeg);">
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            

            <section class="about-sec section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">About Us</p>
                                <h2 class="h2-title">Discover our <span>Story</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="assets/images/title-shape.svg" alt="">
                                </div>
                                <p>"At SwarMony, we believe in the power of musical harmony to connect individuals across the globe. Our platform serves as a vibrant hub where musicians from diverse backgrounds come together to create beautiful melodies and forge meaningful connections. Inspired by the rich tradition of Indian music, 'Swar' representing the essence of musical notes blends seamlessly with 'Mony', symbolizing unity and community. Whether you're a seasoned performer or an aspiring artist, SwarMony provides the perfect environment to collaborate, share ideas, and celebrate the universal language of music. Join us on this harmonious journey, where every note resonates with the spirit of collaboration and creativity."  </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 m-auto">
                            <div class="about-video">
                                <div class="about-video-img" style="background-image: url(assets/images/about.jpeg);">
                                </div>
                                <div class="play-btn-wp">
                                    <a href="assets/images/video.mp4" data-fancybox="video" class="play-btn">
                                        <i class="uil uil-play"></i>

                                    </a>
                                    <span>Our collaboration make people grove!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section style="background-image: url(assets/images/Music1.jpg);" class="our-menu section bg-light repeat-img" id="menu" >
        <div class="sec-wp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title text-center mb-5">
                            <p class="sec-sub-title mb-3">Artists</p>
                            <h2 class="h2-title"> Gives <span>our life harmony</span></h2>
                            <div class="sec-title-shape mb-4">
                                <img src="assets/images/title-shape.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-tab-wp">
                    <div class="row">
                        <div class="col-lg-12 m-auto">
                            <div class="menu-tab text-center">
                                <ul class="filters">
                                    <div class="filter-active"></div>
                                    <li class="filter" data-filter=".all, .Singers, .Rappers, .Guitarists , .Songwriters">
                                        All
                                    </li>
                                    <li class="filter" data-filter=".Singers">
                                        Singers
                                    </li>
                                    <li class="filter" data-filter=".Guitarists">
                                        Guitarists
                                    </li>
                                    <li class="filter" data-filter=".Rappers">
                                        Rappers
                                    </li>
                                    <li class="filter" data-filter=".Songwriters">
                                        Songwriters
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-list-row">
                    <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                        <!-- PHP code goes here -->
                        <?php
                        require('db.php');
                        $query = "SELECT * FROM artists";
$result = mysqli_query($conn, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results
    while ($row = mysqli_fetch_assoc($result)) {
        
?>
         <div class="col-lg-4 col-sm-6 dish-box-wp <?php echo $row['artistType']; ?>" data-cat="<?php echo $row['artistType']; ?>" onclick="redirectToArtistDetail(<?php echo $row['id']; ?>)">
            <div class="dish-box text-center">
                <div class="dist-img">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                </div>
                <div class="dish-title">
                    <h3 class="h3-title"><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['sdes']; ?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo $row['location']; ?></p>

                </div>
            </div>
        </div>
<?php
    }
} else {
    // If no artists found in the database
    echo "No artists found.";
}

// Close the database connection
mysqli_close($conn);
                        ?>
                    </div>
                </div>

                <script>
function redirectToArtistDetail(artistId) {
    window.location.href = 'detail.php?id=' + artistId;
}
</script>
            </div>
        </div>
        
    </section>

            <section class="two-col-sec section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="sec-img mt-5">
                                <img src="assets/images/pizza.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="sec-text">
                                <h2 class="xxl-title">Tune In | Collab | Connect</h2>
                                <p>SwarMony is more than just a platform; it's a vibrant community where the world's musical souls converge to 
                                    create something truly magical. Rooted in the ancient melodies of India, 'Swar' dances in harmony with 'Mony', 
                                    embodying the essence of unity and togetherness.Whether you're a virtuoso or a beginner, SwarMony offers a haven 
                                    where artists of all stripes can come together to weave their sonic tapestries. Join us on this extraordinary journey, 
                                    where every beat is a testament to the power of collaboration and the beauty of diversity.</p>

                                    
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           

            <section class="book-table section bg-light">
                <!-- <div class="book-table-shape">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div>

                <div class="book-table-shape book-table-shape2">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div> -->

                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Contact</p>
                                    <h2 class="h2-title">Contact Details</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="book-table-info">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Monday to Thrusday</h3>
                                        <p>9:00 am - 22:00 pm</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="call-now text-center">
                                        <i class="uil uil-phone"></i>
                                        <a href="tel:+91-8866998866">+91 - 8866998866</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Friday to Sunday</h3>
                                        <p>11::00 am to 20:00 pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="gallery">
                            <div class="col-lg-10 m-auto">
                                <div class="book-table-img-slider" id="icon">
                                    <div class="swiper-wrapper">
                                        <a href="assets/images/band2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band2.jpg)"></a>
                                        <a href="assets/images/band1.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band1.jpg)"></a>
                                        <a href="assets/images/band3.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band3.jpg)"></a>
                                        <a href="assets/images/band4.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band4.jpg)"></a>
                                        <a href="assets/images/band5.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band5.jpg)"></a>
                                        <a href="assets/images/band6.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band6.jpg)"></a>
                                        <a href="assets/images/band7.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band7.jpg)"></a>
                                        <a href="assets/images/band8.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/band8.jpg)"></a>
                                    </div>

                                    <div class="swiper-button-wp">
                                        <div class="swiper-button-prev swiper-button">
                                            <i class="uil uil-angle-left"></i>
                                        </div>
                                        <div class="swiper-button-next swiper-button">
                                            <i class="uil uil-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </section>

            <section class="our-team section">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Our Team</p>
                                    <h2 class="h2-title">Meet our Company</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row team-slider">
                            <div class="swiper-wrapper">
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/dev.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Devraj Gehlot</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/chirag.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Chirag Chandorikar</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/laad.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Devansh Laad</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/devyani.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Devyani Sil</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="swiper-button-wp">
                                <div class="swiper-button-prev swiper-button">
                                    <i class="uil uil-angle-left"></i>
                                </div>
                                <div class="swiper-button-next swiper-button">
                                    <i class="uil uil-angle-right"></i>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials section bg-light">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">What they say</p>
                                    <h2 class="h2-title">What our collaborators <span>say about us</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="testimonials-img">
                                    <img src="assets/images/testiminy1.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t1.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:85%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Nilay Hirpara
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t2.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:80%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Ravi Kumawat
                                                </h3>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t3.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:89%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Navnit Kumar
                                                </h3>
                                                <p>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/t4.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:100%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Somyadeep Bhowmik
                                                </h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
            </section>

            <section class="faq-sec section-repeat-img" style="background-image: url(assets/images/Faq1.jpg);">
               
            <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">faqs</p>
                                    <h2 class="h2-title">Frequently <span>asked questions</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-row">
                            <div class="faq-box">
                                <h4 class="h4-title">What are the login hours?</h4>
                                <p>We welcome all the users 24/7 on our site. </p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Is the Feature of chatbox reliable?</h4>
                                <p>Absolutely, the chatbox feature is reliable. We've rigorously tested it to ensure consistent performance,
                                   guaranteeing a smooth and efficient communication experience every time.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Can we make our own portfolio?</h4>
                                <p>Yes, definetely you can create your profile and help us to make our journey more rythematic.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Will you provide videos for the concert of a perticular artist?</h4>
                                <p>Yes, we are working on it and soon we wil provide the feature. Stay tuned.....</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Are there any subscriptions for this website?</h4>
                                <p>Not yet , but in future there will be some premium features that will require subsription.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">What is your main motive?</h4>
                                <p>
                                    "Harmonizing Hearts, Connecting Cultures: Where Melodies Merge and Souls Unite." </p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>


            <br>
            <br>
            <div class="sec-title text-center mb-5">
                <!-- <p class="sec-sub-title mb-3">Connect</p> -->
                <h2 class="h2-title">Connect With us    </h2>
                <div class="sec-title-shape mb-4">
                    <img src="assets/images/title-shape.svg" alt="">
                </div>
            </div>

<br>

            <!-- footer starts  -->
            <footer class="site-footer" id="contact">
                <div class="top-footer section">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-info">
                                        <div class="footer-logo">
                                            <a href="index.html">
                                                <img src="logo.png" alt="">
                                            </a>
                                        </div>
                                        <p>TUNE IN | COLLAB | CONNECT
                                        </p>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-github-alt"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="footer-flex-box">
                                        <div class="footer-table-info">
                                            <h3 class="h3-title">open hours</h3>
                                            <ul>
                                                <li><i class="uil uil-clock"></i> We welcome all the users 24/7 on 
                                                    our site.</li>
                                                
                                            </ul>
                                        </div>
                                        <div class="footer-menu food-nav-menu">
                                            <h3 class="h3-title">Links</h3>
                                            <ul class="column-2">
                                                <li>
                                                    <a href="#home" class="footer-active-menu">Home</a>
                                                </li>
                                                <li><a href="#about">About</a></li>
                                                <li><a href="#artists">Artists</a></li>
                                                <li><a href="#gallery">Gallery</a></li>
                                                <!-- <li><a href="#connect">Connect</a></li> -->
                                                <li><a href="#contact">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu">
                                            <h3 class="h3-title">Company</h3>
                                            <ul>
                                                <li><a href="#">Terms & Conditions</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Cookie Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="copyright-text">
                                    <p>Copyright &copy; 2024 <span class="name">SwarMony.</span>All Rights Reserved.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
                    </div>
                </div>
            </footer>



        </div>
    </div>

    <!-- jquery  -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="main.js"></script>
    <!-- <script src="main2.js"></script> -->
</body>

</html>