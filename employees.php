<?php
// Include the database connection and query logic
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

    <?php
    // Include the filter form
    include 'includes/filter_form.php';
    ?>

    <?php
    // Include the table to display results
    include 'includes/employee_table.php';
    ?>

    <?php
    include(__DIR__ . '/layout/footer.php');
    ?>

</body>

</html>