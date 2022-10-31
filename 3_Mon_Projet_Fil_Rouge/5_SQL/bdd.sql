-- création de la base de données

CREATE  database batimelles ;
USE batimelles; 

-- tables
create table artisane(
id_artisane int primary key auto_increment not null,
nom_artisane varchar(50) not null,
prenom_artisane varchar(50) not null,
telephone_artisane int not null,
mail_artisane varchar(50) not null,
password_artisane varchar(100) not null,
adresse_artisane varchar(50) not null,
nom_entreprise varchar(50) not null,
anee_experience datetime not null,
activation_artisane tinyint(1) default 0,
horaires_artisanes datetime not null 

)Engine=InnoDB;
ALTER TABLE artisane
ADD id_type_utilisateur int not null;

ALTER TABLE artisane
ADD id_metier int not null;

create table type_utilisateur (
id_type_utilisateur int primary key auto_increment not null,
nom_utilisateur varchar(50) not null

)Engine=InnoDB;

create table utilisateur (
id_utilisateur int primary key auto_increment not null,
nom_utilisateur varchar(50) not null,
password_util varchar(100) not null,
mail_util varchar (50) not null,
id_type_utilisateur int not null

)Engine=InnoDB;

create table metier (
id_metier int primary key auto_increment not null,
specialite varchar(50) not null
)Engine=InnoDB;

create table prestation (
id_prestation int primary key auto_increment not null,
description_prestation text not null,
id_metier int not null 
)Engine=InnoDB;

create table article_blog (
id_article_blog int primary key auto_increment not null,
titre_article varchar(50) not null,
contenu_article text not null,
date_article datetime not null,
validation_article tinyint(1) default 0,
id_source int not null 
)Engine=InnoDB;

create table source (
id_source int primary key auto_increment not null,
url_source varchar (50) not null , 
description_source text not null
)Engine=InnoDB;

create table image_artisane (
id_image_artisane int primary key auto_increment not null,
url_image varchar (50) not null , 
description_image text not null,
id_artisane int not null
)Engine=InnoDB;

-- table association 

create table faire(
id_artisane int not null,
id_prestation int not null,
primary key(id_artisane, id_prestation)
)Engine=InnoDB;

create table illustrer(
id_image_artisane int not null,
id_article_blog int not null,
primary key(id_image_artisane, id_article_blog)
)Engine=InnoDB;

-- constrainte foreign key

ALTER TABLE artisane
ADD CONSTRAINT fk_associer_type_utilisateur
FOREIGN KEY(id_type_utilisateur)
REFERENCES type_utilisateur(id_type_utilisateur);

ALTER TABLE artisane
ADD CONSTRAINT fk_posseder_metier
FOREIGN KEY(id_metier)
REFERENCES metier(id_metier);

ALTER TABLE prestation
ADD CONSTRAINT fk_appartenir_metier
FOREIGN KEY(id_metier)
REFERENCES metier(id_metier);

ALTER TABLE image_artisane
ADD CONSTRAINT fk_attribuer_artisane
FOREIGN KEY(id_artisane)
REFERENCES artisane(id_artisane);

ALTER TABLE article_blog
ADD CONSTRAINT fk_sourcer_source
FOREIGN KEY(id_source)
REFERENCES source(id_source);

ALTER TABLE utilisateur
ADD CONSTRAINT fk_rattacher_type_utilisateur
FOREIGN KEY(id_type_utilisateur)
REFERENCES type_utilisateur(id_type_utilisateur);

ALTER TABLE illustrer
ADD CONSTRAINT fk_illustrer_image_artisane
FOREIGN KEY(id_image_artisane)
REFERENCES image_artisane(id_image_artisane);

ALTER TABLE illustrer
ADD CONSTRAINT fk_illustrer_article_blog
FOREIGN KEY(id_article_blog)
REFERENCES article_blog(id_article_blog);

ALTER TABLE faire
ADD CONSTRAINT fk_faire_artisane
FOREIGN KEY(id_artisane)
REFERENCES artisane(id_artisane);

ALTER TABLE faire
ADD CONSTRAINT fk_faire_prestation
FOREIGN KEY(id_prestation)
REFERENCES prestation(id_prestation);










