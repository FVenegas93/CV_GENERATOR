create database cvbd;
use cvbd;

create table users(
username varchar(255) primary key,
passwd varchar(255),
email varchar(255),
first_name varchar(255),
first_surname varchar(255),
nif varchar(9),
address varchar(255),
country varchar(255),
region varchar(255),
city varchar(255),
phone varchar(9), 
is_admin boolean,
activation_code int
);

create table cv(
cod_cv int auto_increment primary key,
name_cv varchar(255),
username varchar(255)
);

create table languages(
cod_lang int auto_increment primary key,
name_lang varchar(255),
lvl_lang varchar(255),
username varchar(255)
);

create table experiences(
cod_exp int auto_increment primary key,
name_exp varchar(255),
business varchar(255),
beginning varchar(255),
ending varchar(255), 
job varchar(255),
username varchar(255)
);

create table titles(
cod_title int auto_increment primary key,
name_title varchar(255),
training_center varchar(255),
title_beginning varchar(255),
title_ending varchar(255),
title_description varchar(255),
username varchar(255)
);

create table about(
cod_about int auto_increment primary key,
name_about varchar(255),
self_description varchar(255),
username varchar(255)
);

create table cv_has_lang(
cod_cv int,
cod_lang int,
primary key(cod_cv, cod_lang)
);

create table cv_has_title(
cod_cv int, 
cod_title int, 
primary key(cod_cv, cod_title)
);

create table cv_has_about(
cod_cv int, 
cod_about int,
primary key(cod_cv, cod_about)
);

create table cv_has_exp(
cod_cv int, 
cod_exp int,
primary key(cod_cv, cod_exp)
);

alter table languages
add foreign key (username)
references users(username)
on update cascade
on delete cascade;

alter table experiences
add foreign key (username)
references users(username)
on update cascade
on delete cascade;

alter table titles
add foreign key (username)
references users(username)
on update cascade
on delete cascade;

alter table about
add foreign key (username)
references users(username)
on update cascade
on delete cascade;

alter table cv_has_lang
add foreign key (cod_cv)
references cv(cod_cv)
on update cascade
on delete cascade,
add foreign key (cod_lang)
references languages(cod_lang)
on update cascade
on delete cascade;

alter table cv_has_title
add foreign key (cod_cv)
references cv(cod_cv)
on update cascade
on delete cascade,
add foreign key (cod_title)
references titles(cod_title)
on update cascade
on delete cascade;

alter table cv_has_about
add foreign key (cod_cv)
references cv(cod_cv)
on update cascade
on delete cascade,
add foreign key (cod_about)
references about(cod_about)
on update cascade
on delete cascade;

alter table cv_has_exp
add foreign key (cod_cv)
references cv(cod_cv)
on update cascade
on delete cascade,
add foreign key (cod_exp)
references experiences(cod_exp)
on update cascade
on delete cascade;
