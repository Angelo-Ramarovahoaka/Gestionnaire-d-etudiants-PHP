USE liste_etudiant;

DROP TABLE IF EXISTS etudiants;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS password_resets;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL, 
    parcours VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,    
    adresse VARCHAR(100) NOT NULL,
    sex VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE password_resets (
  token varchar(64) NOT NULL PRIMARY KEY,
  email varchar(255) NOT NULL,
  expires int NOT NULL
);

