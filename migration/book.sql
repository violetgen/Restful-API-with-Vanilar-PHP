DROP TABLE IF EXISTS books;
CREATE TABLE books (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  author varchar(100) NOT NULL,
  price varchar(10) NOT NULL,
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

