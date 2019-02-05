

DROP TABLE if exists VOLUME;
CREATE TABLE  IF NOT EXISTS  `VOLUME` (
  `volume_no` INT NOT NULL,
  `magazine_id` INT NOT NULL,
  `publish_year` INT NULL,
  PRIMARY KEY (`volume_no`,`magazine_id`),
    FOREIGN KEY (`magazine_id`)
    REFERENCES  `MAGAZINE` (`magazine_id`));


DROP TABLE if exists ARTICLE;
CREATE TABLE  IF NOT EXISTS  `ARTICLE` (
  `article_id` INT NOT NULL,
  `author_id` INT NULL,
  `volume_no` INT NOT NULL,
  `magazine_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `page_no` INT NULL,
  PRIMARY KEY (`article_id`,`volume_no`,`magazine_id`),
    FOREIGN KEY (`author_id`)
    REFERENCES  `AUTHOR` (`author_id`),
    FOREIGN KEY (`volume_no`)
    REFERENCES  `VOLUME` (`volume_no`),
    FOREIGN KEY (`magazine_id`)
    REFERENCES  `MAGAZINE` (`magazine_id`));

DROP TABLE if exists BOOK;
CREATE TABLE  IF NOT EXISTS  `BOOK` (
  `item_id` INT NOT NULL,
  `book_name` VARCHAR(45) NULL,
  `publish_year` INT NULL,
  CONSTRAINT `item_id`
    PRIMARY KEY (`item_id`),
    FOREIGN KEY (`item_id`)
    REFERENCES  `ITEM` (`item_id`));


DROP TABLE IF EXISTS CUSTOMER;
CREATE TABLE  IF NOT EXISTS  `CUSTOMER` (
  `customer_id` INT NOT NULL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `mobile_no` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`customer_id`));
  
  DROP TABLE if exists TRANSACTION;
CREATE TABLE  IF NOT EXISTS  `TRANSACTION` (
  `transaction_no` INT NOT NULL,
  `customer_id` INT NULL,
  `transaction_date` DATETIME NULL,
  `discount_code` VARCHAR(45) NULL,
  `total_price` INT NULL,
  PRIMARY KEY (`transaction_no`),
   FOREIGN KEY (`customer_id`)
    REFERENCES  `CUSTOMER` (`customer_id`));
    
    
  DROP TABLE if exists TRANSACTION_BILL;
CREATE TABLE  IF NOT EXISTS  `TRANSACTION_BILL` (
  `transaction_no` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantity` VARCHAR(45) NULL,
  `item_price` VARCHAR(45) NULL,
  PRIMARY KEY (`transaction_no`,`item_id`),
    FOREIGN KEY (`transaction_no`)
    REFERENCES  `TRANSACTION` (`transaction_no`),
    FOREIGN KEY (`item_id`)
    REFERENCES  `ITEM` (`item_id`));


DROP TABLE if exists EMPLOYEE;
CREATE TABLE  IF NOT EXISTS  `EMPLOYEE` (
  `sin` INT NOT NULL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
    `dob` DATETIME NULL,
  `mobile_no` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
   `hourly_rate` INT  NULL,
  PRIMARY KEY (`sin`));
  

DROP TABLE if exists LOG_HOURS;
CREATE TABLE  IF NOT EXISTS  `LOG_HOURS` (
  `sin` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `no_of_hours` VARCHAR(45) NULL,
  PRIMARY KEY (`sin`,  `date`),
    FOREIGN KEY (`sin`)
    REFERENCES  `EMPLOYEE` (`sin`));
    
    
DROP TABLE if exists MONTHLY_EXPENSE;
CREATE TABLE  IF NOT EXISTS   `MONTHLY_EXPENSE` (
  `month` INT NOT NULL,
  `year` INT NOT NULL,
  `electricity` INT NULL,
  `heat` INT NULL,
  `water` INT NULL,
  `total_expenses` INT NULL,
  PRIMARY KEY (`year`, `month`));


DROP TABLE if exists MONTHLY_EXPENSE;
CREATE TABLE  IF NOT EXISTS  `RENT` (
  `year` INT NOT NULL,
  `rent` INT NULL,
  PRIMARY KEY (`year`));
