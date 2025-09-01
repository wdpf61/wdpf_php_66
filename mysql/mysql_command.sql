mysql -u root -p 

-- ***************
-- 1. DDL Commands
-- ***************
-- DDL (Data Defination Language)

show databases;
create database IF NOT EXISTS batch66;
show tables;
DESCRIBE students;

create table IF NOT EXISTS students(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    result varchar(50) 
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


-- Drop / delete 
DROP table IF EXISTS students;
DROP database IF EXISTS batch66;


-- ***************
-- 2. DML Commands
-- ***************
-- DML (Data Manipulation Language)

-- show data from table
select id, name , result from students;
select * from students;
-- search 
select * from students where id=3;
-- create
insert into students (name,result) VALUES ("Nadim", "A+");
UPDATE students SET result="G+" where id=1;
DELETE FROM students WHERE id=2;





