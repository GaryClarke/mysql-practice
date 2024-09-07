-- Create a temporary table to store interim results of average salaries by department
CREATE TEMPORARY TABLE temp_employee_details AS
SELECT department_id, AVG(salary) AS avg_salary
FROM employees
GROUP BY department_id;
-- Comment: This temporary table 'temp_employee_details' is used to store the average salary for each department, which can be used for further analysis or operations within the same session.

-- Update salaries in the employees table based on department performance stored in the temporary table
UPDATE employees e
JOIN temp_employee_details t ON e.department_id = t.department_id
SET e.salary = e.salary * 1.05
WHERE t.avg_salary > 50000;
-- Comment: This multi-table update increases the salary of employees by 5% in departments where the average salary is over 50,000, demonstrating how to use a JOIN in an UPDATE statement.

-- Drop a temporary table when it is no longer needed
DROP TEMPORARY TABLE IF EXISTS temp_employee_details;
-- Comment: It's a good practice to explicitly drop temporary tables when they're no longer needed to free up resources, even though temporary tables are automatically dropped at the end of the session.
