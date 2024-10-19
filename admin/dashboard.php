<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Online Beauty Heaven| Admin Dashboard</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src="js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js"></script>
<script src="js/site.js"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
<div class="main-content">
    <?php include_once('includes/sidebar.php'); ?>
    <?php include_once('includes/header.php'); ?>
    <!-- main content start-->
    <div id="page-wrapper" class="row calender widget-shadow">
        <div class="main-page">
            <div class="row calender widget-shadow">
                <div class="row-one">
                    <!-- Your existing customer and appointment counts -->
                    <div class="col-md-4 widget">
                        <?php $query1=mysqli_query($con,"SELECT * FROM tbluser");
                        $totalcust=mysqli_num_rows($query1); ?>
                        <div class="stats-left ">
                            <h5>Total</h5>
                            <h4>Customer</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo $totalcust; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-mdl">
                        <?php $query2=mysqli_query($con,"SELECT * FROM tblbook");
                        $totalappointment=mysqli_num_rows($query2); ?>
                        <div class="stats-left">
                            <h5>Total</h5>
                            <h4>Appointment</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo $totalappointment; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-last">
                        <?php $query3=mysqli_query($con,"SELECT * FROM tblbook WHERE Status='Selected'");
                        $totalaccapt=mysqli_num_rows($query3); ?>
                        <div class="stats-left">
                            <h5>Total</h5>
                            <h4>Accepted Apt</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo $totalaccapt; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="clearfix"> </div>    
                </div>
            </div>

            <div class="row calender widget-shadow">
                <div class="row-one">
                    <div class="col-md-4 widget">
                        <?php $query4=mysqli_query($con,"SELECT * FROM tblbook WHERE Status='Rejected'");
                        $totalrejapt=mysqli_num_rows($query4); ?>
                        <div class="stats-left ">
                            <h5>Total</h5>
                            <h4>Rejected Apt</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo $totalrejapt; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-mdl">
                        <?php $query5=mysqli_query($con,"SELECT * FROM tblservices");
                        $totalser=mysqli_num_rows($query5); ?>
                        <div class="stats-left">
                            <h5>Total</h5>
                            <h4>Services</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo $totalser; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-last">
                        <?php
                        // Today's Sale
                        $query6=mysqli_query($con,"SELECT tblinvoice.ServiceId AS ServiceId, tblservices.Cost
                        FROM tblinvoice 
                        JOIN tblservices ON tblservices.ID=tblinvoice.ServiceId WHERE DATE(PostingDate)=CURDATE();");
                        while($row=mysqli_fetch_array($query6)) {
                            $todays_sale=$row['Cost'];
                            $todysale+=$todays_sale;
                        }
                        ?>
                        <div class="stats-left">
                            <h5>Today</h5>
                            <h4>Sales</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo ($todysale == "") ? "0" : $todysale; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="clearfix"> </div>    
                </div>
            </div>

            <div class="row calender widget-shadow">
                <div class="row-one">
                    <div class="col-md-4 widget">
                        <?php
                        // Yesterday's Sale
                        $query7=mysqli_query($con,"SELECT tblinvoice.ServiceId AS ServiceId, tblservices.Cost
                        FROM tblinvoice 
                        JOIN tblservices ON tblservices.ID=tblinvoice.ServiceId WHERE DATE(PostingDate)=CURDATE()-1;");
                        while($row7=mysqli_fetch_array($query7)) {
                            $yesterdays_sale=$row7['Cost'];
                            $yesterdaysale+=$yesterdays_sale;
                        }
                        ?>
                        <div class="stats-left ">
                            <h5>Yesterday</h5>
                            <h4>Sales</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo ($yesterdaysale == "") ? "0" : $yesterdaysale; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-mdl">
                        <?php
                        // Last Seven Days Sale
                        $query8=mysqli_query($con,"SELECT tblinvoice.ServiceId AS ServiceId, tblservices.Cost
                        FROM tblinvoice 
                        JOIN tblservices ON tblservices.ID=tblinvoice.ServiceId WHERE DATE(PostingDate) >= (DATE(NOW()) - INTERVAL 7 DAY);");
                        while($row8=mysqli_fetch_array($query8)) {
                            $sevendays_sale=$row8['Cost'];
                            $tseven+=$sevendays_sale;
                        }
                        ?>
                        <div class="stats-left">
                            <h5>Last Seven Days</h5>
                            <h4>Sale</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo ($tseven == "") ? "0" : $tseven; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="col-md-4 widget states-last">
                        <?php
                        // Total Sale
                        $query9=mysqli_query($con,"SELECT tblinvoice.ServiceId AS ServiceId, tblservices.Cost
                        FROM tblinvoice 
                        JOIN tblservices ON tblservices.ID=tblinvoice.ServiceId;");
                        while($row9=mysqli_fetch_array($query9)) {
                            $total_sale=$row9['Cost'];
                            $totalsale+=$total_sale;
                        }
                        ?>
                        <div class="stats-left">
                            <h5>Total</h5>
                            <h4>Sale</h4>
                        </div>
                        <div class="stats-right">
                            <label><?php echo ($totalsale == "") ? "0" : $totalsale; ?></label>
                        </div>
                        <div class="clearfix"> </div>    
                    </div>
                    <div class="clearfix"> </div>    
                </div>
            </div>
        </div>
        <script>
            // Assuming the total appointment count is available as a PHP variable
            let totalAppointments = <?php echo $totalappointment; ?>;
            let notificationCount = 0;

            // Function to update the notification icon
            function updateNotification() {
                // Check if totalAppointments has changed (increment if true)
                if (totalAppointments > notificationCount) {
                    notificationCount++;
                    // Display notification count
                    document.getElementById("notification-count").innerText = notificationCount;
                    // Reset notification after displaying
                    setTimeout(() => {
                        notificationCount = 0;
                        document.getElementById("notification-count").innerText = notificationCount;
                    }, 3000); // reset after 3 seconds
                }
            }

            // Call this function whenever you want to check for new appointments
            updateNotification();
        </script>
    </div>
</div>
</body>
</html>
