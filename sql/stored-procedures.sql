-- Create a stored procedure to retrieve employee details
DELIMITER //
CREATE PROCEDURE GetEmployeeDetails(IN empID INT)
BEGIN
    SELECT * FROM employees WHERE id = empID;
END //
DELIMITER ;

# **Explanation**:
# - This SQL script defines a stored procedure named `GetEmployeeDetails` that takes one integer parameter (`empID`) and returns the details of the employee with that ID.

### SQL for Creating a Trigger
-- Create a trigger that logs an action after a new employee is added
DELIMITER //
CREATE TRIGGER AfterEmployeeAdd
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    INSERT INTO audit_log (employee_id, action) VALUES (NEW.id, 'Added');
END //
DELIMITER ;

# **Explanation**:
# - This trigger, `AfterEmployeeAdd`, automatically inserts a log entry into an `audit_log` table whenever a new record is added to the `employees` table. The log entry records the ID of the new employee and the action ('Added').
#
# These SQL examples provide a practical introduction to using stored procedures and triggers in MySQL, demonstrating how to encapsulate business logic within the database and automate responses to data changes.