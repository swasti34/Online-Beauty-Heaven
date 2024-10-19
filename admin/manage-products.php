<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
} else {
    // Delete product
    if (isset($_GET['delid'])) {
        $pid = $_GET['delid'];
        $deleteQuery = mysqli_query($con, "DELETE FROM tblproduct WHERE id='$pid'");
        
        if ($deleteQuery) {
            echo "<script>alert('Product Deleted');</script>";
            echo "<script>window.location.href='manage-products.php'</script>";
        } else {
            echo "<script>alert('Error deleting product.');</script>";
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Online Beauty Heaven || Manage Products</title>
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
                <div class="tables">
                    <h3 class="title1">Manage Products</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>Update Products:</h4>
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Product Name</th> 
                                    <th>Description</th> 
                                    <th>Category</th>
                                    <th>Price</th> 
                                    <th>Image</th> 
                                    <th>Action</th> 
                                </tr> 
                            </thead> 
                            <tbody>
                                <?php
                                // Updated SQL query to fetch all relevant fields from the tblproduct
                                $ret = mysqli_query($con, "SELECT id, name, description, category, price, image FROM tblproduct");

                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr> 
                                    <th scope="row"><?php echo $cnt; ?></th> 
                                    <td><?php echo $row['name']; ?></td> 
                                    <td><?php echo $row['description']; ?></td> 
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['price']; ?></td> 
                                    <td><img src="/OnlineBeautyHeaven/images/<?php echo $row['image']; ?>" width="100" height="100"></td>
                                    <td>
                                        <a href="edit-products.php?editid=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="manage-products.php?delid=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td> 
                                </tr>
                                <?php 
                                    $cnt = $cnt + 1;
                                } ?>
                            </tbody> 
                        </table> 
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
