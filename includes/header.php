<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Define cart_count
$cart_count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;

// Define user_name if logged in
$user_name = isset($_SESSION['bpmsname']) ? $_SESSION['bpmsname'] : '';
?>

<!doctype html>
<html lang="en">
<head>
    <title>Online Beauty Heaven</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles for spacing */
        .navbar {
            display: flex;
            align-items: center; /* Align items vertically center */
            justify-content: space-between; /* Distribute space between brand and nav items */
        }

        .navbar-brand {
            margin-right: 150px; /* Increase space between the brand and the menu items */
        }

        .navbar-nav {
            margin-top: 0; /* Ensure there is no margin affecting the spacing */
        }

        .navbar-nav .nav-item {
            margin-left: 25px; /* Increase space between each nav item */
        }

        .nav-link {
            padding: 0 15px; /* Adjust padding to ensure space within each nav link */
        }

        .greeting-message {
            margin-top: 20px; /* Space below the navbar */
            text-align: center; /* Center text for the greeting */
        }

        .cart-icon .cart-count {
            position: relative;
            top: -10px; /* Adjust based on icon size */
            right: 10px; /* Adjust based on icon size */
        }
    </style>
</head>
<body id="home">
    <section class="w3l-header-4 header-sticky">
        <header class="absolute-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h1><a class="navbar-brand" href="index.php">Online Beauty Heaven</a></h1>
                    <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>
          
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="services.php">Services</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            
                            <?php if (strlen($_SESSION['bpmsuid']) == 0) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="booking-history.php">Booking History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="change-password.php">Setting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            <?php } ?>
                            
                            <!-- Add to Cart Icon -->
                            <li class="nav-item cart-icon">
                                <a class="nav-link" href="cart.php">
                                    <i class="fas fa-shopping-cart"></i> <!-- Font Awesome icon for cart -->
                                    <span class="cart-count badge badge-pill badge-danger"><?php echo $cart_count; ?></span> <!-- Cart count -->
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </section>

    <!-- Display personalized greeting below navbar -->
    <?php if (strlen($_SESSION['bpmsuid']) > 0) { ?>
        <section class="greeting-message">
            <div class="container">
                <p class="greeting">Hi <?php echo htmlspecialchars($_SESSION['bpmsname']); ?>!</p>
            </div>
        </section>
    <?php } ?>

    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Script to handle cart count update -->
    <script>
    $(document).ready(function () {
        // Event handler for adding to cart
        $('.add-to-cart').click(function () {
            var productId = $(this).data('id');
            $.ajax({
                url: 'cart.php',
                type: 'POST',
                data: { id: productId },
                success: function (response) {
                    if (response.success) {
                        // Update the cart count in the header
                        $('.cart-count').text(response.cart_count);
                        alert('Product added to cart successfully');
                    } else {
                        alert('Failed to add to cart');
                    }
                }
            });
        });

        // Function to update cart count on page load
        function updateCartCount() {
            $.get('cart.php', function (response) {
                let cart = JSON.parse(response);
                let totalItems = cart.items.reduce((acc, item) => acc + item.quantity, 0);
                
                // Update the cart count in the navbar
                $('.cart-count').text(totalItems);
            });
        }

        // Update the cart count when the page is loaded
        updateCartCount();
    });
    </script>
</body>
</html>
