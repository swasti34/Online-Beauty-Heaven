<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="header-right">
        <div class="profile_details_left">
            <ul class="notifications-dropdown">
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge blue" id="notification-count"><?php include 'get_notification_count.php'; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have <span id="notification-text"></span> new notification(s)</h3>
                            </div>
                        </li>
                        <li>
                            <div class="notification_desc">
                                <?php 
                                include 'get_notifications.php'; 
                                if (!empty($notifications)) {
                                    foreach ($notifications as $notification) { ?>
                                        <a class="dropdown-item" href="mark_as_read.php" data-id="<?php echo $notification['id']; ?>">
                                            <?php echo $notification['message']; ?>
                                        </a>
                                        <hr />
                                <?php }
                                } else { ?>
                                    <a class="dropdown-item" href="#">No New Notifications</a>
                                <?php } ?>
                            </div>
                        </li>
                        <li>
                            <div class="notification_bottom">
                                <a href="all-notifications.php">See all notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <script>
        // Function to fetch the notification count
        function fetchNotificationCount() {
            $.ajax({
                url: 'get_notification_count.php',
                type: 'GET',
                success: function(response) {
                    $('#notification-count').text(response);
                    $('#notification-text').text(response);
                }
            });
        }

        // Call the function every 5 seconds to update notification count
        setInterval(fetchNotificationCount, 5000);

        // Handle clicking on notification items
        $('.dropdown-item').on('click', function (e) {
            e.preventDefault();
            var notificationId = $(this).data('id');
            $.post('mark_as_read.php', { notification_id: notificationId }, function(response) {
                alert(response);
                fetchNotificationCount(); // Refresh count after marking as read
            });
        });
    </script>
</body>
</html>
