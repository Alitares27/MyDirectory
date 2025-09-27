<?php
require_once __DIR__ . '/db.php';

// Fetch departments from the database
$departments = [];
$dept_query = $conn->query("SELECT department_id, department_name FROM departments ORDER BY department_name ASC");
if ($dept_query && $dept_query->num_rows > 0) {
    while ($row = $dept_query->fetch_assoc()) {
        $departments[] = $row;
    }
}

$error = "";
$employee_id = null;
$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$department = "";

// If employee_id is passed, load employee data
if (isset($_GET['employee_id'])) {
    $employee_id = intval($_GET['employee_id']);
    $stmt = $conn->prepare("SELECT first_name, last_name, email, phone, department_id FROM employees WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $email, $phone, $department);
    $stmt->fetch();
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel'])) {
        header("Location: ../employees.php");
        exit;
    }

    $employee_id = !empty($_POST['employee_id']) ? intval($_POST['employee_id']) : null;
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $department = trim($_POST['department']);

    if ($first_name && $last_name && $email && $phone && $department) {
        if ($employee_id) {
            // Update existing employee
            $stmt = $conn->prepare("UPDATE employees SET first_name = ?, last_name = ?, email = ?, phone = ?, department_id = ? WHERE employee_id = ?");
            $stmt->bind_param("ssssii", $first_name, $last_name, $email, $phone, $department, $employee_id);
            $action = "updated";
        } else {
            // Insert new employee
            $stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, email, phone, department_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phone, $department);
            $action = "added";
        }

        if ($stmt->execute()) {
            header("Location: ./employees.php");
            exit;
        } else {
            $error = "Error saving employee: " . $conn->error;
        }
        $stmt->close();
    } else {
        $error = "Please complete all fields.";
    }
}
?>