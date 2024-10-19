<?php
session_start();
include('includes/dbconnection.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the parameters from the URL
$status = $_GET['status'] ?? null;
$transaction_id = $_GET['transaction_id'] ?? null;
$amount = $_GET['amount'] ?? null;
$purchase_order_id = $_GET['purchase_order_id'] ?? null;
$purchase_order_name = $_GET['purchase_order_name'] ?? null;

// Log values for debugging
error_log("Transaction ID: $transaction_id, Amount: $amount, PO ID: $purchase_order_id, PO Name: $purchase_order_name, Status: $status");

// Check if the connection was successful
if (!isset($con)) {
    die("Database connection not established.");
}

if ($status) {
    $responseArray = [
        'status' => $status,
        'transaction_id' => $transaction_id,
        'amount' => $amount,
        'purchase_order_id' => $purchase_order_id,
        'purchase_order_name' => $purchase_order_name,
    ];

    switch ($responseArray['status']) {
        case 'Completed':
            // Prepare the SQL statement for inserting the transaction
            $stmt = $con->prepare("INSERT INTO transactions (transaction_id, amount, purchase_order_name, status) VALUES (?, ?, ?, ?)");

            // Check if the statement was prepared successfully
            if ($stmt === false) {
                error_log("Prepare failed: " . htmlspecialchars($con->error));
                die("Database prepare failed.");
            }

            // Bind parameters for the transaction
            $stmt->bind_param("sdss", $transaction_id, $amount, $purchase_order_name, $responseArray['status']);

            // Execute the statement
            if ($stmt->execute()) {
                $_SESSION['transaction_msg'] = 'Payment Successful!';

                // Increment the purchase count for the corresponding product
                error_log("Updating purchase_count for product: $purchase_order_name"); // Log the product name

                $updateStmt = $con->prepare("UPDATE tblproduct SET purchase_count = purchase_count + 1 WHERE purchase_order_name = ?");

                // Check if the update statement was prepared successfully
                if ($updateStmt === false) {
                    error_log("Prepare failed for update: " . htmlspecialchars($con->error));
                } else {
                    $updateStmt->bind_param("s", $purchase_order_name); // Assuming purchase_order_name matches the product's identifier

                    // Execute the update statement
                    if (!$updateStmt->execute()) {
                        error_log("Failed to update purchase count: " . htmlspecialchars($updateStmt->error));
                    } else {
                        error_log("Successfully updated purchase count for product: $purchase_order_name");
                    }

                    $updateStmt->close(); // Close the update statement
                }
            } else {
                error_log("Execute failed: " . htmlspecialchars($stmt->error));
                $_SESSION['transaction_msg'] = 'Database insertion failed.';
            }
            $stmt->close();
            break;

        case 'Expired':
        case 'User canceled':
        default:
            $_SESSION['transaction_msg'] = 'Transaction failed.';
            break;
    }
}

$con->close(); // Always close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
    // Check if there's a transaction message in the session
    <?php if (isset($_SESSION['transaction_msg'])): ?>
        const message = '<?php echo addslashes($_SESSION['transaction_msg']); ?>'; // Use addslashes for safety
        const icon = message.includes('failed') ? 'error' : 'success';

        Swal.fire({
            icon: icon,
            title: message,
            showConfirmButton: true,
            timer: 5000, // Display for 5 seconds
            timerProgressBar: true, // Optional: Show progress bar
        }).then((result) => {
            // Redirect to product.php when OK is clicked
            window.location.href = "product.php"; 
        });
        <?php unset($_SESSION['transaction_msg']); // Clear the message after displaying ?>
    <?php endif; ?>
</script>
</body>
</html>
