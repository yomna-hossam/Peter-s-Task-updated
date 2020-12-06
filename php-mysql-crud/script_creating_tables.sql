CREATE DATABASE php_mysql_crud;

use php_mysql_crud;

CREATE TABLE classes(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  classname VARCHAR(255) NOT NULL,
  description TEXT
);

CREATE TABLE students(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  description TEXT
);

CREATE TABLE teachers(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  description TEXT
);

CREATE TABLE teacherclasses(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  classid INT(11) NOT NULL,
  teacherid INT(11) NOT NULL
);

CREATE TABLE studentclasses(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  classid INT(11) NOT NULL,
  studentid INT(11) NOT NULL
);

