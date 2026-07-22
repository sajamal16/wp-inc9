Display record of all employees
<?php
require "db.php";

$result = $conn->query(
    "SELECT * FROM employees"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>read-employees</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body class="demo-page">

<div class="demo-shell">

<div class="demo-card">

<h1 class="demo-title">
Employee Records
</h1>


<table border="1">

<tr>
<th>Name</th>
<th>Job</th>
<th>Salary</th>
<th>Date Hired</th>
<th>Department</th>
</tr>


<?php while($row = $result->fetch_assoc()): ?>

<tr>

<td>
<?= $row["emp_name"] ?>
</td>

<td>
<?= $row["job_name"] ?>
</td>

<td>
<?= $row["salary"] ?>
</td>

<td>
<?= $row["hire_date"] ?>
</td>

<td>
<?= $row["department_name"] ?>
</td>

</tr>

<?php endwhile; ?>


</table>


<br>

<a class="demo-link" href="employee-demo.php">
Add an employee.
</a>


</div>

</div>

</body>
</html>