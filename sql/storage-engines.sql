-- Create a table using the InnoDB storage engine
CREATE TABLE example_innodb (id INT, data VARCHAR(100)) ENGINE=InnoDB;
-- Comment: This command creates a table with the InnoDB engine, which supports transactions, row-level locking, and foreign keys, suitable for applications requiring high reliability and performance.

-- Create a table using the MyISAM storage engine
CREATE TABLE example_myisam (id INT, data VARCHAR(100)) ENGINE=MyISAM;
-- Comment: This command creates a table with the MyISAM engine, known for its simplicity and speed in read-intensive (non-concurrent) environments, but lacking support for transactions and row-level locking.

-- Convert a table from MyISAM to InnoDB
ALTER TABLE example_myisam ENGINE=InnoDB;
-- Comment: This command changes the storage engine of the 'example_myisam' table to InnoDB. Useful for adding transaction capabilities and improving data integrity in existing tables.
