-- création de la base de données
create database sitevitrine;
use sitevitrine;

-- tables
create table article(
id_article int primary key auto_increment not null,
titre_article varchar(50) not null,
contenu_article text not null,
date_article datetime not null,
id_util int not null
)Engine=InnoDB;

create table utilisateur(
id_util int primary key auto_increment not null,
nom_util varchar(50) not null,
prenom_util varchar(50) not null,
mail_util varchar(50) not null,
mdp_util varchar(100) not null
)Engine=InnoDB;

create table categorie(
id_cat int primary key auto_increment not null,
nom_cat varchar(50) not null
)Engine=InnoDB;

create table photo(
id_photo int primary key auto_increment not null,
nom_photo varchar(50) not null,
url_photo varchar(50) not null
)Engine=InnoDB;

create table message(
id_message int primary key auto_increment not null,
date_message datetime not null,
contenu_message varchar(255) not null,
id_util int not null
)Engine=InnoDB;

-- tables association

create table posseder(
id_cat int not null,
id_article int not null,
primary key(id_cat, id_article)
)Engine=InnoDB;

create table integrer(
id_photo int not null,
id_article int not null,
primary key(id_photo, id_article)
)Engine=InnoDB;

create table ecrire(
id_util int not null,
id_message int not null,
primary key(id_util, id_message)
)Engine=InnoDB;

-- constrainte foreign key

alter table article
add constraint fk_rediger_utilisateur
foreign key(id_util)
references utilisateur(id_util);

alter table message
add constraint fk_repondre_utilisateur
foreign key(id_util)
references utilisateur(id_util);

-- constrainte table assocation (fk)

alter table posseder
add constraint fk_posseder_categorie
foreign key(id_cat)
references categorie(id_cat);

alter table posseder
add constraint fk_posseder_article
foreign key(id_article)
references article(id_article);

alter table integrer
add constraint fk_integrer_article
foreign key(id_article)
references article(id_article);

alter table integrer
add constraint fk_integrer_photo
foreign key(id_photo)
references photo(id_photo);

alter table ecrire
add constraint fk_ecrire_utilisateur
foreign key(id_util)
references utilisateur(id_util);

alter table ecrire
add constraint fk_ecrire_message
foreign key(id_message)
references message(id_message);

