
--create table Salle

Insert into salle values('IN201', 'TD', 35, 1);
Insert into salle values('IN202', 'TD', 35, 1);
Insert into salle values('IN203', 'TD', 35, 1);
Insert into salle values('IN204', 'TD', 35, 1);
Insert into salle values('IN205', 'TD', 40, 1);
Insert into salle values('IN206', 'TD', 30, 1);
Insert into salle values('IN207', 'TD', 30, 1);
Insert into salle values('IN208', 'TD', 35, 1);
Insert into salle values('IN209', 'TD', 45, 1); 
Insert into salle values('IR28', 'C', 150, 1);
Insert into salle values('IN022', 'TD', 28, 1);

Insert into salle values('IR33', 'C', 150, 2);
Insert into salle values('G209', 'TD', 80, 2);
Insert into salle values('G118', 'TD', 80, 2);
Insert into salle values('IN0124', 'TD', 80, 4);

Insert into salle values('Opale', 'TP', 28, 1);
Insert into salle values('Ambre', 'TP', 28, 1);
Insert into salle values('Topaze', 'TP', 28, 1);
Insert into salle values('Rubis', 'TP', 28, 1);
Insert into salle values('Perle', 'TP', 28, 1);
Insert into salle values('Turquoise', 'TP', 28, 3); --AGBD

-------------------------------------------------------

--create table Statut
--( Grade varchar(10) constraint Key_Grade PRIMARY KEY,
--  NbHeurSt Number(3));

-- Insertion Table statut 
Insert into statut values('PR', 192);
Insert into statut values('MONITEUR', 64);
Insert into statut values('ATER', 96);
Insert into statut values('MC', 192);
Insert into statut values('PRAG', 384);
insert into statut values('SC', 2);

--Insertion Table Enseignant 

Insert into Enseignant values(1, 'MB', 'M', 'PR', 0 );
Insert into Enseignant values(2, 'JB', 'J', 'MC', 0 );
Insert into Enseignant values(3, 'JV', 'J', 'MC', 0 );
Insert into Enseignant values(4, 'PB', 'P', 'PR', 0);
Insert into Enseignant values(5, 'DJ', 'D', 'PRAG', 0 );
Insert into Enseignant values(6, 'GC', 'G', 'MC', 0 );
Insert into Enseignant values(7, 'JC', 'G', 'MC', 0 ); 
Insert into Enseignant values(8, 'PM', 'P', 'MC', 0 ); 
Insert into Enseignant values(9, 'FV', 'V', 'MC', 0 ); 
Insert into Enseignant values(10, 'MM', 'VM', 'MC', 0 ); 
Insert into Enseignant values(11, 'CJ', 'J', 'MC', 0 ); 
Insert into Enseignant values(12, 'SV', 'S', 'MC', 0 ); 
Insert into Enseignant values(13, 'JPC', 'JP', 'MC', 0 ); 
Insert into Enseignant values(14, 'FS', 'F', 'PR', 0 ); 
Insert into Enseignant values(15, 'OB', 'O', 'MC', 0 ); 
Insert into Enseignant values(16, 'KC', 'C', 'PRAG', 0 );

--Insert into Enseignant values(16, 'Emerite', 'J', 'SC', 0 );

--create table Formation
--( IdFor varchar(10) constraint Key_Formation PRIMARY KEY,
--Lib varchar(20),
--NbGrC number(1),
--NbGrTD number(1),
--NbGrTP number(1),
--IdPool Number(2),
--constraint Formation_Pool foreign key (IdPool) references Pool (IdPool));

Insert into Formation values ('DUT1', '1ère année', 1, 6, 12,1);
Insert into Formation values ('DUT2', '2ème année', 1, 4, 4,1);
Insert into Formation values ('AGBD', 'Licence Pro AGBD', 1, 1, 1,3);
Insert into Formation values ('DQL', 'Licence PRO DQL', 1, 1, 1,1);
Insert into Formation values ('AS', 'Année Spéciale', 1, 1, 1,1);


