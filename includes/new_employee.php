<?php
require_once __DIR__ . '/db.php';

$error = "";

// Fetch departments from the database
$departments = [];
$dept_query = $conn->query("SELECT department_id, department_name FROM departments ORDER BY department_name ASC");
if ($dept_query && $dept_query->num_rows > 0) {
    while ($row = $dept_query->fetch_assoc()) {
        $departments[] = $row;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel'])) {
        header("Location: ../employees.php");
        exit;
    }

    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $phone      = trim($_POST['phone']);
    $department = trim($_POST['department']);

    // Basic validation
    if ($first_name && $last_name && $email && $phone && $department) {
        $stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, email, phone, department_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phone, $department);

        if ($stmt->execute()) {
            header("Location: ./employees.php");
            exit;
        } else {
            $error = "Error adding employee: " . $conn->error;
        }
        $stmt->close();
    } else {
        $error = "Please complete all fields.";
    }
}
