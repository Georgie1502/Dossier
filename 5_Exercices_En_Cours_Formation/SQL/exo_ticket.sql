create database article;
use article;

create table article(
id_article int auto_increment primary key not null,
titre_article varchar(50) not null
)Engine=InnoDB;
alter table article
add column contenu_article varchar(50) not null;

alter table article 
add column date_article datetime not null; 

create table utilisateur (
id_util int auto_increment primary key not null,
nom_util varchar(50) not null,
prenom_util varchar(50) not null,
mail_util varchar(50) not null,
mdp_util varchar(50) not null
)engine=InnoDB;

create table photo(
id_photo int auto_increment primary key not null,
nom_photo varchar(50) not null,
url_photo varchar(50) not null)engine=InnoDB;

create table categorie (
id_cat int auto_increment primary key not null, 
nom_cat varchar(50)not null
)engine=InnoDB;

alter table article
add constraint fk_rediger_utilisateur
foreign key(id_util)
references utilisateur(id_util); -- on met le nom de la table et entre () le id que on veut pointer 

create table message(
id_message int auto_increment primary key not null,
date_message datetime not null,
contenu_message varchar(255)
)engine=InnoDB;

alter table message
add constraint fk_reprondre_utilisateur
foreign key(id_util)
references utilisateur(id_util); 

alter table article
add column id_util int not null;

alter table article 
modify column contenu_article text not null;

alter table message
add column id_util int not null;


-- table association 

create table posseder(
id_cat int not null,
id_article int not null, 
primary key(id_cat, id_article)
)engine=InnoDB;

use ticket;

select nom_article, prix_article from article;

select id_categorie, nom_categorie from categorie order by nom_categorie;

select id_ticket, date_ticket, id_vendeur from ticket where id_ticket = 1;

select id_ticket, date_ticket, id_vendeur from ticket where date_ticket > '2021/01/01 00:00:00';

select id_ticket, date_ticket, id_vendeur from ticket 
where date_ticket between  '2018/11/25 12:26:33' and '2022/12/31 11:59:59';
 
 
select id_article, nom_article, prix_article, description_article from article 
where nom_article like 't%';






