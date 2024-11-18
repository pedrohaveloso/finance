CREATE DATABASE IF NOT EXISTS `Finance`;

CREATE TABLE
  IF NOT EXISTS `Category` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(120) NOT NULL,
    `priority` INT (5) UNSIGNED DEFAULT (0) NOT NULL
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
    `year` INT (4) UNSIGNED NOT NULL
  );

INSERT INTO month (name, year) VALUES ('January',2024);
INSERT INTO month (name, year) VALUES ('February',2024);

CREATE TABLE
  IF NOT EXISTS `Transaction` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `type` ENUM ('input', 'output') NOT NULL,
    `description` TEXT NOT NULL,
    `value` DECIMAL(15, 2) NOT NULL,
    `month_id` INT NOT NULL,
    FOREIGN KEY (`month_id`) REFERENCES `Month` (`id`)
  );

CREATE TABLE
  IF NOT EXISTS `TransactionCategory` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `transaction_id` INT NOT NULL,
    FOREIGN KEY (`transaction_id`) REFERENCES `Transaction` (`id`),
    `category_id` INT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`)
  );