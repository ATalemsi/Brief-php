/*
create database Personnel
use personnel
create table Equipe(
Id_E int primary key auto_increment,
nom_E varchar(50),
date_creation date
);
create table membre(
Id_M int primary key  auto_increment,
nom varchar(50) not null,
prenom varchar(50)not null,
email varchar(50)not null,
tel varchar(20)not null,
rolee varchar(50) not null,
Equipe_ID int ,
statut varchar(20)not null,
foreign key(Equipe_ID) references Equipe(Id_E)
);
INSERT INTO Equipe (nom_E,date_creation)
VALUES
    ('Équipe A', '2022-01-01'),
    ('Équipe B', '2022-02-01'),
    ('Équipe C', '2022-03-01');

    INSERT INTO membre(nom,prenom,email,tel,rolee,Equipe_ID,statut)
VALUES
    ( 'Doe', 'John', 'john.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'Smith', 'Jane', 'jane.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'Johnson', 'Bob', 'bob.johnson@email.com', '555-123-4567', 'Manager', 3, 'Actif');
*/
 INSERT INTO membre(nom,prenom,email,tel,rolee,Equipe_ID,statut)
VALUES
    ( 'zakarira', 'loulida', 'john1.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'hassan', 'charka', 'jane2.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'hamid', 'molebadar', 'bob3.johnson@email.com', '555-123-4567', 'Manager', 3, 'Actif'),
	( 'abdelhak', 'sinta', 'john4.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'mjid', 'kheyara', 'jane5.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'abdellah', 'potsse', 'bob6.johnson@email.com', '555-123-4567', 'Manager', 3, 'Actif'),
    ( 'abdo', 'hawta', 'john7.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'said', 'lamba', 'jane8.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'hiba', 'dib', 'bob.john9son@email.com', '555-123-4567', 'Manager', 3, 'Actif'),
	( 'abdelhak', 'sinta', 'joh10n.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'mjid', 'kheyara', 'jane11.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'abdellah', 'potsse', 'bob12.johnson@email.com', '555-123-4567', 'Manager', 3, 'Actif'),
    ( 'abdo', 'hawta', 'john15.doe@email.com', '123-456-7890', 'Analyste', 1, 'Actif'),
    ( 'said', 'lamba', 'jan16e.smith@email.com', '987-654-3210', 'Développeur', 2, 'Inactif'),
    ( 'hiba', 'dib', 'bob20.johnson@email.com', '555-123-4567', 'Manager', 3, 'Actif');
use personnel;
    select * from equipe;   
    select * from membre;



    

