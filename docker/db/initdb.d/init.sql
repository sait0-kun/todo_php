USE taskApp;
CREATE TABLE users(
user_id INTEGER AUTO_INCREMENT,
user_name VARCHAR(20) NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL,
PRIMARY KEY (user_id));

CREATE TABLE task(
user_id INTEGER NOT NULL,
task_id INTEGER NOT NULL AUTO_INCREMENT,
task_name VARCHAR(100) NOT NULL,
priority VARCHAR(1),
PRIMARY KEY (task_id));

INSERT INTO users VALUES ('1', 'admin_a', SHA1('admin_a'));
INSERT INTO users VALUES ('2', 'admin_b', SHA1('admin_b'));
INSERT INTO users VALUES ('3', 'admin_c', SHA1('admin_c'));