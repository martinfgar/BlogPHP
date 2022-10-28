create database blog;
GO
create table user(
   id int not null auto_increment primary key,
    username varchar(20) unique,
    password varchar(200),
    email varchar(30),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    last_login datetime,
    active int default 1,
    first_name varchar(20),
    last_name varchar(20),
    rol int
    /*en rol 0=edito, 1=admin*/
);

create table post(
	id int not null auto_increment primary key,
	title varchar(255),
	brief varchar(511),
	content text,
	image longblob,
	created_at datetime DEFAULT CURRENT_TIMESTAMP,
	status int default 1,
    user_id int,
	foreign key (user_id) references user(id)
);

create table comment(
	id int not null auto_increment primary key,
	name varchar(255),
	comment text,
	created_at datetime DEFAULT CURRENT_TIMESTAMP,
	status int default 1,
    post_id int,
	foreign key (post_id) references post(id)
);

