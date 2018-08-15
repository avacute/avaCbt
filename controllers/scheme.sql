CREATE TABLE candidate(
id int auto_increment PRIMARY KEY,
cand_nm varchar(100),
user_id varchar(25),
access_key varchar(25),
status int default 0
);

CREATE TABLE questions(
id int auto_increment PRIMARY KEY,
quest mediumtext,
answer varchar(255),
option_a varchar(255),
option_b varchar(255),
option_c varchar(255),
option_d varchar(255),
option_e varchar(255),
weight int
);


CREATE TABLE candyresult(
id int auto_increment PRIMARY KEY,
user_id varchar(25),
options varchar(255),
score int default 0
);