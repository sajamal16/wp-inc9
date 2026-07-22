<?php
require "db.php";

$result = $conn->query(
    "SELECT * FROM employees"
);

?>


<!DOCTYPE html>
<html>
<head>
<title>Employees</title>
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
<th>ID</th>
<th>Name</th>
<th>Job</th>
<th>Salary</th>
<th>Hire Date</th>
<th>Department</th>
<th>Actions</th>
</tr>


<?php while($row = $result->fetch_assoc()): ?>

<tr>

<td>
<?= htmlspecialchars($row["employee_id"]) ?>
</td>


<td>
<?= htmlspecialchars($row["emp_name"]) ?>
</td>


<td>
<?= htmlspecialchars($row["job_name"]) ?>
</td>


<td>
<?= htmlspecialchars($row["salary"]) ?>
</td>


<td>
<?= htmlspecialchars($row["hire_date"]) ?>
</td>


<td>
<?= htmlspecialchars($row["department_name"]) ?>
</td>


<td>

<a class="demo-link"
href="update-employee.php?id=<?= $row['emp_id'] ?>">
Edit.
</a>


<a class="demo-link"
href="delete-employee.php?id=<?= $row['emp_id'] ?>">
Delete.
</a>


</td>


</tr>

<?php endwhile; ?>


</table>


<br>

<a class="demo-link" href="create-employee.php">
Add an employee.
</a>


</div>
</div>

</body>
</html>