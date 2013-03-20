/*First create our posts table*/
CREATE TABLE posts (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(50),
	body TEXT,
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
);

/*Then insert some posts into the table*/
INSERT INTO posts (title,body,created)
	VALUES ('The First title','The first body',NOW());
INSERT INTO posts (title,body,created)
	VALUES ('The Second title','The second body',NOW());
INSERT INTO posts (title,body,created)
	VALUES ('The third title','The third body',NOW());
