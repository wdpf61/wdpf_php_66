-- ============================
--  SQL COMMANDS DEMONSTRATION
-- ============================

-- DML (Data Manipulation Language)
-- DDL (Data Definition Language)
-- DCL (Data Control Language)
-- TCL (Transaction Control Language)
-- DQL (Data Query Language)




-- ***************
-- 1. DDL Commands
-- ***************
-- Create Database
CREATE DATABASE demo_db;

-- Use the Database
USE demo_db;

-- Create Table
CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    department VARCHAR(50),
    salary DECIMAL(10,2)
);

-- Alter Table
ALTER TABLE employees ADD email VARCHAR(100);

-- Drop Column
ALTER TABLE employees DROP COLUMN email;

-- Rename Column
ALTER TABLE students CHANGE result grade VARCHAR(50);
ALTER TABLE students RENAME COLUMN result TO grade; --mysql 8+

-- Rename Table
ALTER TABLE employees RENAME TO staff;

-- Drop Table
DROP TABLE IF EXISTS staff;

-- Drop Database
-- DROP DATABASE demo_db;

-- ***************
-- 2. DML Commands
-- ***************
-- Insert Data
INSERT INTO employees (name, department, salary)
VALUES ('John Doe', 'IT', 55000.00),
       ('Jane Smith', 'HR', 45000.00);

-- Update Data
UPDATE employees SET salary = 60000.00 WHERE name = 'John Doe';

-- Delete Data
DELETE FROM employees WHERE name = 'Jane Smith';

-- ***************
-- 3. DQL Command
-- ***************
-- Select Data
SELECT * FROM employees;
SELECT name, salary FROM employees WHERE department = 'IT';

-- ***************
-- 4. TCL Commands
-- ***************
-- Start Transaction
START TRANSACTION;

UPDATE employees SET salary = 70000.00 WHERE name = 'John Doe';

-- Commit changes
COMMIT;

-- Rollback example (revert changes)
-- ROLLBACK;

-- ***************
-- 5. DCL Commands
-- ***************
-- Create User
CREATE USER 'new_user'@'localhost' IDENTIFIED BY 'password123';

-- Grant Privileges
GRANT SELECT, INSERT ON demo_db.* TO 'new_user'@'localhost';
GRANT ALL PRIVILEGES ON demo_db.* TO 'new_user'@'localhost';

-- Revoke Privileges
REVOKE INSERT ON demo_db.* FROM 'new_user'@'localhost';

-- Show Grants
SHOW GRANTS FOR 'new_user'@'localhost';





SELECT * FROM students;
SELECT DISTINCT class FROM students;
SELECT name, age FROM students WHERE age > 18;
SELECT class, COUNT(*) FROM students GROUP BY class HAVING COUNT(*) > 2;
SELECT * FROM students ORDER BY age DESC LIMIT 5 OFFSET 2;



SELECT * FROM students WHERE age BETWEEN 18 AND 25;
SELECT * FROM students WHERE name LIKE 'R%';
SELECT * FROM students WHERE age IN (18, 20, 22);
SELECT * FROM students WHERE email IS NULL;
SELECT * FROM students WHERE NOT age = 18;
SELECT * FROM students WHERE age > 18 AND class = '10';



-- ===== Aggregate =====
SELECT COUNT(*) FROM students;
SELECT AVG(age) FROM students;
SELECT MAX(age), MIN(age) FROM students;
SELECT SUM(age) FROM students;



-- VIEW
CREATE VIEW teen_students AS 
SELECT * FROM students WHERE age BETWEEN 13 AND 19;
DROP VIEW teen_students;



--Subquery
SELECT name FROM students
WHERE id IN (SELECT student_id FROM results WHERE mark > 80);




