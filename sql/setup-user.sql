CREATE TABLE `users`(
	`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`username` VARCHAR(100),
    `password` VARCHAR(255),
    `name` VARCHAR(100) DEFAULT NULL,
    `profile` TEXT DEFAULT NULL
);

INSERT INTO `users`(`username`, `password`)
	VALUES
    ('testuser', 'testpass')
;

SELECT * FROM users;
