-- INNER JOIN: Join employees and departments where the department IDs match
SELECT employees.name, departments.name
FROM employees
    INNER JOIN departments ON employees.department_id = departments.department_id;

-- LEFT JOIN: Get all employees and their department names, including those without a department
SELECT employees.name, departments.name
FROM employees
    LEFT JOIN departments ON employees.department_id = departments.department_id;

-- RIGHT JOIN: Get all departments and their employees, including those with no employees
SELECT departments.name, employees.name
FROM departments
    RIGHT JOIN employees ON departments.department_id = employees.department_id;
