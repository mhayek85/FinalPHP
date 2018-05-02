CREATE DATABASE if not exists `pizzaProject` CHARACTER SET utf8;

GRANT ALL PRIVILEGES ON `pizzaProject`.* TO 'lamp1user'@'localhost';
GRANT ALL PRIVILEGES ON `pizzaProject`.* TO 'lamp1user'@'127.0.0.1';

USE pizzaProject;



drop table if exists topping;
drop table if exists pizza;
drop table if exists order_summary;
drop table if exists orders;
drop table if exists address;
drop table if exists member;

CREATE TABLE if not exists member (
	member_ID int(11) not null AUTO_INCREMENT,
	email varchar(50) not null,
	password varchar(50) not null,
	first_name varchar(30) not null,
	last_name varchar(30) not null, 
	phone varchar(17) not null,
	PRIMARY KEY (`member_ID`),
	KEY `first_last` (`first_name`,`last_name`)
);

drop table if exists address;
CREATE TABLE if not exists address (
	address_ID int(11) NOT NULL AUTO_INCREMENT,
	ad_member_ID int(11) not null,
	address_name varchar(70) not null,
	city varchar(40) not null,
	province varchar(2) not null,
	apartment_num varchar(6) not null,
	postal_code varchar(6) not null,
	PRIMARY KEY (`address_ID`),
	foreign key (ad_member_ID) references member(member_ID)
);

drop table if exists orders;
CREATE TABLE if not exists orders (
	order_ID int(11) not null AUTO_INCREMENT,
	or_member_ID int(11) not null,
	order_type varchar(20) not null,
	PRIMARY KEY (`order_ID`),
	foreign key (or_member_ID) references member(member_ID)
	
);

drop table if exists pizza;
CREATE TABLE if not exists pizza (
	pizza_ID int(11) not null AUTO_INCREMENT,
	size varchar(10) not null,
	pizza_order_ID int(11) not null,
	sauce_type varchar(20) not null,
	dough_type varchar(20) not null,
	cheese_type varchar(20) not null,
	PRIMARY KEY (`pizza_ID`),
	foreign key (pizza_order_ID) references orders(order_ID)
);

drop table if exists topping;
CREATE TABLE if not exists topping (
	topping_ID int(11) not null AUTO_INCREMENT,
	topping varchar(300) not null,
	topping_pizza_ID int(11) not null,
	PRIMARY KEY (`topping_ID`),
	foreign key (topping_pizza_ID) references pizza(pizza_ID)
);





drop table if exists order_summary;
CREATE TABLE if not exists order_summary (
	order_summary_ID int(11) not null AUTO_INCREMENT,
	sum_order_ID int(11) not null,
	pizza_size varchar(10) not null,
	address_name varchar(70) not null,
	sauce_type varchar(20) not null,
	dough_type varchar(20) not null,
	cheese_type varchar(20) not null,
	topping varchar(300) not null,
	
	PRIMARY KEY (`order_summary_ID`),
	foreign key (sum_order_ID) references orders(order_ID)
	
);