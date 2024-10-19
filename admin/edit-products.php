<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['editid'])) {
        $pid = $_GET['editid'];
        // Fetch product details
        $query = mysqli_query($con, "SELECT * FROM tblproduct WHERE id='$pid'");
        $product = mysqli_fetch_array($query);

        if (isset($_POST['submit'])) {
            $proname = $_POST['proname'];
            $prodesc = $_POST['prodesc'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $image = $_FILES["image"]["name"]; // Image name from the file upload

            if ($image) {
                // Get the image extension
                $extension = substr($image, strlen($image) - 4, strlen($image));
                // Allowed extensions
                $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

                // Validate for allowed extensions
                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif allowed');</script>";
                } else {
                    // Rename the image file
                    $newimage = md5($image) . time() . $extension;
                    // Move image into the directory
                    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $newimage);

                    // Update product with new image
                    $updateQuery = mysqli_query($con, "UPDATE tblproduct SET name='$proname', description='$prodesc', category='$category', price='$price', image='$newimage' WHERE id='$pid'");
                }
            } else {
                // Update product without changing the image
                $updateQuery = mysqli_query($con, "UPDATE tblproduct SET name='$proname', description='$prodesc', category='$category', price='$price' WHERE id='$pid'");
            }

            if ($updateQuery) {
                echo "<script>alert('Product has been updated successfully.');</script>";
                echo "<script>window.location.href = 'manage-products.php'</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
                echo "Error: " . mysqli_error($con); // Display the error if the query fails
            }
        }
    } else {
        echo "<script>alert('Invalid request.');</script>";
        echo "<script>window.location.href = 'manage-products.php'</script>";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Online Beauty Heaven || Edit Product</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-1.11.1.min.js"></script>
</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Header -->
        <?php include_once('includes/header.php'); ?>
        <!-- Main content -->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Edit Product</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Edit Product:</h4>
                        </div>
                        <div class="form-body">
                            <form method="post" enctype="multipart/form-data">
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="proname">Product Name</label>
                                    <input type="text" class="form-control" id="proname" name="proname" value="<?php echo $product['name']; ?>" required="true">
                                </div>

                                <!-- Product Description -->
                                <div class="form-group">
                                    <label for="prodesc">Product Description</label>
                                    <textarea class="form-control" id="prodesc" name="prodesc" required="true"><?php echo $product['description']; ?></textarea>
                                </div>

                                <!-- Product Category -->
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" required="true">
                                        <option value="foundation" <?php echo ($product['category'] == 'foundation') ? 'selected' : ''; ?>>Foundation</option>
                                        <option value="mascara" <?php echo ($product['category'] == 'mascara') ? 'selected' : ''; ?>>Mascara</option>
                                        <option value="nails" <?php echo ($product['category'] == 'nails') ? 'selected' : ''; ?>>Nails</option>
                                        <option value="bb cream" <?php echo ($product['category'] == 'bb cream') ? 'selected' : ''; ?>>BB Cream</option>
                                        <!-- Add more categories as needed -->
                                    </select>
                                </div>

                                <!-- Product Price -->
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" value="<?php echo $product['price']; ?>" required="true">
                                </div>

                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <img src="images/<?php echo $product['image']; ?>" width="100" height="100">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" name="submit" class="btn btn-default">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
    </div>

    <script src="js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
