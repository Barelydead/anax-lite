SET NAMES utf8;
USE chju16;


-- Christofer Jungbergs webshop backend API

DROP TABLE IF EXISTS anax_cartRow;
DROP TABLE IF EXISTS anax_cart;
DROP TABLE IF EXISTS anax_lowStockList;
DROP TABLE IF EXISTS anax_stock;
DROP TABLE IF EXISTS anax_orderRow;
DROP TABLE IF EXISTS anax_product;
DROP TABLE IF EXISTS anax_order;


-- Create prod table
-----------------------------------------------------

CREATE TABLE `anax_product`(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title CHAR(50),
    description VARCHAR(120) DEFAULT NULL,
    price DECIMAL(10,2) DEFAULT NULL,
    category CHAR(40) NULL DEFAULT NULL,
    img VARCHAR(100) NULL DEFAULT 'default.png',
    active_product BOOL DEFAULT 1
) ENGINE INNODB CHARACTER SET utf8;


INSERT INTO `anax_product`(title, description, price, category)
VALUES
('T-Shirt', 'En grå t-shirt med rund krage', 199.50, 'kläder'),
('Badbyxor', 'badbyxor med hawaii motiv', 450, 'kläder'),
('Osthyvel', 'En osthyvel i stål med trähandtag', 99, 'köksartiklar'),
('Stekpanna', 'Stekpanna i gjutjärn', 1099, 'köksartiklar'),
('Mugg', 'Fin mugg med text på', 249, 'köksartiklar')
;



-- Create order table
-----------------------------------------------------

CREATE TABLE `anax_order`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    customer CHAR(40),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    updated TIMESTAMP NULL DEFAULT NULL, -- on update NOW()
    canceled TIMESTAMP NULL DEFAULT NULL,
    delivered TIMESTAMP NULL DEFAULT NULL,

    FOREIGN KEY (`customer`) REFERENCES `anax_users`(`username`)
);


INSERT INTO `anax_order`(`customer`) VALUES
('ninjai'), ('doe');




-- Create orderRow table
-----------------------------------------------------


CREATE TABLE `anax_orderRow`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    product INT,
    units INT,
    `order` INT,

    FOREIGN KEY (`product`) REFERENCES `anax_product`(`id`),
    FOREIGN KEY (`order`) REFERENCES `anax_order`(`id`)
);


INSERT INTO `anax_orderRow`(product, `order`) VALUES
(1, 1), (2, 1), (3, 1),
(2, 2), (3, 2)
;



-- Create stock table
-----------------------------------------------------
CREATE TABLE `anax_stock`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    product INT,
    units INT,

    FOREIGN KEY (`product`) REFERENCES `anax_product`(`id`)
);


INSERT INTO `anax_stock`(units, product) VALUES
(10, 1), (10, 2),
(100, 3), (0, 4),
(1, 5);



-- Create anax_lowStockList table
-----------------------------------------------------
CREATE TABLE `anax_lowStockList`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    logDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    product INT,

    FOREIGN KEY (`product`) REFERENCES `anax_product`(`id`)
);



-- Shopping cart tables
-----------------------------------------------------
CREATE TABLE `anax_cart`(
	id INT PRIMARY KEY AUTO_INCREMENT,
	customer CHAR(40),

    FOREIGN KEY (`customer`) REFERENCES `anax_users`(`username`)
);



CREATE TABLE `anax_cartRow`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    cart INT,
	product INT,
    units INT,

    FOREIGN KEY (`product`) REFERENCES `anax_product`(`id`),
    FOREIGN KEY (`cart`) REFERENCES `anax_cart`(`id`)
);




INSERT INTO `anax_cart`() VALUES
(), ();

INSERT INTO `anax_cartRow`(cart, product, units) VALUES
(1, 1, 3), (1, 2, 2), (1, 5, 1);


SELECT C.id AS CartId,
P.title AS prodName,
P.description AS descr,
Cr.units as amount
FROM anax_cartRow as Cr
	INNER JOIN anax_product as P
		ON Cr.product = P.id
	INNER JOIN anax_cart as C
		ON Cr.cart = C.id;



-- SELECT
------------------------------------------------------

