CREATE TABLE `anax_admin`(
	`admin_name` VARCHAR(50) PRIMARY KEY NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	`clearance` INT DEFAULT 1
);


INSERT INTO `anax_admin`(admin_name, `password`)
	VALUES
    ('admin', '$2y$10$ZudALAACXi6B8xSRfB/z9OxlSUppmGchm5qyYCiZUj8UQ8jlIf3EO')
	-- password: hejsan

;

select * from anax_admin;
