create database crud;

create table users(

	id integer not null auto_increment primary key,
	name varchar(255),
	age integer,
	email varchar(255)

)