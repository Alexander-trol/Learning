CREATE DATABASE chat

CREATE TABLE `chat_messaggi` (
    id_chat_messagi int(11) NOT NULL AUTO_INCREMENT,
    id_user_r int(11) NOT NULL,
    id_user_m int(11) NOT NULL,
    messaggi text NOT NULL,
    orario timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    stato int(1) NOT NULL,
    PRIMARY KEY(id_chat_messaggi)
);

CREATE TABLE login (
    id_user int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id_user)
);

CREATE TABLE dettagli_login (
    id_dettagli int(11) NOT NULL AUTO_INCREMENT,
    id_user int(11) NOT NULL,
    ultima_attivita timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_dettagli)
);