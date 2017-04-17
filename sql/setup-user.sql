CREATE TABLE `anax_users`(
	`username` VARCHAR(255) PRIMARY KEY NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(100) DEFAULT NULL,
    `age` INT DEFAULT NULL,
    `profile` TEXT DEFAULT NULL
);

INSERT INTO `anax_users`(`username`, `password`)
	VALUES
    ('ole', 'dole'),
    ('gustav', 'hash'),
    ('markus', 'ee'),
    ('erika', 'pika'),
    ('anna', 'sanan')
;

SELECT * FROM anax_users;
