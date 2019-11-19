CREATE DATABASE IF NOT EXISTS 'myphp';

CREATE TABLE `myphp` (
    `country` varchar(30) DEFAULT NULL,
    `capital` varchar(30) DEFAULT NULL,
    `continent` enum('Africa','Asia','Oceania','Europe','North-America','South-America')
        DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Sambia', 'Lusaka', 'Africa');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Germany', 'Berlin', 'Europe');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Australia', 'Canberra', 'Oceania');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Italia', 'Rom', 'Europe');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Thailand', 'Bangkok', 'Asia');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Canada', 'Ottawa', 'North-America');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Brasil', 'Brasilia', 'South-America');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('China', 'Peking', 'Asia');