<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('includes/dbconnection.php');

// Fetch cart items from the session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Handle add to cart request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    // Check if action is to add to cart
    if ($_POST['action'] == 'add_to_cart') {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_id = $_POST['product_id']; // Get the product ID

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cart = $_SESSION['cart'];

        // Check if the product is already in the cart
        $product_exists = false;
        foreach ($cart as &$item) {
            if ($item['name'] == $product_name) {
                $item['quantity'] += 1; // Increase quantity
                $product_exists = true;
                break;
            }
        }

        if (!$product_exists) {
            // Add new product to cart
            $cart[] = [
                'name' => $product_name,
                'price' => $product_price,
                'image' => $product_image,
                'quantity' => 1
            ];
        }

        $_SESSION['cart'] = $cart;

        // Increment the purchase count for the product in the database
        $updateStmt = $con->prepare("UPDATE tblproduct SET purchase_count = purchase_count + 1 WHERE id = ?");
        $updateStmt->bind_param("i", $product_id);
        $updateStmt->execute();
        $updateStmt->close();

        // Calculate cart count
        $cart_count = array_sum(array_column($cart, 'quantity'));

        $response = [
            'success' => true,
            'message' => $product_exists ? 'Product already added to cart' : 'Product added to cart successfully',
            'already_added' => $product_exists,
            'cart_count' => $cart_count
        ];

        echo json_encode($response);
        exit;
    }

    // Handle update cart request
    if ($_POST['action'] == 'update_cart') {
        $index = $_POST['index']; // Get the index of the item to update
        $quantity = max(1, (int)$_POST['quantity']); // Ensure quantity is at least 1

        if (isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['quantity'] = $quantity; // Update quantity
        }

        echo json_encode(['success' => true, 'message' => 'Cart updated successfully']);
        exit; // End script to avoid additional processing
    }
}

// Handle delete product request
if (isset($_GET['delid'])) {
    $index = $_GET['delid'];

    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the cart
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Product not found');</script>";
    }

    echo "<script>window.location.href='cart.php'</script>";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Shopping Cart - Online Beauty Heaven</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .cart-header {
            margin: 30px 0;
            text-align: center;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table td {
            vertical-align: middle;
        }
        .item-total {
            font-weight: bold;
            color: #28a745;
        }
        .btn {
            transition: background-color 0.3s, color 0.3s;
        }
        .btn:hover {
            background-color: #17a2b8;
            color: white;
        }
        .input-group {
            width: 120px; /* Set a fixed width for input groups */
        }
    </style>
</head>
<body>

<section class="w3l-header-4">
    <!-- Add your header here -->
</section>

<div class="container my-5">
    <h2 class="cart-header">Your Shopping Cart</h2>

    <?php if (!empty($cart_items)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cartItems">
                <?php 
                $total_price = 0;
                foreach ($cart_items as $index => $item) {
                    $item_total = $item['price'] * $item['quantity'];
                    $total_price += $item_total;
                ?>
                <tr data-id="<?php echo $index; ?>" data-price="<?php echo $item['price']; ?>">
                    <td><img src="/OnlineBeautyHeaven/images/<?php echo $item['image']; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100px;"></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>RS. <span class="price"><?php echo htmlspecialchars($item['price']); ?></span></td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary decrease-quantity" type="button">-</button>
                            </div>
                            <input type="number" class="form-control text-center quantity-input" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary increase-quantity" type="button">+</button>
                            </div>
                        </div>
                    </td>
                    <td>RS. <span class="item-total"><?php echo number_format($item_total, 2); ?></span></td>
                    <td>
                        <a href="cart.php?delid=<?php echo $index; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Total Price: RS. <span id="totalPrice"><?php echo number_format($total_price, 2); ?></span></h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        </div>
    </div>
    <?php } else { ?>
    <div class="alert alert-info text-center">
        Your cart is currently empty. <a href="product.php">Continue Shopping</a>
    </div>
    <?php } ?>
</div>

<!-- Footer -->
<?php include_once('includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Function to update total price of the cart
function updateTotalPrice() {
    let total = 0;
    $('#cartItems tr').each(function() {
        const price = parseFloat($(this).find('.price').text());
        const quantity = parseInt($(this).find('.quantity-input').val());
        const itemTotal = price * quantity; // Calculate item total
        $(this).find('.item-total').text(itemTotal.toFixed(2)); // Update item total in the UI
        total += itemTotal; // Add to overall total
    });
    $('#totalPrice').text(total.toFixed(2)); // Update overall total price
}

// Update cart in the session on quantity change
$(document).on('change', '.quantity-input', function() {
    const $row = $(this).closest('tr');
    const quantity = $(this).val();
    const index = $row.data('id'); // Get the index from data attribute

    // Prepare data to send
    $.ajax({
        type: 'POST',
        url: 'cart.php', // Point to this file
        data: {
            action: 'update_cart',
            index: index, // Send index of the product
            quantity: quantity // Send updated quantity
        },
        success: function(response) {
            const result = JSON.parse(response);
            if (result.success) {
                updateTotalPrice(); // Update total price after success
            } else {
                alert(result.message);
            }
        }
    });
});

// Increment quantity
$(document).on('click', '.increase-quantity', function() {
    const $input = $(this).closest('.input-group').find('.quantity-input');
    $input.val(parseInt($input.val()) + 1).change(); // Trigger change event
});

// Decrement quantity
$(document).on('click', '.decrease-quantity', function() {
    const $input = $(this).closest('.input-group').find('.quantity-input');
    const currentVal = parseInt($input.val());
    if (currentVal > 1) {
        $input.val(currentVal - 1).change(); // Trigger change event
    }
});
</script>

</body>
</html>
