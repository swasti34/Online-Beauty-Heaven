<?php
session_start();

// Fetch cart count from session
$cart_count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;

$response = [
    'cart_count' => $cart_count
];

echo json_encode($response);
exit;
?>
