CREATE DATABASE IF NOT EXISTS HRM_test;
USE HRM_test;
CREATE TABLE IF NOT EXISTS users(
    id int PRIMARY KEY auto_increment,
    name varchar(100),
    contact varchar(100),
    address varchar(100),
    email varchar(100),
    age varchar(100),
    dob datetime, 
    img varchar(100)
    
);
CREATE TABLE IF NOT EXISTS Employee(
    id int PRIMARY KEY auto_increment,
    name varchar(100),
    contact varchar(100),
    address varchar(100),
    email varchar(100),
    age varchar(100),
    dob datetime, 
    img varchar(100)
    
);
CREATE TABLE IF NOT EXISTS salary(
    id int PRIMARY KEY auto_increment,
    employee_id int ,
    basic int,
    house_rent int,
    medical_allowance int
);

-- home work 
-- create drop export import database 
-- create drop rename table 
-- alter add delete and rename COLUMN
-- insert update delete and show data  from a table 