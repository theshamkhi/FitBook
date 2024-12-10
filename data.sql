CREATE DATABASE FitBook;
USE FitBook;

CREATE TABLE Membres (
    ID_Membre INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(50),
    Prenom VARCHAR(50),
    Telephone VARCHAR(20),
    Email VARCHAR(100)
);

CREATE TABLE Activites (
    ID_Activité INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(50),
    Description TEXT
);

CREATE TABLE Reservations (
    ID_Reservation INT PRIMARY KEY AUTO_INCREMENT,
    ID_Membre INT,
    ID_Activité INT,
    ReservDate DATE,
    ReservHeure TIME,
    FOREIGN KEY (ID_Membre) REFERENCES Membres(ID_Membre),
    FOREIGN KEY (ID_Activité) REFERENCES Activités(ID_Activité)
);
