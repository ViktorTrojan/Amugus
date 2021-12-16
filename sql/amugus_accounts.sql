CREATE DATABASE amugus;
use amugus;

CREATE TABLE accounts (
    uid INTEGER NOT NULL,
    uname VARCHAR(10) NOT NULL,
    password VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    profilePicture INTEGER NOT NULL,
    createDate DATE NOT NULL,
    admin BIT NOT NULL,

    PRIMARY KEY (uid)

);


--example:

INSERT INTO accounts VALUES ('1', 'user1', '1234', 'test@mail.com', '1', '2021-12-06', '0');
INSERT INTO accounts VALUES ('2', 'user2', '1234', 'test@mail.com', '1', '2021-12-06', '0');
INSERT INTO accounts VALUES ('3', 'user3', '1234', 'test@mail.com', '1', '2021-12-06', '0');
INSERT INTO accounts VALUES ('4', 'user4', '1234', 'test@mail.com', '1', '2021-12-06', '0');
INSERT INTO accounts VALUES ('5', 'user5', '1234', 'test@mail.com', '1', '2021-12-06', '0');