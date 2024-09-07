-- Start a transaction
START TRANSACTION;
-- Comment: Begins a new transaction, isolating the following operations from other database activity until they are committed or rolled back.

-- Perform an insert operation within a transaction
INSERT INTO accounts (account_id, amount) VALUES (101, 200);
-- Comment: Inserts data into the 'accounts' table as part of the transaction.

-- Update operation within the same transaction
UPDATE accounts SET amount = amount + 100 WHERE account_id = 101;
-- Comment: Updates the 'amount' in the 'accounts' table for account_id 101, adding 100.

-- Commit the transaction
COMMIT;
-- Comment: Commits all changes made during the transaction to the database, making them permanent.

-- Start another transaction with error handling
START TRANSACTION;
INSERT INTO orders (order_id, order_date, customer_id) VALUES (5001, NOW(), 1);
UPDATE inventory SET quantity = quantity - 1 WHERE product_id = 400;

-- Check inventory levels and decide whether to commit or rollback
SELECT @quantity := quantity FROM inventory WHERE product_id = 400;
IF @quantity < 0 THEN
ROLLBACK;
ELSE
COMMIT;
END IF;
-- Comment: Begins a transaction, inserts an order, updates inventory, checks if inventory quantity is negative, and rolls back if true, otherwise commits the transaction.
