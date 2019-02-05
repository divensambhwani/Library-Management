

DROP TABLE if exists VOLUME;
CREATE TABLE  IF NOT EXISTS `Library`.`VOLUME` (
  `volume_no` INT NOT NULL,
  `magazine_id` INT NOT NULL,
  `publish_year` INT NULL,
  PRIMARY KEY (`volume_no`,`magazine_id`),
    FOREIGN KEY (`magazine_id`)
    REFERENCES `Library`.`MAGAZINE` (`magazine_id`));


DROP TABLE if exists ARTICLE;
CREATE TABLE  IF NOT EXISTS `Library`.`ARTICLE` (
  `article_id` INT NOT NULL,
  `author_id` INT NULL,
  `volume_no` INT NOT NULL,
  `magazine_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `page_no` INT NULL,
  PRIMARY KEY (`article_id`,`volume_no`,`magazine_id`),
    FOREIGN KEY (`author_id`)
    REFERENCES `Library`.`AUTHOR` (`author_id`),
    FOREIGN KEY (`volume_no`)
    REFERENCES `Library`.`VOLUME` (`volume_no`),
    FOREIGN KEY (`magazine_id`)
    REFERENCES `Library`.`MAGAZINE` (`magazine_id`));

DROP TABLE if exists BOOK;
CREATE TABLE  IF NOT EXISTS `Library`.`BOOK` (
  `item_id` INT NOT NULL,
  `book_name` VARCHAR(45) NULL,
  `publish_year` INT NULL,
  CONSTRAINT `item_id`
    PRIMARY KEY (`item_id`),
    FOREIGN KEY (`item_id`)
    REFERENCES `Library`.`ITEM` (`item_id`));


DROP TABLE if exists CUSTOMER;
CREATE TABLE  IF NOT EXISTS `Library`.`CUSTOMER` (
  `customer_id` INT NOT NULL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `mobile_no` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`customer_id`));
  
  DROP TABLE if exists TRANSACTION;
CREATE TABLE  IF NOT EXISTS `Library`.`TRANSACTION` (
  `transaction_no` INT NOT NULL,
  `customer_id` INT NULL,
  `transaction_date` DATETIME NULL,
  `discount_code` VARCHAR(45) NULL,
  `total_price` INT NULL,
  PRIMARY KEY (`transaction_no`),
   FOREIGN KEY (`customer_id`)
    REFERENCES `Library`.`customer` (`customer_id`));
    
    
  DROP TABLE if exists TRANSACTION_BILL;
CREATE TABLE  IF NOT EXISTS `Library`.`TRANSACTION_BILL` (
  `transaction_no` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantity` VARCHAR(45) NULL,
  `item_price` VARCHAR(45) NULL,
  PRIMARY KEY (`transaction_no`,`item_id`),
    FOREIGN KEY (`transaction_no`)
    REFERENCES `Library`.`TRANSACTION` (`transaction_no`),
    FOREIGN KEY (`item_id`)
    REFERENCES `Library`.`ITEM` (`item_id`));


DROP TABLE if exists EMPLOYEE;
CREATE TABLE  IF NOT EXISTS `Library`.`EMPLOYEE` (
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
CREATE TABLE  IF NOT EXISTS `Library`.`LOG_HOURS` (
  `sin` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `no_of_hours` VARCHAR(45) NULL,
  PRIMARY KEY (`sin`,  `date`),
    FOREIGN KEY (`sin`)
    REFERENCES `Library`.`EMPLOYEE` (`sin`));
    
    
DROP TABLE if exists MONTHLY_EXPENSE;
CREATE TABLE  IF NOT EXISTS  `Library`.`MONTHLY_EXPENSE` (
  `month` INT NOT NULL,
  `year` INT NOT NULL,
  `electricity` INT NULL,
  `heat` INT NULL,
  `water` INT NULL,
  `total_expenses` INT NULL,
  PRIMARY KEY (`year`, `month`));


DROP TABLE if exists MONTHLY_EXPENSE;
CREATE TABLE  IF NOT EXISTS `Library`.`RENT` (
  `year` INT NOT NULL,
  `rent` INT NULL,
  PRIMARY KEY (`year`));
