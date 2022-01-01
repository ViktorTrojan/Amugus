CREATE DATABASE amugus;
use amugus;

CREATE TABLE accounts (
    row INTEGER NOT NULL,
    id INTEGER NOT NULL,
    username VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    profilePicture INTEGER NOT NULL,
    createDate DATE NOT NULL,
    admin BIT NOT NULL,

    PRIMARY KEY (id)

);


--example:
INSERT INTO accounts VALUES ('1', '1', 'user1', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('2', '2', 'user2', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('3', '3', 'user3', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('4', '4', 'user4', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('5', '5', 'user5', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('7', '6', 'user6', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('8', '7', 'user7', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('10', '8', 'user8', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '9', 'user9', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '10', 'user10', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '11', 'user11', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '12', 'user12', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '13', 'user13', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '14', 'user14', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '15', 'user15', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '16', 'user16', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '17', 'user17', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '18', 'user18', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '19', 'user19', '1234', 'test@mail.com', '1', '2021-12-06', 0);
INSERT INTO accounts VALUES ('11', '20', 'user20', '1234', 'test@mail.com', '1', '2021-12-06', 0);