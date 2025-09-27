<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Position</th>
            <th>Actions</th>
          </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($row['employee_id'])."</td>
                <td>".htmlspecialchars($row['first_name'])."</td>
                <td>".htmlspecialchars($row['last_name'])."</td>
                <td><a href='mailto:".htmlspecialchars($row['email'])."'>".htmlspecialchars($row['email'])."</a></td>
                <td>".htmlspecialchars($row['phone'])."</td>
                <td>".htmlspecialchars($row['department_name'])."</td>
                <td>".htmlspecialchars($row['position_name'])."</td>
                <td>
                    <a href='update_employee.php?employee_id=".htmlspecialchars($row['employee_id'])."'>Edit</a> | 
                    <a href='includes/delete_employee.php?employee_id=".htmlspecialchars($row['employee_id'])."' 
                       onclick=\"return confirm('Are you sure you want to delete this employee?');\">
                       Delete
                    </a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='no-records'>No records found.</p>";
}
?>
