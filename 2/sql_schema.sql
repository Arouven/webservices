CREATE DATABASE `bookstore`;

CREATE TABLE books(
    isbn Varchar(255) PRIMARY KEY NOT NULL,
    category varchar(255) NOT NULL,
    title Varchar(255) NOT NULL,
    author varchar(255) not null,
    year_published Date NOT NULL,
    description Varchar(255) NOT NULL,
    language Varchar(255) NOT NULL,
    review Varchar(255) NOT NULL,
    best_seller boolean NOT NULL,
    no_books bigint(20) NOT NULL,
    cover_photo varchar(255) NOT NULL,
);

INSERT INTO
    `books` (
        `isbn`,
        `category`,
        `title`,
        `author`,
        `year_published`,
        `description`,
        `language`,
        `review`,
        `best_seller`,
        `no_books`,
        `cover_photo`
    )
VALUES
    (
        'asdf1234',
        'magic',
        'harry potter vol 1',
        'j.k.rowling',
        '2021-06-01',
        'this is the description of harry potter vol 1',
        'english',
        'review of harry potter volume 2',
        '1',
        '10000',
        'https://img.timeinc.net/time/2007/harry_potter/hp_books/sorce_stone.jpg'
    );