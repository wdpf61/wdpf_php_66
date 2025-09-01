-- ==============================================
-- SQL DATA TYPES (Commonly Used in MySQL/PostgreSQL)
-- ==============================================

-- 1. NUMERIC DATA TYPES
-- ----------------------
-- INT / INTEGER : Whole numbers (no decimals)
-- BIGINT        : Very large whole numbers
-- SMALLINT      : Small whole numbers
-- DECIMAL(p,s)  : Exact fixed-point numbers (p = precision, s = scale)
-- NUMERIC       : Same as DECIMAL (portable)
-- FLOAT         : Approximate decimal numbers (not exact)
-- DOUBLE / REAL : Large floating-point numbers
-- TINYINT       : Very small int 

CREATE TABLE numeric_examples (
    id INT PRIMARY KEY,           -- whole number ID
    age SMALLINT,                 -- small integer (e.g., 0–255)
    salary DECIMAL(10,2),         -- exact money format (99999999.99)
    rating FLOAT,                 -- approximate number like 4.56
    population BIGINT             -- very large number
);

-- 2. STRING DATA TYPES
-- ----------------------
-- CHAR(n)  : Fixed-length string (pads spaces if shorter)
-- VARCHAR(n): Variable-length string (saves space)
-- TEXT     : Large text data

CREATE TABLE string_examples (
    code CHAR(5),                 -- always 5 characters
    name VARCHAR(50),             -- up to 50 characters
    description TEXT              -- long paragraph text
);

-- 3. DATE & TIME DATA TYPES
-- ----------------------
-- DATE        : 'YYYY-MM-DD' format
-- TIME        : 'HH:MM:SS'
-- DATETIME    : Combination of DATE + TIME
-- TIMESTAMP   : Auto-updated time (good for logs)
-- YEAR        : Year value (MySQL)

CREATE TABLE datetime_examples (
    dob DATE,                     -- date of birth
    login_time TIME,              -- login time only
    created_at DATETIME,          -- full date & time
    updated_at TIMESTAMP          -- auto-updated on changes
);

-- 4. BOOLEAN DATA TYPE
-- ----------------------
-- BOOLEAN / BOOL : TRUE or FALSE

CREATE TABLE boolean_examples (
    is_active BOOLEAN             -- true/false
);

-- 5. BINARY DATA TYPES
-- ----------------------
-- BLOB : Binary Large Object (images, files, etc.)
-- VARBINARY(n): Variable-length binary data

CREATE TABLE binary_examples (
    file_data BLOB,               -- store images/files
    raw VARBINARY(50)             -- raw binary data
);

-- ==============================================
-- End of SQL Data Types Example
-- ==============================================
