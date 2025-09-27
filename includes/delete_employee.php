<?php
require_once __DIR__ . '/db.php';

if (isset($_GET['employee_id'])) {
    $employee_id = intval($_GET['employee_id']);

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id);

    if ($stmt->execute()) {
        // Redirect to employees.php with success message
        header("Location: ../employees.php?success=1&action=deleted");
        exit;
    } else {
        // Redirect to employees.php with error message
        header("Location: ../employees.php?error=" . urlencode("Error deleting employee: " . $conn->error));
        exit;
    }
    $stmt->close();
} else {
    // Redirect to employees.php if no employee_id is provided
    header("Location: ../employees.php?error=" . urlencode("Invalid request"));
    exit;
}
