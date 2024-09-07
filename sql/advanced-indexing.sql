-- Create a composite index on the first_name and last_name columns of the employees table
CREATE INDEX idx_name ON employees (first_name, last_name);
-- Comment: Composite indexes are useful when queries frequently filter or sort based on multiple columns. This index will speed up searches that involve both first_name and last_name.

-- Create a full-text index on the description column of the products table
CREATE FULLTEXT INDEX idx_description ON products (description);
-- Comment: Full-text indexes are ideal for improving performance on text-based queries, allowing for efficient searching of text within the description column.

-- Create a spatial index on a geometry column in the geography table
CREATE SPATIAL INDEX idx_geo ON geography (geo_point);
-- Comment: Spatial indexes are used to improve the performance of queries that involve spatial data. Useful for queries checking distances or containment within geographical shapes.

-- Use EXPLAIN to analyze the performance impact of indexes on a query
EXPLAIN SELECT * FROM employees WHERE first_name = 'John' AND last_name = 'Doe';
-- Comment: EXPLAIN provides details on how MySQL executes a query, showing whether and how indexes are used to optimize the query.
