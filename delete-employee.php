<?php
require "db.php";

if (!isset($_GET["id"])) {
    die("No employee ID provided.");
}

$id = $_GET["id"];


// Get employee information first
$stmt = $conn->prepare(
    "SELECT * FROM employees WHERE emp_id=?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$employee = $result->fetch_assoc();


// Delete after confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare(
        "DELETE FROM employees WHERE emp_id=?"
    );

    $stmt->bind_param(
        "i",
        $id
    );

    if ($stmt->execute()) {
        header("Location: read-employee.php");
        exit();
    } else {
        $error = "Unable to delete employee.";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Delete.</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="demo-page">


<div class="demo-shell">

    <div class="demo-card">


        <h1 class="demo-title">
            Delete an employee.
        </h1>


        <p class="demo-subtitle">
            Remove this employee?
        </p>


        <?php if (isset($error)): ?>

            <div class="demo-msg error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>


        <div class="demo-field">

            <label>Name</label>

            <p>
                <?= htmlspecialchars($employee["emp_name"]) ?>
            </p>


            <label>Job Title</label>

            <p>
                <?= htmlspecialchars($employee["job_name"]) ?>
            </p>


            <label>Salary</label>

            <p>
                $<?= htmlspecialchars($employee["salary"]) ?>
            </p>

        </div>


        <form method="POST">


            <div class="demo-actions">


                <button 
                    class="demo-btn"
                    type="submit">
                    Delete.
                </button>


                <a 
                    class="demo-link"
                    href="read-employee.php">
                    Cancel
                </a>


            </div>


        </form>


    </div>


</div>


</body>
</html>