CREATE TABLE comments(
	cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
	uid varchar(128) not null,
    date datetime not null,
    message TEXT (128) not null
);