CREATE DATABASE E_Exam;
CREATE TABLE depts(
    id tinyint unsigned PRIMARY key,
    name varchar(50)
    );

CREATE TABLE levels(
    id tinyint unsigned PRIMARY key,
    name varchar(50)
    );

alter TABLE depts character set utf8 COLLATE utf8_general_ci;
//
CREATE TABLE depts_levels
(
dep_id tinyint not null,
level_id tinyint not null,
FOREIGN KEY(dep_id )REFERENCES depts(id),
FOREIGN KEY(level_id )REFERENCES levels(id),
PRIMARY KEY(dep_id,level_id);
);
CREATE TABLE professors (
id int not null unsigned,
name varchar(50),
dep_id  tinyint,
password varchar(50) not null,
email varchar(50) UNIQUE,
role  ENUM ('admin','general'),
registeration_type Enum ('approved','not approved'),
FOREIGN KEY(dep_id )REFERENCES depts(id),
);


CREATE TABLE subjects(
id int PRIMARY KEY,
name varchar(50) not null,
dep_id tinyint ,
level_id tinyint,
prof_id varchar(50) ,
FOREIGN KEY(dep_id )REFERENCES depts(id),
FOREIGN KEY(level_id )REFERENCES levels(id),
FOREIGN KEY(prof_id )REFERENCES professors(id),
);

CREATE TABLE chapters(
id int PRIMARY KEY,
name varchar(50) not null,
number int unsigned,
subject_id int NOT NULL,
FOREIGN KEY(subject_id )REFERENCES subjects(id),
);

CREATE TABLE questions(
id int PRIMARY KEY,
question text ,
type enum('MCQ','T&F'),
category enum ('A','B','C'),
correct_answer varchar(50),
degree int ,
chap_id int,
FOREIGN KEY(chap_id )REFERENCES chapters(id),
);


create TABLE choices(
id int PRIMARY KEY,
choice varchar(50),
que_id int not null,
FOREIGN KEY(que_id )REFERENCES questions(id)
);









