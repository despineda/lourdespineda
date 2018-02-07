CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`role` varchar(255) NOT NULL,
	`image` varchar(255) NOT NULL,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`address` int(11) NOT NULL,
	`contact_number` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `items` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`price` DECIMAL(11) NOT NULL,
	`category` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `orders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`staff_id` int(11) NOT NULL,
	`total` int(11) NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `order_items` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`quantity` int(11) NOT NULL,
	`subtotal` int(11) NOT NULL,
	`order_id` int(11) NOT NULL,
	`item_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `staff` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`staff_id`) REFERENCES `staff`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `order_items` ADD CONSTRAINT `order_items_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`);

ALTER TABLE `order_items` ADD CONSTRAINT `order_items_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);

