<?php
require 'includes/db.php';
require 'includes/queries.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Directory</title>
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>

    <?php
    include(__DIR__ . '/layout/header.php');
    ?>

    <h1>Employee Directory</h1>

    
    <div class="directory-home">
        <div class="welcome-section">
            <h2>Welcome to the Employee Directory</h2>
            <p>
                This portal allows you to browse and search for employees within our organization. 
                Use the navigation menu above to view the directory, search for team members, or access additional resources.
            </p>
        </div>
        <div class="features-section">
            <h3>Features</h3>
            <ul>
                <li>Browse the complete employee list</li>
                <li>View by department</li>
            </ul>
        </div>
        <div class="cta-section">
            <a href="./employees.php" class="btn-primary">View Directory</a>
        </div>
    </div>

    <?php
    include(__DIR__ . '/layout/footer.php');
    ?>

</body>

</html>