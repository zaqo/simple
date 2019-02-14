/* 

	USER records table 
	<14/02/19> S.Pavlov

*/
CREATE TABLE `test`.`users` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`user_name` VARCHAR(64) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	`user_password` varchar(128) NOT NULL,
	`isValid` BOOLEAN DEFAULT NULL , 
	PRIMARY KEY (`id`)
	) ENGINE = InnoDB;