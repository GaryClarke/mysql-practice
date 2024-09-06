-- Create an index on the 'department' column of the 'employees' table to improve query performance
CREATE INDEX idx_department ON employees(department);

-- Use EXPLAIN to analyze the execution plan of a query involving the 'department' column
EXPLAIN SELECT * FROM employees WHERE department = 'Sales';

-- Drop an index when it is no longer needed
DROP INDEX idx_department ON employees;

-- Example of a poorly written query using SELECT *
-- Optimize by selecting only required columns
SELECT name, department FROM employees WHERE department = 'Sales';

-- Optimize a join to use an alias and select only necessary columns
SELECT e.name, d.name
FROM employees e
JOIN departments d ON e.department_id = d.department_id
WHERE e.salary > 50000;

-- Show how to use a covering index to optimize query performance
-- This index includes both the filtering column and the columns used in the SELECT clause
CREATE INDEX idx_salary_department ON employees(salary, department, name);
