
CREATE DATABASE videoteka;

CREATE TABLE filmovi(
    id INT PRIMARY KEY ,
    naslov VARCHAR(255) NOT NULL,
    reziser VARCHAR(255) NOT NULL,
    god_izdavanja YEAR NOT NULL,
    zanr VARCHAR(255) NOT NULL,
    ocena DECIMAL(3,1)
);

INSERT INTO filmovi(id, naslov, reziser, god_izdavanja, zanr, ocena)
VALUES(1, "The Shawshank Redemption", "Frank Darabont", 1994, "Drama", 9.3),
(2, "The Godfather", "Francis Ford Coppola", 1972, "Crime", 9.2),
(3, "Fight Club", "David Fincher", 1999, "Drama", 8.8),
(4, "Forrest Gump", "Robert Zemeckis", 1994, "Romance", 8.8),
(5, "Pulp Fiction", "Quentin Tarantino", 1994, "Drama", 8.9);

SELECT * FROM filmovi WHERE `zanr`IN ("Romance", "Comedy", "Drama");
SELECT * FROM filmovi WHERE `ocena` BETWEEN 8 AND 9;
SELECT DISTINCT reziser FROM filmovi WHERE god_izdavanja = 1994 ORDER BY reziser ASC;
SELECT * FROM filmovi WHERE `zanr` != "Drama";
SELECT * FROM filmovi ORDER BY ocena DESC LIMIT 1;
SELECT * FROM filmovi WHERE zanr LIKE "Drama" ORDER BY ocena DESC  LIMIT 1;
SELECT reziser FROM filmovi ORDER BY ocena DESC LIMIT 3;
SELECT DISTINCT zanr FROM filmovi;
SELECT naslov, reziser AS "(reziser)" FROM filmovi;
SELECT naslov, reziser AS "(reziser)", god_izdavanja FROM filmovi ORDER BY god_izdavanja ASC;
SELECT AVG(ocena) AS "Prosek ocena posle 1990. godine" FROM filmovi WHERE god_izdavanja > 1990;


