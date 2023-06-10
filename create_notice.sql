CREATE DATABASE notice_board;
USE notice_board;
CREATE TABLE notices (
    id INT(11)PRIMARY KEY
    AUTO_INCREMENT,
    notice_title VARCHAR(255) NOT NULL,
    notice_description TEXT NOT NULL
)