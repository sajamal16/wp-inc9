<?php
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = $_POST["emp_name"];
    $job    = $_POST["job_name"];
    $salary = $_POST["salary"];
    $hire   = $_POST["hire_date"];
    $deptId = $_POST["department_id"];
    $dept   = $_POST["department_name"];

    $stmt = $conn->prepare(
        "INSERT INTO employees
        (emp_name, job_name, salary, hire_date, department_id, department_name)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssdsis",
        $name,
        $job,
        $salary,
        $hire,
        $deptId,
        $dept
    );


    if ($stmt->execute()) {
        $message = "Employee successfully added!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Create</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body class="demo-page">

<div class="demo-shell">
<div class="demo-card">

<h1 class="demo-title">
Add Employee
</h1>


<?php if ($message): ?>

<div class="demo-msg success">
<?= htmlspecialchars($message) ?>
</div>

<?php endif; ?>


<form method="POST">


<div class="demo-grid">


<div class="demo-field">
<label>Name</label>
<input class="demo-input" name="emp_name" required>
</div>


<div class="demo-field">
<label>Job</label>
<input class="demo-input" name="job_name" required>
</div>


<div class="demo-field">
<label>Salary</label>
<input class="demo-input" type="number" step="0.01" name="salary" required>
</div>


<div class="demo-field">
<label>Hire Date</label>
<input class="demo-input" type="date" name="hire_date" required>
</div>


<div class="demo-field">
<label>Department ID</label>
<input class="demo-input" type="number" name="department_id" required>
</div>


<div class="demo-field">
<label>Department Name</label>
<input class="demo-input" name="department_name" required>
</div>


</div>


<div class="demo-actions">

<button class="demo-btn">
Create Employee
</button>


<a class="demo-link" href="read-employee.php">
View employees.
</a>


</div>


</form>

</div>
</div>

</body>
</html>