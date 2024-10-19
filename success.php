<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    

    <script>
        // Check if there's a transaction message in the session
        <?php if (isset($_SESSION['transaction_msg'])): ?>
            Swal.fire({
                icon: 'success',
                title: '<?php echo $_SESSION['transaction_msg']; ?>',
                showConfirmButton: true
            }).then(function() {
                // Redirect after confirmation
                window.location = 'index.php'; // Change this to the page you want to redirect to
            });

            <?php unset($_SESSION['transaction_msg']); // Clear the message after displaying ?>
        <?php endif; ?>
    </script>
  
</html>
