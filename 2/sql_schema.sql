CREATE DATABASE `bookstore`;

CREATE TABLE books(
    isbn Varchar(255) PRIMARY KEY NOT NULL,
    category varchar(255) NOT NULL,
    title Varchar(255) NOT NULL,
    rating int(1) NOT NULL,
    author varchar(255) not null,
    year_published Date NOT NULL,
    description LONGTEXT NOT NULL,
    language Varchar(255) NOT NULL,
    review INT(5) NOT NULL,
    best_seller boolean NOT NULL,
    no_books bigint(20) NOT NULL,
    cover_photo varchar(255) NOT NULL,
);

INSERT INTO
    `books` (
        `isbn`,
        `category`,
        `title`,
        `rating`,
        `author`,
        `year_published`,
        `description`,
        `language`,
        `review`,
        `best_seller`,
        `cover_photo`
    )
VALUES
    (
        '9780062407818',
        'All category',
        'Never Split the Difference: Negotiating As If Your Life Depended On It',
        5,
        'Chris Voss',
        '2016-03-17',
        'From Scribd: About the Book

Hailed as one of the best modern books on the art of negotiation, Never Split the Difference is written by Chris Voss, a renowned negotiator.

After serving on the police force in Kansas City, Missouri, and experiencing what the rough streets there had to offer, Voss joined the FBI to further his career. He eventually became a hostage negotiator, and in this line of work he often came face-to-face with a range of criminals, including bank robbers and terrorists.

Only by becoming the FBI' s lead international kidnapping negotiator did Voss reach the pinnacle of his career,
        and Never Split the Difference will take you inside the life -
        or - death stakes negotiations that Voss managed.This book gets inside Voss 's head, revealing his skills and methods that allowed him and his colleagues to be so successful when so much was on the line.

Broken down into nine effective principles, this practical guide will teach you the methods and strategies you can use to become more persuasive in both your personal and professional life.

As Voss says, life is a series of negotiations that you should always be prepared for. Everything from buying a car to negotiating a salary, and even discussing things with your partner. With the knowledge contained in Never Split the Difference you can take your emotional intelligence to the next level.',
        'english',
        110,
        '1',
        'https://imgv2-1-f.scribdassets.com/img/word_document/310560108/original/216x287/7b8f89909b/1627012728?v=1'
    ),
    (
        '2626920',
        'erotica',
        'The Violet and the Tom',
        5,
        'Eve Ocotillo',
        '2009-01-11',
        'In what might have been the middle ages, had neither Alexander the Great nor Jesus the prophet died young, the Greek State is a powerful economic force in southern Europe, and slavery is a profitable and well-entrenched social institution. Nygell, a Lord of the Northern Isles, is given the gift of a Grecian slave by the King. Nygell wants no such responsibility.

A homoerotic romance. Set in an alternate universe with institutionalized slavery, thus consent is by nature dubious at best. Elements of BDSM.',
        'english',
        343,
        '1',
        'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1295750108l/8164754.jpg'
    ),
    (
        '00000000001',
        'fantasy',
        'The student prince',
        4,
        'FayJay',
        '2012-07-29',
        'A modern day (BBC) Merlin AU set at the University of St Andrews, featuring teetotal kickboxers, secret wizards, magnificent bodyguards of various genders, irate fairies, imprisoned dragons, crumbling gothic architecture, arrogant princes, adorable engineering students, stolen gold, magical doorways, attempted assassination, drunken students, shaving foam fights, embarrassing mornings after, The Hammer Dance, duty, responsibility, friendship and true love...',
        'english',
        596,
        '1',
        'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1400436772l/17277854.jpg'
    );