CREATE DATABASE prueba_tecnica;
use prueba_tecnica;

CREATE TABLE users(
    id int autoincrement primary key,
    email varchar(256) unique not null,
    username varchar(100) unique not null,
    pass varchar(256) not null,
)

CREATE TABLE posts(
    id int autoincrement primary key,
    posttext text,
    postimage varchar(256),
    user_id int not null,
    foreign key(user_id) references users(id)
)

create table likes(
    id int autoincrement primary key,
    post_id int not null,
    user_id int not null,
    foreign key (post_id) references posts(id),
    foreign key (user_id) references users(id)
 )

 create table comments(
     id int autoincrement primary key,
     user_id int not null, 
     post_id int not null,
     comment text not null,
     foreign key (user_id) references users(id),
     foreign key (post_id) references posts(id)
 )