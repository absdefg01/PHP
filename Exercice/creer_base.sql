drop table Creneau cascade constraints; 
drop table Matiere cascade constraints;
drop table EffFormation cascade constraints;
drop table Formation cascade constraints;
drop table Enseignant cascade constraints;
drop table Statut cascade constraints;
drop table Salle cascade constraints;


-- creation de la base

create table Salle
( NSalle varchar2(10) constraint PK_Salle PRIMARY KEY,
TSal varchar2(2) constraint CK_Type_Salle Check (TSal in ('C', 'TD', 'TP')),
  Capacite number(3),
  IdPool number(2)
  );

create table Statut
( Grade varchar2(10) constraint Key_Grade PRIMARY KEY,
  NbHeurSt number(3));

create table Enseignant
 (IdEnseign number(5) constraint Key_Enseignant PRIMARY KEY,
  Nom varchar2(20),
  Prenom varchar2 (20),
  Grade varchar2 (10),
  NbHDisp number(5,2),
  constraint Enseignant_Grade foreign key (Grade) references Statut (Grade));

  
 create table Formation
  ( IdFor varchar2(10) constraint Key_Formation PRIMARY KEY,
    LibF varchar2(100),
    NbGrC number(1),
    NbGrTD number(1),
    NbGrTP number(2),
    IdPool number(2));
  
 create table EffFormation
  ( IdFor varchar2(10),
    IdGrp Varchar2(4),
    TypeG varchar2(2) constraint CK_Type_Groupe Check (TypeG in ('C', 'TD', 'TP')),
    Eff number(3),
    constraint Eff_Form foreign key (IdFor) references Formation (IdFor),
    constraint Key_EffFormation PRIMARY KEY (IdFor,IdGrp,TypeG));
    
create table Matiere
( IdMat varchar2(20) constraint Key_Matiere PRIMARY KEY,
  LibM varchar2(100),
  VhC number(2),
  VhTD number(2),
  VhTP number(2),
  IdFor varchar2(10),
  constraint Matiere_Form foreign key (IdFor) references Formation (IdFor));


create table Creneau
  ( IdCren number(10) constraint Key_Creneau PRIMARY KEY,
    Nsem number(2) constraint CK_Nsem Check (Nsem Between 1 and 52),
    IdGrp Varchar2(4),
    DateC date,
    HDeb number(4,2),
    IdMat Varchar2(20),
    TEns varchar2 (2) constraint CK_Type_enseign Check (TEns in ('C', 'TD', 'TP')),
    Duree number(3,2),
    Nsalle varchar2(10),
    IdEnseign number(5),
    constraint Creneau_Matiere foreign key (IdMat) references Matiere (IdMat),
    constraint Creneau_Salle foreign key (Nsalle) references Salle (Nsalle),
    constraint Creneau_Enseign foreign key (IdEnseign) references Enseignant (IdEnseign));