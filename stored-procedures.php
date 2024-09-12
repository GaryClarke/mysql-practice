<?php
// Assuming $pdo is a PDO object connected to the database
$stmt = $pdo->prepare("CALL GetEmployeeDetails(:empID)");
$employeeId = 101; // Example employee ID
$stmt->bindParam(':empID', $employeeId, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo "Employee Name: " . $row['name'] . "<br>";
}

//**Explanation**:
//- The PHP script uses PDO to prepare and execute a call to the `GetEmployeeDetails` stored procedure, binding an employee ID as a parameter.