-- SELECT ALL ORDERS TO SHOW DATE AND CUSTOMERNAME
SELECT
	O.id AS OrderNumber,
    C.username AS CutsomerUserName,
    O.created AS OrderDate,
    C.name
FROM `anax_order` AS O
	INNER JOIN anax_users AS C
		ON O.customer = C.username
	INNER JOIN anax_orderRow AS RO
		ON O.id = RO.id
;



--
-- Create view to show orderDetails
--
------------------------------------------------------
DROP VIEW IF EXISTS VOrderDetails;
CREATE VIEW VOrderDetails AS
SELECT
    O.id AS OrderNumber,
    R.id AS OrderRow,
    C.username AS CustomerUsername,
    P.description AS Description,
    P.price AS Price,
    P.title AS ItemName
FROM `anax_order` AS O
	INNER JOIN anax_orderRow AS R
		ON O.id = R.order
	INNER JOIN anax_product AS P
		ON R.product = P.id
	INNER JOIN anax_users AS C
		ON O.customer = C.username
ORDER BY OrderRow
;


SELECT * FROM VOrderDetails;




DROP VIEW IF EXISTS VProductOverview;
CREATE VIEW VProductOverview AS
SELECT
	P.*,
	checkProductStatus(P.active_product) AS prodStatus,
	CASE
		WHEN (S.units > 0) THEN 'inStock'
		WHEN (S.units <= 0) THEN 'soldOut'
	END AS stock
	FROM `anax_product` AS P
		INNER JOIN `anax_stock` AS S
			ON P.id = S.product;


SELECT * FROM VProductOverview;



--
-- Create view to show stock
--
------------------------------------------------------
DROP VIEW IF EXISTS VProductStock;
CREATE VIEW VProductStock AS
SELECT
	P.id AS productId,
    P.title AS productName,
    P.description AS productDesc,
    S.units AS units
FROM `anax_stock` AS S
	INNER JOIN anax_product AS P
		ON S.product = P.id
ORDER BY ProductId;

SELECT * FROM VProductStock;



--
-- Create view to VLowStock
--
------------------------------------------------------
DROP VIEW IF EXISTS VLowStock;
CREATE VIEW VLowStock AS
SELECT
	P.id AS productId,
    P.title AS productName,
    L.logDate AS loggedDate,
    S.units AS unitsLeft
FROM `anax_lowStockList` AS L
	INNER JOIN anax_product AS P
		ON L.product = P.id
	INNER JOIN anax_stock AS S
		ON P.id = S.product
GROUP BY productName;

SELECT * FROM VLowStock;



-- Triggers
-------------------------------------------------------------------------

--
-- Trigger for auto stocklist
--

DELIMITER //


DROP TRIGGER IF EXISTS lowStock//

CREATE TRIGGER lowStock
AFTER UPDATE
ON `anax_stock` FOR EACH ROW
	IF (NEW.units < 5) THEN
    INSERT INTO `anax_lowStockList`(`product`)
		VALUES (OLD.product);
	ELSEIF (New.units > 5) THEN
    DELETE FROM `anax_lowStockList`
		WHERE product = OLD.product;
	END if;
//

DELIMITER ;



-- UPDATE STOCK WHEN NEW ORDER ARRIVES
DELIMITER //
DROP TRIGGER IF EXISTS updateStockOnOrder//
CREATE TRIGGER updateStockOnOrder
BEFORE INSERT
ON `anax_orderRow` FOR EACH ROW

	UPDATE anax_stock SET
		units = units - NEW.units
        WHERE product = NEW.product;

//
DELIMITER ;



-- Stored procedures
-------------------------------------------------------------------------


-- Start new cart and get cart id
DELIMITER //
DROP PROCEDURE IF EXISTS `startNewCart`//
CREATE PROCEDURE `startNewCart`(
    newCustomer CHAR(40)
)
BEGIN

INSERT INTO anax_cart(`customer`) VALUES (newCustomer);

select id from anax_cart WHERE customer = newCustomer;
END
//
DELIMITER ;

CALL startNewCart('ninjai');


