-- Create an 'employees' table with a primary key
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    department VARCHAR(50),
    salary INT
);

-- Create a 'department' table with a primary key and a unique constraint on the name
CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

-- Add a foreign key to the 'employees' table that references the 'department' table
ALTER TABLE employees
    ADD department_id INT,
    ADD CONSTRAINT fk_department FOREIGN KEY (department_id) REFERENCES department(department_id);

-- Create a 'projects' table that includes a foreign key reference to the 'employees' table
CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255),
    start_date DATE,
    end_date DATE,
    manager_id INT,
    CONSTRAINT fk_manager FOREIGN KEY (manager_id) REFERENCES employees(id)
);
