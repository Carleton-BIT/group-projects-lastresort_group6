create database if not exists accinfo;
use accinfo;
create table info(
email varchar(255) not NULL,
pass varchar(255) not NULL,
UNIQUE (email)
);
