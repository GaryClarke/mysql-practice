-- Find employees who earn more than the average salary
SELECT name, salary FROM employees
WHERE salary > (SELECT AVG(salary) FROM employees);

-- Select departments that have employees
SELECT name FROM departments
WHERE EXISTS (SELECT 1 FROM employees WHERE department_id = departments.department_id);

-- Select all employees who are in either 'Sales' or 'IT' departments
SELECT name, department FROM employees
WHERE department_id IN (SELECT department_id FROM departments WHERE name IN ('Sales', 'IT'));

-- Find employees and their managers from the same table
SELECT e.name AS Employee, m.name AS Manager
FROM employees e
    LEFT JOIN employees m ON e.manager_id = m.id;
