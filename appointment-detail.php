<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsuid']) == 0) {
    header('location:logout.php');
} else {
    // Check if the appointment number is set
    if (isset($_GET['aptnumber'])) {
        $cid = $_GET['aptnumber'];
    } else {
        echo "<script>alert('No appointment number provided.'); window.location.href='index.php';</script>";
        exit;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Online Beauty Heaven | Booking History</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body id="home">
<?php include_once('includes/header.php'); ?>

<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
                <h3 class="header-name">Booking History</h3>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-sub">
        <div class="container">   
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                <li class="active">Booking History</li>
            </ul>
        </div>
    </div>
</section>

<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec">
        <div class="container">
            <div class="cont-details">
                <div class="table-content table-responsive cart-table-content m-t-30">
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Appointment Details</h4>
                    <?php
                    $ret = mysqli_query($con, "SELECT tbluser.FirstName, tbluser.LastName, tbluser.Email, tbluser.MobileNumber, 
                    tblbook.ID as bid, tblbook.AptNumber, tblbook.AptDate, tblbook.AptTime, tblbook.Message, 
                    tblbook.BookingDate, tblbook.Remark, tblbook.Status, tblbook.RemarkDate 
                    FROM tblbook 
                    JOIN tbluser ON tbluser.ID=tblbook.UserID 
                    WHERE tblbook.AptNumber='$cid'");
                    
                    if (mysqli_num_rows($ret) > 0) {
                        $row = mysqli_fetch_array($ret);
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Appointment Number</th>
                                <td><?php echo $row['AptNumber']; ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['Email']; ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php echo $row['MobileNumber']; ?></td>
                            </tr>
                            <tr>
                                <th>Appointment Date</th>
                                <td><?php echo $row['AptDate']; ?></td>
                            </tr>
                            <tr>
                                <th>Appointment Time</th>
                                <td><?php echo $row['AptTime']; ?></td>
                            </tr>
                            <tr>
                                <th>Apply Date</th>
                                <td><?php echo $row['BookingDate']; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $row['Status'] ?: "Not Updated Yet"; ?></td>
                            </tr>
                        </table>
                    <?php
                    } else {
                        echo "<p>No appointment details found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('includes/footer.php'); ?>

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

<?php } ?>
