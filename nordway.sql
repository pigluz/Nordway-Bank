CREATE TABLE IF NOT EXISTS `users` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(255) NOT NULL,
	`surname` varchar(255) NOT NULL,
	`birth_place` varchar(255) NOT NULL,
	`login` varchar(255) NOT NULL UNIQUE,
	`email` varchar(255) NOT NULL UNIQUE,
	`pwd` varchar(255) NOT NULL,
	`phonenum` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `balance` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`user_id` int NOT NULL,
	`current_balance` decimal(10,0) NOT NULL,
	`last_updated` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `transactions` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`user_id` int NOT NULL,
	`amount` decimal(10,0) NOT NULL,
	`balance_after` decimal(10,0) NOT NULL,
	`transaction_type` varchar(255) NOT NULL,
	`date` datetime NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `balance` ADD CONSTRAINT `balance_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);
ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);