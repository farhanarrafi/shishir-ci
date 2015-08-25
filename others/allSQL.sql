
/*
File built o April 28 to store all SQL queries.
Worked here on April 13, 2015
 */
DROP TABLE IF EXISTS `Cart`;
DROP TABLE IF EXISTS `Session`;
DROP TABLE IF EXISTS `Rating`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Category`;
DROP TABLE IF EXISTS `Product`;
DROP TABLE IF EXISTS `Category`;

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
/*
CREATE TABLE `User` (
    `UserID` INT,
    `UserName` varchar(100),
    `Password` varchar(256),
    `Email` varchar(100),
    `Fullname` varchar(200),
    `Address` varchar(256),
    `Phone` varchar(20),
    `Gender` varchar(8),
    `BirthDate` date,
    PRIMARY KEY (UserID)

);
*/

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
	PRIMARY KEY (RatingID),
	FOREIGN KEY (UserID) REFERENCES User(UserID),
	FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
 );

CREATE TABLE IF NOT EXISTS `Session` 
( 
    `SessionID` int,
    `UserID` int,
    `IPAddress` varchar(70),
    `time` timestamp,
    PRIMARY KEY (SessionID),
    FOREIGN KEY (UserID) REFERENCES User(UserID) 
);

CREATE TABLE IF NOT EXISTS `Cart`
(
    `CartID` int,
    `SessionID` int,
    `ProductList` varchar(1000),
    PRIMARY KEY (CartID),
    FOREIGN KEY (SessionID)  REFERENCES Session(SessionID)
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

/*
DROP TABLE IF EXISTS `Country`;

CREATE TABLE `Country`
(
	`CountryID` int NOT NULL AUTO_INCREMENT,
	`CountryName` varchar(100),
	PRIMARY KEY (CountryID)
 );

CREATE INDEX CountryIndex
ON Country (CountryName);

ALTER TABLE `Country` AUTO_INCREMENT = 10;

INSERT INTO `country`(`CountryName`) VALUES ('Bangladesh');
INSERT INTO `country`(`CountryName`) VALUES ('Uganda');
INSERT INTO `country`(`CountryName`) VALUES ('England');
INSERT INTO `country`(`CountryName`) VALUES ('Ghana');
INSERT INTO `country`(`CountryName`) VALUES ('Peru');
INSERT INTO `country`(`CountryName`) VALUES ('Japan');
INSERT INTO `country`(`CountryName`) VALUES ('China');

*/
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);