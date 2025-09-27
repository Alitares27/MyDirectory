<?php
// Initial query to fetch all employees
$sql = "SELECT e.employee_id, e.first_name, e.last_name, e.email, e.phone, 
          d.department_name, p.position_name
          FROM employees e
          LEFT JOIN departments d ON e.department_id = d.department_id
          LEFT JOIN employee_positions ep ON e.employee_id = ep.employee_id
          LEFT JOIN positions p ON ep.position_id = p.position_id";

// Apply department filter if set
if (isset($_GET['department_filter']) && $_GET['department_filter'] !== '') {
    $department_id = $conn->real_escape_string($_GET['department_filter']);
    $sql .= " WHERE e.department_id = '$department_id'";
}

$result = $conn->query($sql);

// Query to fetch departments for the filter dropdown
$dept_sql = "SELECT department_id, department_name FROM departments ORDER BY department_name ASC";
$dept_result = $conn->query($dept_sql);


// Function to get all departments

function getDepartments($conn) {
    $sql = "SELECT department_id, department_name FROM departments ORDER BY department_name ASC";
    return $conn->query($sql);
}

// Add a department 
function addDepartment($conn, $name) {
    $stmt = $conn->prepare("INSERT INTO departments (department_name) VALUES (?)");
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("s", $name);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

// Edit a department
function editDepartment($conn, $id, $name) {
    $stmt = $conn->prepare("UPDATE departments SET department_name = ? WHERE department_id = ?");
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("si", $name, $id);
    if (!$stmt->execute()) {
        $stmt->close();
        return false;
    }
    $updated = $stmt->affected_rows > 0;
    $stmt->close();
    return $updated;
}

// delete a department
function deleteDepartment($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM departments WHERE department_id = ?");
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        $stmt->close();
        return false;
    }
    $deleted = $stmt->affected_rows > 0;
    $stmt->close();
    return $deleted;
}

?>