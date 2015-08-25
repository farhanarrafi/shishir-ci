
/*
Worked here on April 13, 2015
 */
DROP TABLE IF EXISTS `Cart`;
DROP TABLE IF EXISTS `Session`;
DROP TABLE IF EXISTS `Rating`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Product`;
DROP TABLE IF EXISTS `Category`;
DROP TABLE IF EXISTS `Session`;

CREATE TABLE IF NOT EXISTS `Category` (
    `CategoryID` int,
    `CategoryName` varchar(100),
    `Deleted` int DEFAULT 0,
    PRIMARY KEY (CategoryID)
);

CREATE TABLE IF NOT EXISTS `Product` (
    `ProductID` int,
    `ProductName`varchar(100),
    `Description` text,
    `Stock` int,
    `Price` int,
    `ImageSource` varchar(200),
    `CategoryID` int,
    `Deleted` int DEFAULT 0,
    PRIMARY KEY (ProductID),
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
    );

CREATE TABLE IF NOT EXISTS `User` (
    `UserID` INT,
    `Email` varchar(100),
    `Password` varchar(256),
    `Firstname` varchar(100),
    `Lastname` varchar(100),
    `Deleted` int DEFAULT 0,
    PRIMARY KEY (UserID)
);

CREATE TABLE IF NOT EXISTS `Rating`
(
	`RatingID` int,
	`UserID` int,
	`ProductID` int,
        `Deleted` int DEFAULT 0,
	PRIMARY KEY (RatingID),
	FOREIGN KEY (UserID) REFERENCES User(UserID),
	FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
 );




SELECT P.ProductName, P.Price, P.Stock, P.ImageSource, C.CategoryName
FROM product AS P
LEFT JOIN category AS C
ON P.CategoryID = C.CategoryID
ORDER BY P.ProductID;


SELECT `P`.`ProductName`, `P`.`Price`, `P`.`Stock`, `P`.`ImageSource`, `C`.`CategoryName`
FROM `product` AS `P`
LEFT JOIN `category` AS `C`
ON `P`.`CategoryID` = `C`.`CategoryID`
ORDER BY `P`.`ProductID`;

CREATE TABLE IF NOT EXISTS  `Session` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

CREATE TABLE IF NOT EXISTS `Cart`
(
    `CartID` int,
    `SessionID` varchar(40) DEFAULT '0' NOT NULL,
    `ProductList` varchar(1000),
    PRIMARY KEY (CartID),
    FOREIGN KEY (SessionID)  REFERENCES Session(session_id)
);