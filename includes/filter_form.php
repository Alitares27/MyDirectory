<div style="display:flex; justify-content:center; align-items:center; gap:15px; margin-bottom:20px;">

    <form method="GET" style="margin:0;">
        <label for="department_filter">View by department: </label>
        <select name="department_filter" id="department_filter" onchange="this.form.submit()" style="padding:6px 12px; border-radius:4px;">
            <option value="">All</option>
            <?php
            if ($dept_result->num_rows > 0) {
                while ($dept_row = $dept_result->fetch_assoc()) {
                    $selected = (isset($_GET['department_filter']) && $_GET['department_filter'] == $dept_row['department_id']) ? 'selected' : '';
                    echo '<option value="'.htmlspecialchars($dept_row['department_id']).'" '.$selected.'>'.htmlspecialchars($dept_row['department_name']).'</option>';
                }
            }
            ?>
        </select>
    </form>

    <div class="add_employee-btn">
        <a href="./add_employee.php" class="btn-primary ">Add Employee</a>
    </div>

</div>
