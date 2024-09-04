-- Create a simple employee table
CREATE TABLE employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    department VARCHAR(50)
);

-- Add a CHECK constraint to ensure employees are at least 18 years old
ALTER TABLE employee
    ADD CONSTRAINT chk_age CHECK (age >= 18);

-- Create a department table with a unique and not null constraint on the name
CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

-- Create an employee table that includes a foreign key reference to the department table
CREATE TABLE employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES department(department_id)
);

-- Create a project table with a UNIQUE constraint on the project name
CREATE TABLE project (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    start_date DATE,
    budget DECIMAL(10, 2)
);

-- Add a foreign key in the project table to reference employees (assuming a manager relationship)
ALTER TABLE project
    ADD COLUMN manager_id INT,
    ADD CONSTRAINT fk_manager FOREIGN KEY (manager_id) REFERENCES employee(id);
