<?php
require 'includes/db.php';
require 'includes/queries.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Departments</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include(__DIR__ . '/layout/header.php'); ?>

<h1>Departments</h1>

<?php
// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Add department
    if (isset($_POST['add_department']) && !empty($_POST['department_name'])) {
        $name = trim($_POST['department_name']);
        if ($name !== '') {
            addDepartment($conn, $name);
        }
    }

    // Edit department
    elseif (isset($_POST['edit_department']) && isset($_POST['department_id']) && !empty($_POST['department_name'])) {
        $id = intval($_POST['department_id']);
        $name = trim($_POST['department_name']);
        if ($id > 0 && $name !== '') {
            editDepartment($conn, $id, $name);
        }
    }

    // Delete department
    elseif (isset($_POST['delete_department']) && isset($_POST['department_id'])) {
        $id = intval($_POST['department_id']);
        if ($id > 0) {
            deleteDepartment($conn, $id);
        }
    }
}

// Form to add a new department
?>
<form method="POST" class="add-department-form">
    <input type="text" name="department_name" placeholder="New Department" required>
    <button type="submit" name="add_department">Add</button>
</form>

<?php
// Fetch and display departments
$departments = getDepartments($conn);

if ($departments && $departments->num_rows > 0) {
    echo '<table border="1" cellpadding="8" cellspacing="0">';
    echo '<tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Actions</th>
          </tr>';

    while ($row = $departments->fetch_assoc()) {
        $id = intval($row['department_id']);
        $name = htmlspecialchars($row['department_name']);

        echo '<tr>';
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo '<td>
                <!-- Edit Form -->
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="department_id" value="' . $id . '">
                    <input type="text" name="department_name" value="' . $name . '" required>
                    <button type="submit" name="edit_department">Edit</button>
                </form>

                <!-- Delete Form -->
                <form method="POST" style="display:inline-block;" onsubmit="return confirm(\'Delete this department?\');">
                    <input type="hidden" name="department_id" value="' . $id . '">
                    <button type="submit" name="delete_department">Delete</button>
                </form>
              </td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "<p>No departments available.</p>";
}

include(__DIR__ . '/layout/footer.php');
?>
</body>
</html>
