create table book (
    id int primary key auto_increment,
    name_book varchar(100),
    author varchar(50),
    price float,
    producer varchar(50)
)

create table userr(
    id int primary key auto_increment,
    name_account varchar(100),
    email varchar(100),
    fullname varchar(100),
    phone int(10),
    password varchar(50)
)