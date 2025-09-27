<?php
require_once __DIR__ . '/includes/new_employee.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Employee</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include(__DIR__ . '/layout/header.php'); ?>

    <div class="directory-home">
        <h2>Add New Employee</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="post" action="">
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="department">Department:</label><br>
            <select id="department" name="department" required>
                <option value="">-- Select Department --</option>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo htmlspecialchars($dept['department_id']); ?>">
                        <?php echo htmlspecialchars($dept['department_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <div class="action-buttons">
                <button type="submit">Add Employee</button>
                <button type="submit" name="cancel" style="background:#555;">Cancel</button>
            </div>
        </form>
    </div>

    <?php include(__DIR__ . '/layout/footer.php'); ?>
</body>
</html>
