-- create and select the database
DROP DATABASE IF EXISTS toyshop5rest1;
CREATE DATABASE toyshop5rest1;
USE toyshop5rest1;

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  productCode      VARCHAR(10)    NOT NULL   UNIQUE,
  productName      VARCHAR(255)   NOT NULL,
  listPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database
INSERT INTO categories VALUES
(1, 'Trains'),
(2, 'Trucks'),
(3, 'Cars');

INSERT INTO products VALUES
(1, 1, 'Lionel1946', 'RED EXPRESS', '800.00'),
(2, 1, 'Lionel1938', 'TORPEDO', '900.00'),
(3, 1, 'Arcade1922', 'FORD T', '275.00'),
(4, 1, 'Arcade1927', 'NYC YELLOW CAB', '1685.00'),
(5, 1, 'Arcade1925', 'CHEVY', '300.00');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON toyshop5rest1.*
TO mgs_user@localhost
IDENTIFIED BY 'pwd';

GRANT SELECT
ON products
TO mgs_tester@localhost
IDENTIFIED BY 'pwd';
