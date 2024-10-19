<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    // Code for deletion of appointment
    if ($_GET['delid']) {
        $sid = $_GET['delid'];
        mysqli_query($con, "DELETE FROM tblbook WHERE ID ='$sid'");
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='new-appointment.php'</script>";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Beauty Heaven || New Appointment</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- JS -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Header -->
        <?php include_once('includes/header.php'); ?>
        <!-- Main Content -->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h3 class="title1">New Appointment</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>New Appointments:</h4>
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Appointment Number</th> 
                                    <th>Name</th>
                                    <th>Mobile Number</th> 
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
<?php
    // Fetch all new appointments that are not yet confirmed
    $ret = mysqli_query($con, "SELECT 
        tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tblbook.ID as bid, 
        tblbook.AptNumber, tblbook.AptDate, tblbook.AptTime, tblbook.Status 
        FROM tblbook 
        JOIN tbluser ON tbluser.ID=tblbook.UserID 
        WHERE tblbook.Status IS NULL");

    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {
?>
        <tr>
            <th scope="row"><?php echo $cnt; ?></th>
            <td><?php echo $row['AptNumber']; ?></td>
            <td><?php echo $row['FirstName'] . " " . $row['LastName']; ?></td>
            <td><?php echo $row['MobileNumber']; ?></td>
            <td><?php echo $row['AptDate']; ?></td>
            <td><?php echo $row['AptTime']; ?></td>
            <td><?php echo ($row['Status'] == "") ? "Not Updated Yet" : $row['Status']; ?></td>
            <td>
                <a href="view-appointment.php?viewid=<?php echo $row['bid']; ?>" class="btn btn-primary">View</a>
                <a href="new-appointment.php?delid=<?php echo $row['bid']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php
        $cnt++;
    }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
    </div>

    <!-- JS -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!-- scrolling js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>
