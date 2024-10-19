<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khalti Payment Integration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #e9ecef; /* Light gray background for contrast */
        }

        .container {
            max-width: 800px; /* Increased width for better appearance */
            background-color: #ffffff; /* White background for the form */
            border-radius: 10px; /* Rounded corners */
            padding: 40px; /* Increased padding inside the form */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Soft shadow */
            border: 2px solid #5a6268; /* Darker gray border */
        }

        h1 {
            color: #007bff; /* Bootstrap primary color for the heading */
        }

        .form-label {
            font-weight: bold; /* Bold labels */
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary button color */
            border-color: #007bff; /* Bootstrap primary button border color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker border on hover */
        }

        footer {
            text-align: center; /* Center align footer text */
            margin-top: 20px; /* Space above footer */
            color: #6c757d; /* Grey color for footer */
        }

        .section-title {
            margin-top: 20px; /* Space above section titles */
            color: #6c757d; /* Dark gray color for section titles */
            font-weight: bold; /* Bold section titles */
        }

        input[readonly] {
            background-color: #f1f1f1; /* Light gray for readonly inputs */
        }
    </style>
</head>

<body class="m-4">
    <?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['bpmsuid'])) {
        echo "<script>alert('Please log in to proceed to checkout.');window.location.href='login.php';</script>";
        exit();
    }

    // Fetch cart items from the session
    $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    if (empty($cart_items)) {
        echo "<script>alert('Your cart is empty. Please add items to your cart before proceeding.');window.location.href='cart.php';</script>";
        exit();
    }

    // Calculate total price and prepare order details
    $total_price = 0;
    $order_name = '';
    $order_id = uniqid('order_'); // Generate unique order ID

    foreach ($cart_items as $item) {
        $total_price += $item['price'] * $item['quantity'];
        $order_name .= $item['name'] . ', ';
    }

    // Trim trailing comma from order name
    $order_name = rtrim($order_name, ', ');

    // Include the database connection file
    include('includes/dbconnection.php');

    // Get the logged-in user's ID from the session
    $userid = $_SESSION['bpmsuid'];

    // Query to fetch the user's details from the `tbluser` table
    $query = mysqli_query($con, "SELECT FirstName, Email, MobileNumber FROM tbluser WHERE ID='$userid'");

    // Check if the query was successful
    if (!$query) {
        // If the query fails, print the error
        die("Query failed: " . mysqli_error($con));
    }

    // Fetch the user data as an associative array
    $user_data = mysqli_fetch_assoc($query);

    // Check if user data is fetched properly
    if (!$user_data) {
        echo "<script>alert('Error fetching user details.');</script>";
        exit();
    }

    // Clear the cart session after processing
    unset($_SESSION['cart']); // Clear the cart
    ?>

    <div class="container mt-4">
        <h1 class="text-center">Khalti Payment Integration</h1>
        <form class="row g-3" action="payment-request.php" method="POST">
            <label class="section-title">Product Details:</label>
            <div class="col-md-6">
                <label for="inputAmount4" class="form-label">Amount</label>
                <input type="hidden" id="inputAmount4" name="inputAmount4" value="<?php echo $total_price; ?>"> <!-- Raw value -->
                <input type="text" class="form-control" value="RS. <?php echo number_format($total_price, 2); ?>" readonly> <!-- Formatted display -->
            </div>

            <div class="col-md-6">
                <label for="inputPurchasedOrderId4" class="form-label">Purchased Order ID</label>
                <input type="text" class="form-control" id="inputPurchasedOrderId4" name="inputPurchasedOrderId4" value="<?php echo $order_id; ?>" readonly>
            </div>
            <div class="col-12">
                <label for="inputPurchasedOrderName" class="form-label">Purchased Order Name</label>
                <input type="text" class="form-control" id="inputPurchasedOrderName" name="inputPurchasedOrderName" value="<?php echo $order_name; ?>" readonly>
            </div>
            <label class="section-title">Customer Details:</label>

            <div class="col-12">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo isset($user_data['FirstName']) ? $user_data['FirstName'] : ''; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo isset($user_data['Email']) ? $user_data['Email'] : ''; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputPhone" name="inputPhone" value="<?php echo isset($user_data['MobileNumber']) ? $user_data['MobileNumber'] : ''; ?>" readonly>
            </div>

            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary w-100">Pay with Khalti</button>
            </div>
        </form>
    </div>

    <footer>
        <p>© 2024 Online Beauty Heaven. All rights reserved.</p>
    </footer>

</body>

</html>
