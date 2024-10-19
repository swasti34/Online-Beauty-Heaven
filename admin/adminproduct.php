<?php
session_start();
error_reporting(E_ALL); // Enable all error reporting
include('includes/dbconnection.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Force MySQLi to throw errors
$msg = ''; 

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $proname = $_POST['proname'];
        $prodesc = $_POST['prodesc'];
        $category = $_POST['category']; // Get the selected category
        $cost = $_POST['cost'];
        $image = $_FILES["image"]["name"]; // Fix: directly getting the image name from the upload

        // Get the image extension
        $extension = substr($image, strlen($image) - 4, strlen($image));
        // Allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png");

        // Validate for allowed extensions
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg / png allowed');</script>";
        } else {
            // Rename the image file
            $newimage = md5($image).time().$extension;
            // Move image into the directory
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/".$newimage);

            // Insert query to add price (cost) and category column
            $query = mysqli_query($con, "INSERT INTO tblproduct(name, description, category, image, price) 
            VALUES ('$proname', '$prodesc', '$category', '$newimage', '$cost')");

            if ($query) {
                echo "<script>alert('Product has been added successfully.');</script>";
                echo "<script>window.location.href = 'adminproduct.php'</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
                echo "Error: " . mysqli_error($con); // Display the error if the query fails
            }
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Online Beauty Heaven | Add Products</title>
    <!-- Include all necessary CSS and JS files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/custom.css" rel="stylesheet">
</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Header -->
        <?php include_once('includes/header.php'); ?>
        <!-- Main content start -->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Add Products</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Products:</h4>
                        </div>
                        <div class="form-body">
                            <form method="post" enctype="multipart/form-data">
                                <!-- Display message if set -->
                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) { echo $msg; } ?> </p>

                                <!-- Product Name -->
                                <div class="form-group"> 
                                    <label for="proname">Product Name</label> 
                                    <input type="text" class="form-control" id="proname" name="proname" placeholder="Product Name" required="true"> 
                                </div>

                                <!-- Product Description -->
                                <div class="form-group"> 
                                    <label for="prodesc">Product Description</label> 
                                    <textarea type="text" class="form-control" id="prodesc" name="prodesc" placeholder="Product Description" required="true"></textarea>
                                </div>

                                <!-- Product Category Dropdown -->
                                <div class="form-group"> 
                                    <label for="category">Product Category</label>
                                    <select class="form-control" id="category" name="category" required="true">
                                        <option value="">Select Category</option>
                                        <option value="foundation">Foundation</option>
                                        <option value="mascara">Mascara</option>
                                        <option value="nails">Nails</option>
                                        <option value="bb cream">BB Cream</option>
                                        <option value="lipstick">Lipstick</option>
                                        <!-- Add more categories as needed -->
                                    </select>
                                </div>

                                <!-- Product Cost -->
                                <div class="form-group"> 
                                    <label for="cost">Cost</label> 
                                    <input type="text" id="cost" name="cost" class="form-control" placeholder="Cost" required="true"> 
                                </div>

                                <!-- Product Image -->
                                <div class="form-group"> 
                                    
                                    <div class="form-group"> <label for="image">Images</label> <input type="file" class="form-control" id="image" name="image" value="" required="true"> </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" name="submit" class="btn btn-default">Add</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
    </div>

    <!-- JavaScript Files -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>