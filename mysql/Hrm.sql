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

create TABLE users(
    id int PRIMARY KEY auto_increment,
    name varchar(100),
    email varchar(100),
    password varchar(100),
    img varchar(100),
    role_id int
);

create table roles(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100)
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) ,
    description TEXT,
    price DECIMAL(10,2),
    offer_price DECIMAL(10,2)
);
