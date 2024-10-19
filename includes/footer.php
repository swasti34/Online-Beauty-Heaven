<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       .footer-29 {
    background-color: #000000; /* Set background color to black */
    color: #ffffff; /* Keep text color white for contrast */
}


        .footer-title-29 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-29 p {
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-29 ul {
            padding-left: 0;
            list-style: none;
            margin-bottom: 0;
        }

        .footer-29 ul li {
            margin-bottom: 5px;
        }

        .footer-29 ul li span {
            margin-right: 10px;
        }

        .main-social-footer-29 {
            text-align: center;
            margin-top: 10px;
        }

        .main-social-footer-29 a {
            font-size: 20px;
            margin: 0 5px;
            color: #ffffff;
            display: inline-block;
            text-align: center;
        }

        .copy-footer-29 {
            text-align: right;
            margin-top: 10px;
        }

        .footer-29.py-3 {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .container.py-lg-2 {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>

<section class="w3l-footer-29-main">
    <div class="footer-29 py-3">
        <div class="container py-lg-2">
            <div class="row footer-top-29">
                <div class="col-lg-4 col-md-6 col-sm-8 footer-list-29 footer-1">
                    <h6 class="footer-title-29">Contact Us</h6>
                    <ul class="list-unstyled">
                        <?php
                        $ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <li class="d-inline-block mr-3">
                                <span class="fa fa-map-marker"></span>
                                <p class="d-inline-block ml-2 mb-0"><?php echo $row['PageDescription']; ?>.</p>
                            </li>
                            <li class="d-inline-block mr-3">
                                <span class="fa fa-phone"></span>
                                <a href="tel:<?php echo $row['MobileNumber']; ?>" class="d-inline-block ml-2"><?php echo $row['MobileNumber']; ?></a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fa fa-envelope-open-o"></span>
                                <a href="mailto:<?php echo $row['Email']; ?>" class="d-inline-block ml-2 mail"><?php echo $row['Email']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 main-social-footer-29">
                    <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                    <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                    <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                </div>
                <div class="col-lg-4 copy-footer-29">
                    <p>All rights reserved - Swasti Guragain @2024</p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
