-- Analyze the execution plan of a SELECT query using EXPLAIN
EXPLAIN SELECT * FROM employees WHERE department_id = 3;
-- Comment: This query uses EXPLAIN to show how MySQL executes the query, helping identify if and how indexes are used and the number of rows examined.

-- Optimize a query by selecting only necessary columns and using an index
SELECT first_name, last_name FROM employees USE INDEX (idx_name) WHERE department_id = 3;
-- Comment: Optimizing the query by specifying only needed columns and suggesting the use of a specific index to improve performance.

-- Optimize a join query between employees and departments
SELECT e.first_name, e.last_name, d.name
FROM employees e
         JOIN departments d ON e.department_id = d.department_id
WHERE d.location = 'New York';
-- Comment: This example demonstrates how to optimize a join by ensuring that there are indexes on the columns used in the join condition, potentially reducing the number of rows that need to be joined.

-- Enable the slow query log and set the threshold for long query times
SET GLOBAL slow_query_log = 1;
SET GLOBAL long_query_time = 2;
-- Comment: Enables the slow query log to capture queries that take longer than 2 seconds to execute, useful for identifying inefficient queries that need optimization.
