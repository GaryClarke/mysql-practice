-- SELECT: Retrieve all columns for all employees
SELECT * FROM employees;

-- INSERT: Add a new employee to the employees table
INSERT INTO employees (name, age, department, salary) VALUES ('Bob Smith', 25, 'Marketing', 40000);

-- UPDATE: Increase salary by 10% for the IT department
UPDATE employees SET salary = salary * 1.10 WHERE department = 'IT';

-- DELETE: Remove all employees in the 'Sales' department
DELETE FROM employees WHERE department = 'Sales';
