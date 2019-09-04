drop database if exists socialIris;
create database socialIris;
use socialIris;

create table user
(
	idUser int(5) not null auto_increment,
	username varchar(50) not null,
	sexe enum('man', 'woman'),
	password varchar(50) not null,
	lastName varchar(50) not null,
	firstName varchar(50) not null,
	email varchar(30) not null,
	folder varchar(30) not null,
	imgUser varchar(50) null,
	coverUser varchar(50) null,
	aboutUser varchar(100) null,
	lives varchar(20) null,
	country varchar(20) null,
	work varchar(20) null default "Student",
	/*tel varchar(10) null,
	statut enum('celibataire', 'couple', 'marier', 'inconnu'),*/
	primary key(idUser)
);

create table token
(
	idToken int(5) not null,
	token varchar(40) not null,
	dateToken date not null,
	primary key(idToken)
);

create table friend
(
	idUser int(5) not null,
	idFriend int(5) not null,
	primary key(idUser, idFriend),
	foreign key(idUser) references user(idUser),
	foreign key(idFriend) references user(idUser)
);

create table setting
(
	idSetting int(5) not null auto_increment,
	idUser int(5) not null,
	displayFriend boolean,
	displayEmail boolean,
	primary key(idSetting),
	foreign key(idUser) references user(idUser)
);

create table file
(
	idFile int(5) not null auto_increment,
	idUser int(5) not null,
	dirFile varchar(50) not null,
	primary key(idFile),
	foreign key(idUser) references user(idUser)
);

create table task
(
	idTask int(5) not null auto_increment,
	nameTask varchar(50),
	description varchar(100),
	difficulty enum('1', '2', '3', '4', '5'),
	statut enum('en cours', 'terminer', 'annuler'),
	primary key(idTask)
);

create table request
(
	idTask int(5) not null,
	idUser int(5) not null,
	dateRequest date,
	primary key(idTask, idUser),
	foreign key(idTask) references task(idTask),
	foreign key(idUser) references user(idUser)
);

create table message
(
	idMessage int(5) not null auto_increment,
	message varchar(255) not null,
	dateMessage date,
	timeMessage time,
	-- typeMessage enum ('send', 'respond'),
	idUser int(5) not null,
	idFriend int(5) not null,
	primary key(idMessage),
	foreign key(idUser) references user(idUser),
	foreign key(idFriend) references user(idUser)
);

create table post
(
	idPost int(5) not null auto_increment,
	post varchar(50) not null,
	datePost date,
	postLike int(5),
	idUser int(5) not null,
	primary key(idPost),
	foreign key(idUser) references user(idUser)
);

