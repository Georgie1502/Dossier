-- création de la BDD
create database scolaire;
-- utilisation de la BDD
use scolaire;

-- création des tables

-- table eleve
create table eleve(
id_eleve int primary key auto_increment not null,
nom_eleve varchar(50) not null,
prenom_eleve varchar(50) not null,
age_eleve int not null,
bourse_eleve tinyint(1) default 0,
id_classe int not null
)Engine=InnoDB;

-- table classe 
create table classe(
id_classe int primary key auto_increment not null,
nom_classe varchar(50) not null
)Engine=InnoDB;

-- table seance
create table seance(
id_seance int primary key auto_increment not null,
nom_seance varchar(50) not null,
date_seance datetime not null,
id_type_seance int not null,
id_util int not null
)Engine=InnoDB;

-- table type_seance
create table type_seance(
id_type_seance int primary key auto_increment not null,
nom_type_seance varchar(50) not null
)Engine=InnoDB;

-- table detail_seance
create table detail_seance(
id_detail_seance int primary key auto_increment not null,
note_detail_seance int not null,
materiel_oublie tinyint(1) default 0,
commentaire_detail varchar(255) not null,
id_eleve int not null,
id_seance int not null
)Engine=InnoDB;

-- table utilisateur
create table utilisateur(
id_util int primary key auto_increment not null,
nom_util varchar(50) not null,
prenom_util varchar(50) not null,
login_util varchar(50) not null,
password_util varchar(100) not null,
id_role int not null
)Engine=Innodb;

-- table role
create table role_utilisateur(
id_role int primary key auto_increment not null,
nom_role varchar(50) not null
)Engine=InnoDB;

-- table association participer
create table participer(
id_seance int not null,
id_eleve int not null,
present tinyint(1) default 0,
primary key(id_seance, id_eleve)
)Engine=InnoDB;

-- relation table eleve
alter table eleve
add constraint fk_appartenir_classe
foreign key(id_classe)
references classe(id_classe);

-- relations table seance
alter table seance
add constraint fk_categoriser_type_seance
foreign key(id_type_seance)
references type_seance(id_type_seance);

alter table seance
add constraint fk_animer_utilisateur
foreign key(id_util)
references utilisateur(id_util);

-- relations table detail_seance
alter table detail_seance
add constraint fk_evaluer_eleve
foreign key(id_eleve)
references eleve(id_eleve);

alter table detail_seance
add constraint fk_completer_seance
foreign key(id_seance)
references seance(id_seance);

-- relation table utilisateur
alter table utilisateur
add constraint fk_posseder_role
foreign key(id_role)
references role_utilisateur(id_role);

-- relations table association participer
alter table participer
add constraint fk_participer_eleve
foreign key(id_eleve)
references eleve(id_eleve);

alter table participer
add constraint fk_participer_seance
foreign key(id_seance)
references seance(id_seance);
