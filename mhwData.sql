CREATE DATABASE `mhwData`;

USE `mhwData`;

CREATE TABLE `user` (
	`userId` int auto_increment PRIMARY KEY,
	`username` varchar(40) NOT NULL,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`accountType` varchar(40),
    `gamerTag` varchar(255),
    `createAt` Date NOT NULL
);

CREATE TABLE `submit`(
	`submitId` int auto_increment PRIMARY KEY,
    `dps` decimal(255,2) NOT NULL 

)