DELIMITER //
DROP PROCEDURE IF EXISTS `addItemToCart`//
CREATE PROCEDURE `addItemToCart`(
    cartId INT,
    itemId INT,
    thisMany INT
)
BEGIN

INSERT INTO `anax_cartRow`(product, cart, units)
VALUES
(itemId, cartId, thisMany);
END
//
DELIMITER ;

CALL addItemToCart(1, 3, 2);


DELIMITER //
DROP PROCEDURE IF EXISTS `cartToOrder`//
CREATE PROCEDURE `cartToOrder`(
    activeCustomer CHAR(40),
    activeCart INT
)
BEGIN
DECLARE orderId INT;
DECLARE thisProduct INT;
DECLARE orderVolume INT;
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;


	START TRANSACTION;


	INSERT INTO anax_order(`customer`) VALUES
		(activeCustomer);

	-- new order ID
	SET orderId = last_insert_id();


	SELECT COUNT(*) FROM anax_cartRow
	WHERE cart = activeCart
		INTO n;

	SET i = 0;
	WHILE i < n DO
		SET thisProduct = (SELECT product FROM anax_cartRow WHERE cart = activeCart LIMIT i,1);
        SET orderVolume = (SELECT units FROM anax_cartRow WHERE cart = activeCart LIMIT i,1);

        IF getUnitBalance(thisproduct) < orderVolume THEN
			SELECT 'Not enough products in stock for this order';
            ROLLBACK;
		END if;

		INSERT INTO anax_orderRow(`product`, `order`, `units`) VALUES
        (thisProduct, orderId, orderVolume);

		SET i = i + 1;
	END WHILE;

    COMMIT;


END
//

DELIMITER ;

CALL cartToOrder('ninjai', 1);


-- Cancel order and return stock

DELIMITER //

DROP PROCEDURE IF EXISTS `cancelOrder`//
CREATE PROCEDURE `cancelOrder`(
    orderId INT
)
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;

SELECT COUNT(*) FROM anax_orderRow
	WHERE `order` = orderId
		INTO n;

	START TRANSACTION;

	SET i = 0;
	WHILE i < n DO
		UPDATE anax_stock SET
        units = units + (SELECT units FROM anax_orderRow WHERE `order` = orderId LIMIT i,1)
        WHERE product = (SELECT product FROM anax_orderRow WHERE `order` = orderId LIMIT i,1);

        SET i = i + 1;

    END WHILE;


    UPDATE `anax_order`
    SET `canceled` = NOW()
    WHERE id = orderId;

    COMMIT;

END
//

DELIMITER ;


DROP PROCEDURE IF EXISTS `changeStock`;

DELIMITER //

CREATE PROCEDURE `changeStock`(
	diff INT,
    prodId INT
)
BEGIN
	UPDATE `anax_stock` SET
	units = units + diff
	WHERE product = prodId;
END
//

DELIMITER ;




DROP PROCEDURE IF EXISTS `getProdOverview`;

DELIMITER //

CREATE PROCEDURE `getProdOverview`(
)
BEGIN
	SELECT P.*,
	CASE
		WHEN (P.active_product = 1) THEN 'ActiveProduct'
		WHEN (P.active_product = 0) THEN 'InactiveProduct'
	END AS status,
	CASE
		WHEN (S.units > 0) THEN 'inStock'
		WHEN (S.units <= 0) THEN 'soldOut'
	END AS stock
	FROM `anax_product` AS P
		INNER JOIN `anax_stock` AS S
			ON P.id = S.product;
END
//

DELIMITER ;





-- Functions
-------------------------------------------------------------------------


DELIMITER //
DROP FUNCTION IF EXISTS `getUnitBalance`//
CREATE FUNCTION `getUnitBalance`(
	thisProd INT
)
RETURNS INT
BEGIN

RETURN (SELECT units FROM anax_stock WHERE product = thisProd);

END
//
DELIMITER ;


DELIMITER //
DROP FUNCTION IF EXISTS `checkProductStatus`//
CREATE FUNCTION `checkProductStatus`(
	activeP INT
)
RETURNS CHAR(20)
BEGIN

	IF activeP = 0 THEN
		RETURN "inactiveProduct";
	END IF;

    RETURN "activeProduct";

END
//
DELIMITER ;