insert into user values
	(null, 'Sasorishi', 'man', '123', 'ON', 'Alban', 'on_alban@yahoo.fr', "5c0e7adda12b1", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Torcy", "France", "MAKEFLO - Developper "),
	(null, 'Jessica', 'woman', '123', 'Desjardins', 'Jessica', 'jessica@gmail.com', "5c0e7ae1acb88", "profil.png", "cover.png", "I am a student from IRIS school, I like egypt and sandwich !", "Fontainebleau", "France", DEFAULT),
	(null, 'Andrew', 'man', '123', 'Mondor', 'Andrew', 'andrew@gmail.com', "5c0e7ae2ed4c4", "profil.png", "cover.png", "I am a student from IRIS school, I like charette and coding !", "Viroflay", "France", DEFAULT),
	(null, 'Daniel', 'man', '123', 'Tacos','Daniel', 'daniel@gmail.com', "5c0e7ae08eca5", "profil.png", "cover.png", "I am a student from IRIS school, I like eat tacos !", "Boissy Saint Leger", "France", DEFAULT),
	(null, 'Lucinda', 'woman', '123', 'Messadi', 'Lucinda', 'lucinda@gmail.com', "5c0e7ae41d3fa", "profil.png", "cover.png", "I am a student from IRIS school, I like eat sushi and popcorn !", "Torcy", "France", DEFAULT),
	(null, 'Tan', 'man', '123', 'Zaozuy', 'Tan', 'tan@gmail.com', "5c0e7ae53d68a", "profil.png", "cover.png", "I am a game developper, I like japanase's culture !", "Torcy", "France", DEFAULT),
	(null, 'Khoi', 'man', '123', 'Guyanne', 'Khoi', 'khoi@gmail.com', "5c0e7ae385a71", "profil.png", "cover.png", "I am a data analyst, I like everything !", "Torcy", "France", DEFAULT),
	(null, 'Le-Thi', 'woman', '123', 'Nguyen', 'Le-Thi', 'le-thi@gmail.com', "5c0e7ae492d87", "profil.png", "cover.png", "I am a HTTN's member, I like my dad !", "Torcy", "France", DEFAULT),
	(null, 'Vinh', 'man', '123', 'Kinh Tran', 'Vinh', 'vinh@gmail.com', "5c0e7ae63952d", "profil.png", "cover.png", "I am a engineer , I like sing !", "Torcy", "France", DEFAULT),
	(null, 'Phuong', 'woman', '123', 'Nguyen', 'Chan Phuong', 'cphuong@gmail.com', "5c0e7ae261751", "profil.png", "cover.png", "I am a student, I like sleep !", "Lognes", "France", DEFAULT),
	(null, 'Nam', 'man', '123', 'Nguyen', 'Nam', 'nam@gmail.com', "5c0e7af9ad78e", "profil.png", "cover.png", "I am a fan keyakizaka46, I like japanase's idols !", "Lognes", "France", DEFAULT),
	(null, 'Suzy', 'woman', '123', 'Le', 'Suzy', 'suzy@gmail.com', "5c0e7af53f35d", "profil.png", "cover.png", "I am a student, I like everything !", "Lognes", "France", DEFAULT),
	(null, 'Estelle', 'woman', '123', 'Bo', 'Estelle', 'estelle@gmail.com', "5c0e7af367a6d", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Saint Thibault", "France", DEFAULT),
	(null, 'Vanida', 'woman', '123', 'Ka', 'Vanida', 'vanida@gmail.com', "5c0e7af7419d8", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Lognes", "France", DEFAULT),
	(null, 'Laure', 'woman', '123', 'Quoi', 'Laure', 'laure@gmail.com', "5c0e7af45495a", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Lognes", "France", DEFAULT),
	(null, 'Maxence', 'man', '123', 'Pinto', 'Maxence', 'maxence@gmail.com', "5c0e7af8656d4", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Torcy", "France", DEFAULT),
	(null, 'Styll', 'man', '123', 'Seris', 'Styll', 'styll@gmail.com', "5c0e7af237940", "profil.png", "cover.png", "I am a student from IRIS school, I like eat food and play game !", "Torcy", "France", DEFAULT),
	(null, 'Laeticia', 'woman', '123', 'Beck', 'Laeticia', 'laeticia@gmail.com', "5c0e7af643458", "profil.png", "cover.png", "I am a student from IRIS school, I like read and write novel !", "Torcy", "France", DEFAULT);

insert into task values
	(null, 'Aide devoir', 'faire un devoir en PHP', '3', 'en cours'),
	(null, 'Aide bricolage', 'faire un drone', '4', 'en cours'),
	(null, 'Aide amenagement', 'faire un devoir en SQL', '2', 'terminer'),
	(null, 'Aide devoir', 'faire un devoir en Python', '5', 'annuler'),
	(null, 'Aide nettoyage', 'faire un nettoyage apres week-end integration', '4', 'en cours'),
	(null, 'Aide devoir', 'faire un devoir en SQL', '2', 'en cours');

insert into request values
	('1', '1', '2018-05-30'),
	('2', '5', '2018-08-02'),
	('3', '4', '2018-11-21'),
	('4', '15', '2018-06-28'),
	('5', '12', '2018-12-14'),
	('6', '8', '2018-09-12');

insert into message values
	(null, "Hello Andrew", "2018-12-17", "18:00:00", "1", "3"),
	(null, "Hello Alban", "2018-12-17", "19:00:00", "3", "1"),
	(null, "How are you ?", "2018-12-17", "20:00:00", "1", "3"),
	(null, "fine", "2018-12-17", "21:00:00", "3", "1"),
	(null, "ok", "2018-12-17", "19:00:00", "2", "1");

insert into post values
	(null, "Hello, guys !", "2018-1-2", "13", "1"),
	(null, "I like charette !", "2018-5-28", "2", "1"),
	(null, "I playing FIFA !", "2018-2-14", "5", "1"),
	(null, "PIZZA TIME !", "2018-6-25", "8", "1"),
	(null, "Coding time !", "2018-11-8", "24", "1"),
	(null, "Di Ngu !", "2018-12-4", "34", "1");

insert into friend values
	("1", "2"),
	("1", "3"),
	("1", "4"),
	("1", "5"),
	("1", "8"),
	("1", "10"),
	("1", "15"),
	("2", "1"),
	("2", "7"),
	("2", "4"),
	("2", "6"),
	("2", "14");

update user set password = MD5('123');