--Insertion Table EffFormation 
  
--create table EffFormation
--  ( IdFor varchar2(10),
--    IdGrp Varchar(2),
--   TypeG varchar2(2) constraint CK_Type_Groupe Check (TypeG in ('C', 'TD', 'TP')),
--    Eff number(3),
--    constraint Eff_Form foreign key (IdFor) references Formation (IdFor),
--    constraint Key_EffFormation PRIMARY KEY (IdFor,IdGrp,TypeG));

--DUT1

Insert into EffFormation values ('DUT1', 'TOUS', 'C', 168);
Insert into EffFormation values ('DUT1', 'A', 'TD', 28);
Insert into EffFormation values ('DUT1', 'B', 'TD', 26);
Insert into EffFormation values ('DUT1', 'C', 'TD', 25);
Insert into EffFormation values ('DUT1', 'D', 'TD', 27);
Insert into EffFormation values ('DUT1', 'E', 'TD', 26);
Insert into EffFormation values ('DUT1', 'F', 'TD', 27);

Insert into EffFormation values ('DUT1', 'A1', 'TP', 14);
Insert into EffFormation values ('DUT1', 'A2', 'TP', 14);
Insert into EffFormation values ('DUT1', 'B1', 'TP', 14);
Insert into EffFormation values ('DUT1', 'B2', 'TP', 12);
Insert into EffFormation values ('DUT1', 'C1', 'TP', 13);
Insert into EffFormation values ('DUT1', 'C2', 'TP', 14);
Insert into EffFormation values ('DUT1', 'D1', 'TP', 14);
Insert into EffFormation values ('DUT1', 'D2', 'TP', 13);
Insert into EffFormation values ('DUT1', 'E1', 'TP', 13);
Insert into EffFormation values ('DUT1', 'E2', 'TP', 13);
Insert into EffFormation values ('DUT1', 'F1', 'TP', 13);
Insert into EffFormation values ('DUT1', 'F2', 'TP', 14);

--DUT2
Insert into EffFormation values ('DUT2', 'TOUS', 'C', 104);
Insert into EffFormation values ('DUT2', 'A', 'TD', 28);
Insert into EffFormation values ('DUT2', 'B', 'TD', 26);
Insert into EffFormation values ('DUT2', 'C', 'TD', 28);
Insert into EffFormation values ('DUT2', 'D', 'TD', 26);

Insert into EffFormation values ('DUT2', 'A', 'TP', 28);
Insert into EffFormation values ('DUT2', 'B', 'TP', 26);
Insert into EffFormation values ('DUT2', 'C', 'TP', 28);
Insert into EffFormation values ('DUT2', 'D', 'TP', 26);

--AS
Insert into EffFormation values ('AS', '1', 'C', 30);
Insert into EffFormation values ('AS', '1', 'TD', 1);
Insert into EffFormation values ('AS', '1', 'TP', 1);

--AGBD
Insert into EffFormation values ('AGBD', '1', 'C', 20);
Insert into EffFormation values ('AGBD', '1', 'TD', 1);
Insert into EffFormation values ('AGBD', '2', 'TP', 1);

--QL
Insert into EffFormation values ('DQL', '1', 'C', 20);
Insert into EffFormation values ('DQL', '1', 'TD', 1);
Insert into EffFormation values ('DQL', '2', 'TP', 1);


--create table Matiere
--( IdMat varchar2(20) constraint Key_Matiere PRIMARY KEY,
--  LibM varchar2(100),
--  VhC number(2),
--  VhTD number(2),
--  VhTP number(2),
--  IdFor varchar2(10),
----  constraint Matiere_Form foreign key (IdFor) references Formation (IdFor))

--DUT1

