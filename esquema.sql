create table user(
   id int not null auto_increment primary key,
    usename varchar(20),
    password varchar(20),
    email varchar(30),
    created_at datetime,
    last_login datetime,
    active int default 1,
    first_name varchar(20),
    last_name varchar(20),
    rol int
    /*en rol 0=edito, 1=admin*/
);

create table posts(
	id int not null auto_increment primary key,
	title varchar(255),
	brief varchar(511),
	content text,
	image varchar(255),
	created_at datetime,
	status int default 1,
	foreign key (user_id) references user(id));

create table comments(
	id int not null auto_increment primary key,
	name varchar(255),
	comment varchar(255),
	created_at datetime,
	status int default 1,
	foreign key (post_id) references post(id)
);
