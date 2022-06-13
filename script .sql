 
create table EQUIPE( 

idequipe integer, 

nom_dequipe varchar(255), 

date_de_création date, 

nb_de_personne integer, 

type_de_jeux varchar(50), 

primary key(idequipe) 

); 

 

create table UTILISATEUR( 

idutilisateur integer, 

mail varchar(255), 

pseudo varchar(255), 

nom varchar(255), 

prenom varchar(255), 

date_dinscription date, 

date_de_naissance date, 

password varchar(255), 

code_postal char(5), 

primary key(idutilisateur,mail,pseudo) 

); 

 

create table REJOINDRE( 

equipe_id integer, 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail)  

primary key(equipe_id,utilisateur_id,utilisateur_pseudo,utilisateur_mail) 

); 

 

create table MESSAGE( 

idmessage integer, 

contenu varchar(1000), 

date_du_message date, 

primary key(idmessage), 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail)  

); 

 

create table NOTIFICATIONS( 

idnotifications integer, 

contenu varchar(255), 

PRIMARY KEY (idnotifications) 

); 

 

create table RECEVOIR( 

date_notif date, 

notif_id integer references NOTIFICATIONS(idnotifications), 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail) 

primary key(notif_id,utilisateur_id,utilisateur_pseudo,utilisateur_mail) 

); 

 

create table QUESTION( 

idquestion integer, 

question varchar(255), 

reponse varchar(1000), 

primary key(idquestion), 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail) 

); 

 

create table JEUX( 

idjeux integer, 

titre varchar(255), 

genre varchar(55), 

langues varchar(100), 

type varchar(100), 

nb_de_vue integer, 

points integer, 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail) 

); 

 

 

create table ADMINISTRATEUR( 

idaministrateur integer, 

mail_admin varchar(255), 

pseudo_admin varchar(255), 

password_admin varchar(255), 

prenom varchar(255), 

nom varchar(255), 

adresse varchar(255), 

code_postal char(5), 

primary key(idaministrateur,mail_admin,pseudo_admin) 

); 

 

create table SALLES( 

idsalles integer, 

rue varchar(255), 

ville varchar(255), 

code_postal char(5), 

pays varchar(255), 

nb_de_place integer, 

nb_de_vue integer, 

prix integer, 

points integer, 

primary key(idsalles) 

); 

 

create table POSTE( 

date date, 

salles_id references SALLES(idsalles), 

jeux_id references JEUX(idjeux), 

foreign key admin_pseudo references ADMINISTRATEUR(pseudo_admin), 

primary key(salles_id,jeux_id,admin_pseudo) 

); 

 

create table AVIS( 

idavis integer, 

date date, 

contenu varchar(50000), 

aicrme_pas nteger, 

Aime integer 

salles_id references SALLES(idsalles), 

jeux_id references JEUX(idjeux), 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail), 

primary key(idavis), 

); 

 

create table RESERVER( 

date  date, 

idreserver integer, 

nb_de_place_commander integer, 

reduction integer, 

utilisateur_id integer, 

utilisateur_pseudo varchar(255), 

utilisateur_mail varchar(255), 

FOREIGN KEY (utilisateur_id, utilisateur_pseudo, utilisateur_mail) REFERENCES UTILISATEUR(idutilisateur, pseudo,mail), 

primary key(idreserver) 

); 