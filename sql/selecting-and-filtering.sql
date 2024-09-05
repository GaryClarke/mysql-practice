-- Select all data from the employees table
SELECT * FROM employees;

-- Select only the name and department columns from the employees table
SELECT name, department FROM employees;

-- Select employees who are in the IT department
SELECT * FROM employees WHERE department = 'IT';

-- Select employees who are either in the Sales department or older than 30
SELECT * FROM employees WHERE department = 'Sales' OR age > 30;

-- Select employees who are not in the HR department and make more than 50,000
SELECT * FROM employees WHERE department != 'HR' AND salary > 50000;

-- Find employees whose name starts with 'A'
SELECT * FROM employees WHERE name LIKE 'A%';

-- Select employees whose age is between 25 and 35
SELECT * FROM employees WHERE age BETWEEN 25 AND 35;
