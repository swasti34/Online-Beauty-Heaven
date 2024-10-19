<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();

    // Check if there's a transaction message in the session
    if (isset($_SESSION['transaction_msg'])) {
        $message = $_SESSION['transaction_msg'];
        unset($_SESSION['transaction_msg']);
    } else {
        $message = null; // Ensure message is null if not set
    }
    ?>

    <script>
        // Display SweetAlert if there's a transaction message
        <?php if ($message): ?>
            Swal.fire({
                icon: 'success',
                title: '<?php echo $message; ?>',
                showConfirmButton: true
            }).then(function() {
                // Redirect to product.php after confirmation
                window.location = 'product.php'; // Redirect to product page after payment success
            });
        <?php endif; ?>
    </script>

</body>

</html>
