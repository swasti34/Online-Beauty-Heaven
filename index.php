<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <title>Online Beauty Heaven | Home Page</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        /* CSS for the slider */
        .css-slider {
            position: relative;
            width: 100vw; /* Full viewport width */
            height: 100vh; /* Full viewport height */
            overflow: hidden;
            background-color:black; /* Light pink background */
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center; /* Center content vertically */
            justify-content: space-between; /* Space between text and image */
        }

        .banner-text {
            flex: 1;
            padding: 20px; /* Adjust padding as needed */
            color: white; /* Adjust text color as needed */
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left; /* Align text to the left */
            background-color: rgba(0, 0, 0, 0.5); /* Optional background color for readability */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Adding shadow for depth */
            border-radius: 10px; /* Rounded corners for the text block */
        }

        .image-container {
            flex: 1;
            height: 100%; /* Full height of the container */
            overflow: hidden;
            display: flex; /* Ensures image is centered if needed */
            align-items: center; /* Center image vertically */
            justify-content: center; /* Center image horizontally */
        }

        /* Style for the image */
        .image-container img {
            width: 100%; /* Full width of the container */
            height: 90%; /* Adjust height for better display */
            object-fit: cover; /* Cover the container while maintaining aspect ratio */
            display: block; /* Ensure image is displayed as block element */
            transition: transform 0.5s ease-in-out; /* Smooth zoom effect */
        }

        .image-container:hover img {
            transform: scale(1.1); /* Zoom effect on hover */
        }

        /* Hover effects for cards */
        .grids-content .column {
            transition: transform 0.3s ease;
        }

        .grids-content .column:hover {
            transform: scale(1.05); /* Slight zoom effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
        }
        .color-2 {
    background-color: #e0f7fa; /* Light blue background */
    padding: 20px; /* Optional padding for better spacing */
    border-radius: 10px; /* Optional rounded corners */
}

        /* Button Styling */
        .action-button, .btn.logo-button {
            background: linear-gradient(45deg, #ff6f61, #de7f7f); /* Gradient background */
            color: black;
            border-radius: 30px; /* Rounded corners */
            padding: 10px 20px;
            border: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .action-button:hover, .btn.logo-button:hover {
            background: linear-gradient(45deg, #de7f7f, #ff6f61); /* Inverted gradient on hover */
            transform: scale(1.05); /* Slight zoom effect */
        }

        /* Section Backgrounds */
        .section-bg {
            background: url('assets/images/8.jpg') no-repeat center center/cover; /* Background image */
            padding: 50px 0;
            color: white;
        }

        .section-bg h3 {
            color: #fff; /* Ensure text is readable on background */
        }

        /* Responsive Design Features */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .banner-text, .image-container {
                width: 100%;
                text-align: center;
            }

            .image-container img {
                width: 100%;
                height: auto;
            }
        }

        /* Social Media Icons */
        .social-media {
            text-align: center;
            margin: 20px 0;
        }
       .row {
    display: flex; /* Use Flexbox for layout */
   
   
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
}
        .social-icon {
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: #ff6f61; /* Change color on hover */
        }
        .column2 {
    flex: 1; /* Allow columns to grow equally */
    min-width: 300px; /* Ensure a minimum width for smaller screens */
    max-width: 48%; /* Ensure they don’t exceed half the row */
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.5); /* Optional background for readability */
    border-radius: 10px; /* Rounded corners for the columns */
    transition: transform 0.3s ease; /* Smooth scale transition */
    
}
.column2:hover {
    transform: scale(1.05); /* Scale effect on hover */
}
.w3l-hero-headers-9 .container {
    display: flex; /* Use flexbox for layout */
    justify-content: space-between; /* Space between images */
    position: relative; /* Set position relative for positioning child elements */
    height: 100vh; /* Set height of the slider */
}

.image-container {
    flex: 1; /* Allow containers to grow equally */
    overflow: hidden; /* Hide overflow to prevent images from extending outside their container */
}

.image-container img {
    width: 100%; /* Make images responsive */
    height: 100%; /* Make images cover the full height of the container */
    object-fit: cover; /* Ensure images cover the container without distortion */
}

.banner-text {
    position: absolute; /* Position text over images */
    top: 78%; /* Position from the top */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Adjust for perfect centering */
    color: white; /* Text color */
    text-align: center; /* Center text */
    z-index: 2; /* Ensure text is above the image */
    /* Optional: Add some styling for better readability */
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    padding: 10px; /* Space around the text */
    border-radius: 5px; /* Round the corners */
    width: 100%; /* Make the text span the full width of the container */
}

.banner-text h4, .banner-text h3 {
    margin: 0; /* Remove default margins */
}


    </style>
</head>
<body id="home">

<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap JavaScript -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>

<div class="w3l-hero-headers-9">
    <div class="css-slider">
        <input id="slide-1" type="radio" name="slides" checked>
       
        <div class="container">
        <div class="banner-text">
                <h4>Creative Styling</h4>
                <h4>Beauty Heaven Fashion for Women</h4>
            </div>
            <div class="image-container">
                <img src="images/l.png" alt="Slider Image">
           
            </div>
           
        </div>
    </div>
</div>



<section class="w3l-call-to-action_9">
    <div class="call-w3 section-bg">
        <div class="container">
            <div class="grids">
                <div class="grids-content row">
                <div class="column col-lg-4 col-md-6 color-2" style="background-color: #e0f7fa; padding: 20px; border-radius: 10px;">
    <div>
        <h4>Our Salon is Most Popular</h4>
        <p class="para">Swasti's Cosmetics and Salon offers - Beauty Services</p>
        <a href="about.php" class="action-button btn mt-md-4 mt-3" style="background-color: black; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Read more</a>

    </div>
</div>

                    <div class="column col-lg-4 col-md-6 col-sm-6 back-image">
                        <img src="assets/images/5.jpg" alt="product" class="img-responsive">
                    </div>
                    <div class="column col-lg-4 col-md-6 col-sm-6 back-image2">
                        <img src="assets/images/10.jpg" alt="product" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-teams-15">
    <div class="team-single-main">
        <div class="container">
            <div class="row"> <!-- Use a row to contain columns -->
                <!-- First Column: Relaxation Services -->
                <div class="column2 image-text">
                    <h3 class="team-head">Come Experience the Secrets of Relaxation</h3>
                    <p class="para text">Best Beauty experts at your home providing salon services including Facial, Clean Up, Bleach, Waxing, Pedicure, Manicure, and more.</p>
                    <a href="book-appointment.php" class="btn logo-button top-margin mt-4">Get An Appointment</a>
                </div>

                <!-- Second Column: Products -->
                <div class="column2 image-text">
                    <h3 class="team-head">Have a look towards our newly arrival products</h3>
                    <p class="para text">Best Beauty products at your home providing makeup products of different brands.</p>
                    <a href="book-appointment.php" class="btn logo-button top-margin mt-4">Get a product</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-specification-6">
    <div class="specification-layout">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 back-image">
                    <img src="assets/images/b1.jpg" alt="product" class="img-responsive">
                </div>
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big"><a href="about.php">Clean and Recommended Hair Salon</a></h3>
                    <p class="mt-3 para">Their array of beauty parlour services include haircuts, hair spas, colouring, texturing, styling, waxing, pedicures, manicures, threading, body spa, natural facials and more.</p>
                    <div class="hair-cut">
                        <div>
                            <ul class="w3l-right-book">
                                <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php">Hair cut with Blow dry</a></li>
                                <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php">Color & highlights</a></li>
                                <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php">Shampoo & Set</a></li>
                                <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php">Blow Dry & Curl</a></li>
                                <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php">Advance Hair Color</a></li>
                            </ul>
                        </div>
                        <a href="services.php" class="btn logo-button mt-4">Get Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-our-team">
    <div class="container">
        <div class="section-head text-center">
            <h3 class="title-big">Our Expert Beauticians</h3>
        </div>
        <div class="row">
            <!-- Team members details -->
            <!-- Example for one team member -->
            <div class="col-md-4">
                <div class="team-member">
                    <img src="assets/images/me.jpg" alt="team member" class="img-responsive">
                    <h4>Swasti Guragain</h4>
                    <p>Senior Beautician</p>
                </div>
            </div>
           <!-- Add more team members as needed -->
<div class="col-md-4">
    <div class="team-member">
        <img src="assets/images/sneha.jpg" alt="team member" class="img-responsive">
        <h4>Sneha Guragain</h4>
        <p>Junior Beautician</p>
    </div>
</div>
</div>
</div>
</section>

<style>
.w3l-our-team .team-member {
    text-align: center; /* Center-aligns the content */
    margin-bottom: 30px; /* Space below each team member */
}

.w3l-our-team .team-member img {
    width: 300px; /* Set a fixed width for the image */
    height: 300px; /* Set a fixed height for the image */
    object-fit: cover; /* Ensures the image covers the area without distortion */
    border-radius: 0; /* Removes any circular or rounded corners */
    max-width: 100%; /* Ensures responsiveness on smaller screens */
}

.w3l-our-team h4 {
    margin-top: 15px; /* Adds space between the image and the name */
}

.w3l-our-team p {
    color: #777; /* Adjusts text color for the role */
    margin-top: 5px; /* Adds a bit of space above the role text */
}
</style>

<!-- Footer -->
<?php include_once('includes/footer.php'); ?>

<!-- Social Media Integration -->
<div class="social-media">
    <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fa fa-facebook"></i></a>
    <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fa fa-twitter"></i></a>
    <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fa fa-instagram"></i></a>
</div>

</body>
</html>
