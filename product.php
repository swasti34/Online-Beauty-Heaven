<?php
// Include the database connection
include_once('includes/dbconnection.php');

// Check if form is submitted for product addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category'];
    $product_image = $_POST['product_image'];

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO tblproduct (name, price, description, category, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $product_name, $product_price, $product_description, $product_category, $product_image);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding product: ' . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}

// Fetch products from database
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Create a base query
$query = "SELECT * FROM tblproduct WHERE 1";

// Add search filter
if (!empty($search)) {
    $query .= " AND name LIKE ?";
}

// Add category filter
if (!empty($category)) {
    $query .= " AND category = ?";
}

// Prepare the statement
$stmt = $con->prepare($query);

// Bind parameters
$params = [];
$types = '';
if (!empty($search)) {
    $params[] = "%$search%";
    $types .= 's';
}
if (!empty($category)) {
    $params[] = $category;
    $types .= 's';
}
if ($types) {
    $stmt->bind_param($types, ...$params);
}

// Execute the statement and get results
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
// Fetch Highly Recommended Products
$recommendedQuery = "SELECT * FROM tblproduct WHERE purchase_count >= 10 ORDER BY purchase_count DESC LIMIT 6"; // Change the LIMIT as needed
$recommendedResult = $con->query($recommendedQuery);
$recommendedProducts = $recommendedResult->fetch_all(MYSQLI_ASSOC);


// Close statement and connection
$stmt->close();
$con->close();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }
        .header-name {
            margin: 20px 0;
            font-size: 2rem;
            color: #333;
        }
        h3 {
            color: black; /* Set text color for all h3 elements */
           /* Set background color for all h3 elements */
            padding: 10px; /* Optional: Adds padding to the h3 elements */
            border-radius: 5px; /* Optional: Rounds the corners of the h3 background */
        }
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .btn-add-to-cart {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .btn-add-to-cart:hover {
            background-color: #218838;
        }
        .search-section {
            margin: 20px 0;
        }
        .breadcrumbs-custom-path {
            margin: 10px 0;
        }
        .product-title {
            font-weight: bold;
            color: #007bff;
        }
        .product-price {
            font-size: 1.25rem;
            color: #dc3545;
        }
        .product-description {
            color: #666;
            max-height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <title>Products - Online Beauty Heaven</title>
</head>
<body id="home">
    <!-- Navbar -->
    <?php include_once('includes/header.php'); ?>

    <!-- Product Listing -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner services">
            <div class="container">
                <section class="search-section text-center">
                    <div class="main-titles-head">
                        <h3 class="header-name">Products</h3><br>
                    </div>
                    <form method="GET" action="" class="form-inline justify-content-center">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search for products..." value="<?php echo htmlspecialchars($search); ?>">
                        <select name="category" class="form-control mr-2">
                            <option value="">All Categories</option>
                            <option value="skincare" <?php echo ($category == 'skincare') ? 'selected' : ''; ?>>Skin Care</option>
                            <option value="fragrances" <?php echo ($category == 'fragrances') ? 'selected' : ''; ?>>Fragrances</option>
                            <option value="haircare" <?php echo ($category == 'haircare') ? 'selected' : ''; ?>>Hair Care</option>
                            <option value="beautytools" <?php echo ($category == 'beautytools') ? 'selected' : ''; ?>>Beauty Tools</option>
                            <option value="makeup" <?php echo ($category == 'makeup') ? 'selected' : ''; ?>>Makeup</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </section>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">   
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone">
                        <a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a>
                    </li>
                    <li class="active">Products</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <?php
            // Loop through the fetched products and display them
            foreach ($products as $product) { ?>
                <div class="col-md-4 mb-4">
                    <div class="product-card card">
                        <img src="/OnlineBeautyHeaven/images/<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body text-center">
                            <h5 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="product-price">RS. <?php echo htmlspecialchars($product['price']); ?></p>
                            <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <button class="btn btn-add-to-cart"
                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                    data-price="<?php echo htmlspecialchars($product['price']); ?>"
                                    data-image="<?php echo htmlspecialchars($product['image']); ?>"
                                    data-id="<?php echo htmlspecialchars($product['id']); ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
 <!-- Highly Recommended Products Section -->
<section class="text-center mt-5">
    <h3 class="font-weight-bold" style="color: #28a745;">Highly Recommended Products</h3>
    <div class="row justify-content-center">
        <?php foreach ($recommendedProducts as $recommendedProduct) { ?>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="product-card card shadow-lg hover-shadow" style="border: 2px solid #28a745;">
                    <div class="position-relative">
                        <span class="badge badge-success position-absolute" style="top: 10px; left: 10px;">Highly Recommended</span>
                        <img src="/OnlineBeautyHeaven/images/<?php echo htmlspecialchars($recommendedProduct['image']); ?>" 
                             class="card-img-top product-img" 
                             alt="<?php echo htmlspecialchars($recommendedProduct['name']); ?>">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="product-title"><a href="#" class="text-dark product-link"><?php echo htmlspecialchars($recommendedProduct['name']); ?></a></h5>
                        <p class="product-price text-success">RS. <?php echo htmlspecialchars($recommendedProduct['price']); ?></p>
                        <p class="product-description"><?php echo htmlspecialchars($recommendedProduct['description']); ?></p>
                        <button class="btn btn-success btn-add-to-cart"
                                data-name="<?php echo htmlspecialchars($recommendedProduct['name']); ?>"
                                data-price="<?php echo htmlspecialchars($recommendedProduct['price']); ?>"
                                data-image="<?php echo htmlspecialchars($recommendedProduct['image']); ?>"
                                data-id="<?php echo htmlspecialchars($recommendedProduct['id']); ?>">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>



<style>
    .product-card {
        width: 300px;
        height: 450px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-img {
        max-height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .product-title, .product-description, .product-price {
        max-height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .product-link:hover {
        text-decoration: underline;
        color: #28a745;
    }
</style>



    </div>


    <!-- Footer -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for Cart functionality -->
    <script>
    $(document).ready(function () {
        // Function to update cart count in the navbar
        function updateCartCount(count) {
            $('.cart-count').text(count); // Update the cart count in the navbar
        }

        // Event handler for adding items to the cart
        $('.btn-add-to-cart').click(function () {
            const productName = $(this).data('name');
            const productPrice = $(this).data('price');
            const productImage = $(this).data('image');
            const productId = $(this).data('id');

            // AJAX POST request to add the product to the cart
            $.ajax({
                url: 'cart.php',
                type: 'POST',
                data: {
                    action: 'add_to_cart',
                    product_name: productName,
                    product_price: productPrice,
                    product_image: productImage,
                    product_id: productId // Pass the product ID
                },
                dataType: 'json',
                success: function (response) {
                    alert(response.message);

                    // Update the cart count in the header
                    if (response.success) {
                        updateCartCount(response.cart_count);
                    }
                },
                error: function () {
                    alert('An error occurred while adding the product to the cart.');
                }
            });
        });

        // Initial cart count update on page load
        $.get('cart.php', function (data) {
            const cartCount = data.cart_count || 0;
            updateCartCount(cartCount);
        }, 'json');
    });
    </script>
</body>
</html>
