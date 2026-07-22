<?php
require "db.php";


if (!isset($_GET["id"])) {
    die("No employee ID provided.");
}

$id = $_GET["id"];

$stmt = $conn->prepare(
    "SELECT * FROM employees WHERE emp_id=?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$employee = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


$name = $_POST["emp_name"];
$job = $_POST["job_name"];
$salary = $_POST["salary"];


$stmt = $conn->prepare(
"UPDATE employees
SET emp_name=?, job_name=?, salary=?
WHERE emp_id=?"
);


$stmt->bind_param(
"ssdi",
$name,
$job,
$salary,
$id
);


$stmt->execute();


header("Location: read-employee.php");

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Update.</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="demo-page">

<div class="demo-shell">

    <div class="demo-card">

        <h1 class="demo-title">
            Update employee.
        </h1>

        <p class="demo-subtitle">
            Edit employee.
        </p>


        <form method="POST">

            <div class="demo-grid">


                <div class="demo-field">
                    <label>Name</label>
                    <input 
                        class="demo-input"
                        name="emp_name"
                        value="<?= htmlspecialchars($employee['emp_name']) ?>"
                        required>
                </div>


                <div class="demo-field">
                    <label>Job Title</label>
                    <input 
                        class="demo-input"
                        name="job_name"
                        value="<?= htmlspecialchars($employee['job_name']) ?>"
                        required>
                </div>


                <div class="demo-field">
                    <label>Salary</label>
                    <input 
                        class="demo-input"
                        type="number"
                        step="0.01"
                        name="salary"
                        value="<?= htmlspecialchars($employee['salary']) ?>"
                        required>
                </div>


            </div>


            <div class="demo-actions">

                <button class="demo-btn" type="submit">
                    Save.
                </button>


                <a class="demo-link" href="read-employee.php">
                    Cancel.
                </a>

            </div>


        </form>


    </div>

</div>


</body>
</html>