Insert into matiere values ('M1101', 'Introduction aux systèmes informatiques', 10.5, 18, 25.5,'DUT1');
Insert into matiere values ('M1102', 'Introduction à l''algorithmique et à la programmation',9, 21, 24,'DUT1');
Insert into matiere values ('M1103', 'Structures de données et algorithmes fondamentaux', 9, 16.5, 15,'DUT1');
Insert into matiere values ('M1104', 'introduction aux bases de données', 12, 19.5, 22.5,'DUT1');
Insert into matiere values ('M1206', 'Anglais', 0, 9, 18,'DUT1');

--DUT2
Insert into matiere values ('M3101', 'Principes des systèmes d''exploitation', 13.5, 27, 0,'DUT2');
Insert into matiere values ('M3102', 'Services réseaux',9, 18, 0,'DUT2');
Insert into matiere values ('M3106', 'Bases de données Avancées', 9, 6,15, 'DUT2');
Insert into matiere values ('M3203', 'Droit', 9, 18,0, 'DUT2');


--create table Creneau  ( IdCren number(10) constraint Key_Creneau PRIMARY KEY,

--DUT1 info, semaine 3

alter session set nls_date_format='DD/MM/YYYY';

Insert into creneau values (1, 3, 'TOUS', '15/09/2014', 8, 'M1104', 'C',1.30, 'IR28',4);
Insert into creneau values (2, 3, 'F', '15/9/2014', 9.30, 'M1103', 'TD',1.30, 'IN205',7);
Insert into creneau values (3, 3, 'E', '15/9/2014', 9.30, 'M1103', 'TD',1.30, 'IN208',8);
Insert into creneau values (4, 3, 'A', '15/9/2014', 9.30, 'M1104', 'TD',1.30, 'IN022',4);
Insert into creneau values (5, 3, 'B', '15/9/2014', 9.30, 'M1104', 'TD',1.30, 'IN203',1);
Insert into creneau values (6, 3, 'D1', '15/9/2014', 9.30, 'M1102', 'TP',1.30, 'Rubis',9);
Insert into creneau values (7, 3, 'D2', '15/9/2014', 9.30, 'M1102', 'TP',1.30, 'Topaze',10);
Insert into creneau values (8, 3, 'C1', '15/9/2014', 9.30, 'M1102', 'TP',1.30, 'Ambre',11);
Insert into creneau values (9, 3, 'C2', '15/9/2014', 9.30, 'M1102', 'TP',1.30, 'Opale',12);

Insert into creneau values (10, 3, 'E1', '15/9/2014', 11, 'M1102', 'TP',1.30, 'Opale',7);
Insert into creneau values (11, 3, 'E2', '15/9/2014', 11, 'M1102', 'TP',1.30, 'Ambre',10);

Insert into creneau values (12, 3, 'F1', '15/9/2014', 11, 'M1102', 'TP',1.30, 'Rubis',11);
Insert into creneau values (13, 3, 'F2', '15/9/2014', 11, 'M1102', 'TP',1.30, 'Topaze',13);
Insert into creneau values (14, 3, 'D', '15/9/2014', 11, 'M1104', 'TD',1.30, 'IN205',6);
Insert into creneau values (15, 3, 'A', '15/9/2014', 11, 'M1103', 'TD',1.30, 'IN022',14);
Insert into creneau values (16, 3, 'B', '15/9/2014', 11, 'M1104', 'TD',1.30, 'IN204',15);
Insert into creneau values (17, 3, 'B', '15/9/2014', 11, 'M1103', 'TD',1.30, 'IN203',11);

--------
--DUT2 info semaine 3

insert into creneau values (18, 3, 'D', '15/9/2014', 8, 'M3106', 'TD',1.30, 'Turquoise',15);
insert into creneau values (19, 3, 'A', '15/9/2014', 8, 'M3203', 'TD',1.30, 'IN203',16);
insert into creneau values (20, 3, 'C', '15/9/2014', 8, 'M3106', 'TD',1.30, 'Opale',1);

commit;