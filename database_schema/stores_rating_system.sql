DROP DATABASE IF EXISTS stores_rating_system;
CREATE DATABASE stores_rating_system;
USE stores_rating_system;

CREATE TABLE admin
(
    id          int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name        varchar(255) NOT NULL,
    phone       int(11) NOT NULL,
    email       varchar(255) NOT NULL,
    password    varchar(255) NOT NULL,
    status      int(11) NOT NULL,
    address     varchar(255) NOT NULL,
    description mediumtext   NOT NULL
);

INSERT INTO admin (name, phone, email, password, status, address, description)
VALUES ('admin', 0123456789, 'admin@admin.com', md5('admin'), 1, 'Gaza', 'Initial Admin');

CREATE TABLE category
(
    id          int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name        varchar(255) NOT NULL,
    description varchar(255) NOT NULL
);

CREATE TABLE store
(
    id           int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name         varchar(255)  NOT NULL,
    description  varchar(255)  NOT NULL,
    address      varchar(255)  NOT NULL,
    phone_number int(11) NOT NULL,
    category_id  int(11) NOT NULL,
    logo_image   varchar(2555) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE rating
(
    id             int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rating         int(11) NOT NULL,
    store_id       int(11) NOT NULL,
    FOREIGN KEY (store_id) REFERENCES store(id)
);