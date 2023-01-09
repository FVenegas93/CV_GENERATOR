create database cvbd;
use cvbd;

create table users(
username varchar(255) primary key,
passwd varchar(255),
email varchar(255),
first_name varchar(255),
first_surname varchar(255),
second_surname varchar(255),
nif varchar(9),
address varchar(255),
country varchar(255),
region varchar(255),
city varchar(255),
phone varchar(9),
is_admin boolean,
activation_code int
);