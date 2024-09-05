-- Count the total number of employees
SELECT COUNT(*) FROM employees;

-- Sum the total salaries paid to employees
SELECT SUM(salary) FROM employees;

-- Calculate the average salary of employees
SELECT AVG(salary) FROM employees;

-- Find the minimum and maximum age of employees
SELECT MIN(age) AS Youngest, MAX(age) AS Oldest FROM employees;

-- Count the number of employees in each department
SELECT department, COUNT(*) AS Num_Employees
FROM employees
GROUP BY department;

-- Find departments with more than 5 employees
SELECT department, COUNT(*) AS Num_Employees
FROM employees
GROUP BY department
HAVING COUNT(*) > 5;
