<?php
// update_employee.php
require_once __DIR__ . '/includes/edit_employee.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $employee_id ? "Edit Employee" : "Add New Employee"; ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include(__DIR__ . '/layout/header.php'); ?>

    <div class="directory-home">
        <h2><?php echo $employee_id ? "Edit Employee" : "Add New Employee"; ?></h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="post" action="">
            <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee_id); ?>">

            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required><br><br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required><br><br>

            <label for="department">Department:</label><br>
            <select id="department" name="department" required>
                <option value="">-- Select Department --</option>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo htmlspecialchars($dept['department_id']); ?>" <?php echo ($dept['department_id'] == $department) ? "selected" : ""; ?>>
                        <?php echo htmlspecialchars($dept['department_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <div class="action-buttons">
                <button type="submit"><?php echo $employee_id ? "Update Employee" : "Add Employee"; ?></button>
                <button type="button" onclick="window.location.href='./employees.php'" style="background:#555;">Cancel</button>
            </div>
        </form>
    </div>

    <?php include(__DIR__ . '/layout/footer.php'); ?>
</body>
</html>
