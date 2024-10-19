<?php
session_start();

// Check if the product ID is set and if the cart exists
if (isset($_GET['id']) && isset($_SESSION['cart'])) {
    $index = $_GET['id'];

    // Remove the item from the cart based on its index
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        $_SESSION['message'] = "Item removed from the cart";
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
