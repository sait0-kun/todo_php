USE taskApp;
CREATE TABLE users(
user_id INTEGER AUTO_INCREMENT,
user_name VARCHAR(20)  NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL,
PRIMARY KEY (user_id));

CREATE TABLE task(
user_id INTEGER NOT NULL,
task_id INTEGER NOT NULL AUTO_INCREMENT,
task_name TEXT NOT NULL,
PRIMARY KEY (task_id));

INSERT INTO users VALUES ('1', 'ゲスト', SHA1('guest'));
INSERT INTO users VALUES ('2', 'admin', SHA1('admin'));

INSERT INTO task VALUES ('2', null, 'プログラミング');
INSERT INTO task VALUES ('2', null, '筋トレ');
INSERT INTO task VALUES ('2', null, '読書');
INSERT INTO task VALUES ('2', null, '料理');
INSERT INTO task VALUES ('2', null, '散歩');
INSERT INTO task VALUES ('2', null, '仕事');
INSERT INTO task VALUES ('2', null, '旅行');
INSERT INTO task VALUES ('2', null, '買い物');
INSERT INTO task VALUES ('2', null, '卵買う');
INSERT INTO task VALUES ('2', null, '洗濯');
INSERT INTO task VALUES ('2', null, '絵');
