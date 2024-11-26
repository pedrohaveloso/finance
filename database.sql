CREATE DATABASE IF NOT EXISTS `Finance`;

USE Finance;

CREATE TABLE
  IF NOT EXISTS `User` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL
  );

CREATE TABLE
  IF NOT EXISTS `Category` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(120) NOT NULL,
    `user_id` INT DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE
  );

INSERT INTO
  `Category` (`name`)
VALUES
  ('Alimentação'),
  ('Lazer'),
  ('Casa'),
  ('Moradia'),
  ('Viagem'),
  ('Estudo'),
  ('Automóvel'),
  ('Transporte'),
  ('Roupas'),
  ('Pet');

CREATE TABLE
  IF NOT EXISTS `Month` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` ENUM (
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    ) NOT NULL,
    `year` INT (4) UNSIGNED NOT NULL,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE
  );

CREATE TABLE
  IF NOT EXISTS `Transaction` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `type` ENUM ('input', 'output') NOT NULL,
    `description` TEXT NOT NULL,
    `value` DECIMAL(15, 2) NOT NULL,
    `category_id` INT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`) ON DELETE CASCADE,
    `month_id` INT NOT NULL,
    FOREIGN KEY (`month_id`) REFERENCES `Month` (`id`) ON DELETE CASCADE,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE
  );