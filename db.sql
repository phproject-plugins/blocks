CREATE TABLE `block`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hook` VARCHAR(255) NOT NULL,
  `content` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_unicode_ci;