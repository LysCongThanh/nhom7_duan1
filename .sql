DELIMITER $$
CREATE TRIGGER `authors_date_updated_trigger` BEFORE UPDATE ON `authors` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `books_date_updated_trigger` BEFORE UPDATE ON `books` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `carts_date_updated_trigger` BEFORE UPDATE ON `carts` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `categories_date_updated_trigger` BEFORE UPDATE ON `categories` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `comments_date_updated_trigger` BEFORE UPDATE ON `comments` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `contacts_date_updated_triggers` BEFORE UPDATE ON `contacts` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `orders_date_updated` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `publishers_date_updated_trigger` BEFORE UPDATE ON `publishers` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `users_date_updated_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;