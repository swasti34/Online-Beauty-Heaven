
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <title>Online Beauty Heaven | Service Page</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <style>
        
      
    .breadcrumbs-sub {
        background-color: #f8f9fa;
        padding: 30px 0; /* Increased padding to make it larger */
        height: auto; /* You can also set a fixed height, e.g., height: 80px; */
    }

    .breadcrumbs-custom-path {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem; /* Slightly increase font size for better visibility */
    }

    .breadcrumbs-custom-path li {
        padding: 0 12px; /* Increase the spacing between breadcrumb items */
        color: #333;
    }

    .breadcrumbs-custom-path li a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumbs-custom-path li.active {
        color: #555;
    }

    .fa-angle-right {
        margin: 0 7px; /* Increase space between the arrow and text */
    }



        /* Enhanced Service Card Styling */
        .service-card {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            background-color: #fff;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
        }
        .service-card img {
            width: 100%; /* Ensures the image fits the width of the card */
            height: 200px; /* Set a fixed height to maintain consistency */
            object-fit: cover; /* Ensures the image covers the area without distortion */
            transition: transform 0.4s ease;
        }
        .service-card:hover img {
            transform: scale(1.07);
        }
        .service-info {
            padding: 20px;
            text-align: center;
        }
        .service-info h5 {
            font-weight: 700;
            font-size: 1.3rem;
            color: #333;
        }
        .service-info p {
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
        }
        .service-info .price {
            font-weight: bold;
            color: #007bff;
            margin: 20px 0;
            font-size: 1.1rem;
        }

        /* Book Now Section */
        .book-now-section {
            text-align: center;
            margin-top: 50px;
        }
        .book-now-btn {
            padding: 15px 50px;
            font-size: 1.2rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50px;
            transition: background-color 0.4s ease, transform 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .book-now-btn:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }

        /* Search Section Styling */
        .search-section {
            margin-top: 30px;
        }
        .search-section input, .search-section select {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            border: 1px solid #ddd;
        }
        .search-section .btn-primary {
            padding: 10px 30px;
            border-radius: 30px;
        }
       
    .form-inline input.form-control, 
    .form-inline select.form-control, 
    .form-inline button.btn-primary {
        padding: 12px 20px; /* Increased padding for input, select, and button */
        font-size: 1rem; /* Adjust font size for a larger appearance */
        height: auto; /* Ensure auto height so the padding defines the height */
        border-radius: 30px; /* Keep the rounded edges */
    }

    .form-inline {
        margin-bottom: 20px; /* Add space below the form */
    }

    .form-inline .btn-primary {
        padding: 12px 30px; /* Increased padding for the button */
        font-size: 1.1rem; /* Slightly larger button text */
        border-radius: 30px; /* Maintain rounded corners for the button */
    }


    </style>
</head>
<body id="home">
    <?php include_once('includes/header.php');?> 

    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <script src="assets/js/bootstrap.min.js"></script> <!-- bootstrap working -->
    <script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        });
    });
    </script>

    <!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
    <div class="about-inner services">
        <div class="container">
            <!-- Search Section -->
            <section class="search-section">
                <div class="container">
                    <div class="main-titles-head text-center">
                        <h3 class="header-name">Our Services</h3>
                    </div>
                    <form method="GET" action="" class="form-inline justify-content-center">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search for services..." value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                        <select name="category" class="form-control mr-2">
                            <option value="">All Categories</option>
                            <option value="facial" <?php echo (isset($_GET['category']) && $_GET['category'] == 'facial') ? 'selected' : ''; ?>>Facial</option>
                            <option value="menicure" <?php echo (isset($_GET['category']) && $_GET['category'] == 'menicure') ? 'selected' : ''; ?>>Menicure</option>
                            <option value="pedicure" <?php echo (isset($_GET['category']) && $_GET['category'] == 'pedicure') ? 'selected' : ''; ?>>Pedicure</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">   
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone">
                        <a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a>
                    </li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="w3l-recent-work-hobbies"> 
        <div class="recent-work">
            <div class="container">
                <div class="row">
                    <?php
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $category = isset($_GET['category']) ? $_GET['category'] : '';

                    $query = "SELECT * FROM tblservices WHERE Cost >= 1 AND Cost <= 10";
                    if (!empty($search)) {
                        $query .= " AND (ServiceName LIKE '%$search%' OR ServiceDescription LIKE '%$search%')";
                    }
                    if (!empty($category)) {
                        $query .= " AND category='$category'";
                    }

                    $ret = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <img src="admin/images/<?php echo $row['Image']; ?>" alt="service">
                            <div class="service-info">
                                <h5><?php echo $row['ServiceName']; ?></h5>
                                <p><?php echo $row['ServiceDescription']; ?></p>
                                <div class="price">RS. <?php echo $row['Cost']; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="book-now-section">
                    <a href="book-appointment.php" class="book-now-btn">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php');?> 

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-long-arrow-up"></span>
    </button>
    <script>
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>
