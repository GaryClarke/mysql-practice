-- Create a new user with a specified password
CREATE USER 'username'@'localhost' IDENTIFIED BY 'strong_password';

-- Grant SELECT, INSERT, and UPDATE privileges on the 'employees' database to a user
GRANT SELECT, INSERT, UPDATE ON employees.* TO 'username'@'localhost';

-- Revoke UPDATE privilege from a user on the 'employees' database
REVOKE UPDATE ON employees.* FROM 'username'@'localhost';

-- Set a password expiration policy for a user
ALTER USER 'username'@'localhost' PASSWORD EXPIRE INTERVAL 90 DAY;

-- Require SSL/TLS for a user connection
ALTER USER 'username'@'localhost' REQUIRE SSL;

-- Display current privileges for a user
SHOW GRANTS FOR 'username'@'localhost';

-- Remove a user from the MySQL database
DROP USER 'username'@'localhost';

-- Enable general query log to record all queries
SET GLOBAL general_log = 'ON';
SET GLOBAL general_log_file = '/path/to/logfile.log';

-- Enable error log
SET GLOBAL log_error = '/path/to/error.log';
