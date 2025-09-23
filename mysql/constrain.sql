CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  name VARCHAR(100) NOT NULL,
  role ENUM('user','admin') NOT NULL DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

-- foreign key with actions
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT ,
  title VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) DEFAULT 0.00,
  CONSTRAINT fk_posts_user FOREIGN KEY (user_id) REFERENCES users(id)
    
    
    
    ON DELETE SET NULL
    ON UPDATE CASCADE,


  CONSTRAINT chk_price_nonneg CHECK (price >= 0)
)

-- add unique across two columns
ALTER TABLE posts ADD CONSTRAINT uq_posts_user_title UNIQUE (user_id, title);

-- drop foreign key
ALTER TABLE posts DROP FOREIGN KEY fk_posts_user;

-- drop unique index/constraint (unique creates an index)
ALTER TABLE users DROP INDEX email;  -- drop unique on email

-- drop check
ALTER TABLE posts DROP CHECK chk_price_nonneg;

-- show constraints/info
SHOW CREATE TABLE posts\G
SHOW INDEX FROM users;
SELECT * FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA='your_db' AND TABLE_NAME='posts';



Constraint	      Purpose

PRIMARY KEY	      Uniquely identifies each row
FOREIGN KEY	      Links rows between tables
UNIQUE	          No duplicate values allowed
NOT NULL	      Value cannot be NULL
CHECK	          Must satisfy condition (≥ MySQL 8.0.16)
DEFAULT	          Assigns default value
AUTO_INCREMENT	  Auto-generated sequential values