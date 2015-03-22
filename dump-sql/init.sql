CREATE DATABASE IF NOT EXISTS `framework`;

CREATE TABLE IF NOT EXISTS `users` (
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL
);

INSERT INTO `users` (`email`,`password`)VALUES('demo@mpwarfwk.com','demo');
INSERT INTO `users` (`email`,`password`)VALUES('admin@mpwarfwk.com','admin');
INSERT INTO `users` (`email`,`password`)VALUES('root@mpwarfwk.com','root');
