drop all 


drop table if exists suppliers;
create table suppliers(
	id int primary key,
    name varchar(50),
    location varchar(100),
    email varchar(50)
    
);

DROP TABLE IF EXISTS products;
CREATE TABLE products(
	productId int PRIMARY KEY,
    name varchar(50) NOT NULL ,
    price dec NOT NULL,
    photo_url varchar(50) NOT NULL,
    info varchar(512) NOT NULL,
    category varchar(15) NOT NULL,
    supplierId int REFERENCES suppliers(id) 
);

DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL,
name varchar(50) NOT NULL,
password varchar(250) NOT NULL
	);
    
DROP TABLE IF EXISTS orders;
create table orders(
	id int primary key AUTO_INCREMENT,
    customerId int references users (id) ,
    orderDate datetime not null DEFAULT CURRENT_TIMESTAMP ,
    shipDate datetime null,
    status int not null DEFAULT '0'
    
    );

DROP TABLE IF EXISTS productOrder;
create table productOrder(
	productId INT REFERENCES products (productId), 
	OrderId INT REFERENCES orders (id),
	amount int not null,
	PRIMARY KEY (orderId,productId)
    );

DROP TABLE IF EXISTS wish_list;
CREATE TABLE wish_list (
  wishlistId int(11) NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  productId int(11) NOT NULL,
  PRIMARY KEY (wishlistId)
);
DROP TABLE IF EXISTS contactus;
CREATE TABLE contactus(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) NOT NULL,
email varchar(50) NOT NULL,
company varchar(250) NOT NULL,
message text NOT NULL
);


Insert into suppliers values(1,'Soroka','B7','soroka@gmail.com'),
(2,'Meir','Kfar Saba','meir@gmail.com'),
(3,'Kal-Med','Holon','Kal-Med@gmail.com'),
(4,'Med-Kal','Tel Aviv','Med-Kal@gmail.com'),
(5,'Hotula','Pach Ashpa','Meow@gmail.com');

Insert into products values (1,'Alco Gel',10,'../photos/alco.jpg','A unique formulation for optimal hand hygiene suitable for use by all family members, both in and out of the home.','Perishible',1),
(2,'Egged',20,'../photos/egged.jpg',' used either to support a medical device such as a dressing or splint, or on its own to provide support to or to restrict the movement of a part of the body','Perishible',1),
(3,'Burn Shield',15,'../photos/bburnshield.jpg','For the emergency care of burns and scalds. A Sterile, Hydrogel product which provides the essential physical protection against burns.','Perishible',1),
(4,'Strecher',300,'../photos/alunk.png','a light frame made from two long poles with a cover of soft material stretched between them, used for carrying people who are ill, injured, or dead','Non Perishable',1),
(5,'Stethoscope',17,'../photos/stato.jpg','Single-sided chestpiece designed for easier grip and maneuvering.','Non Perishable',1),
(6,'Ambu',29,'../photos/ambo.jpg','The Ambu Oval Silicone resuscitator is designed for manual ventilation of neonates though to adults.','Non Perishable',1);

