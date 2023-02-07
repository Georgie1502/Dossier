create database ecole;
use ecole;

create table eleve(
id_eleve int auto_increment primary key not null,
nom_eleve varchar(50)not null,
prenom_eleve varchar(50) not null,
age_eleve int not null,
boursier_eleve tinyint(1) default 0,
id_classe int 
)engine=InnoDB;

create table classe(
id_classe int auto_increment primary key not null,
nom_classe varchar(50)not null

)engine=InnoDB;

create table participer(
id_seance int auto_increment primary key not null,
id_eleve int not null,
presence tinyint(1) default 0 not null

)engine=InnoDB;

create table seance(
id_seance int auto_increment primary key not null,
nom_seance varchar(50)not null,
date_seance datetime not null,
id_type_seance int not null,
id_util int not null
)engine=InnoDB;

create table type_seance(
id_type_seance int auto_increment primary key not null,
nom_type_seance varchar(50)not null
)engine=InnoDB;

create table detail(
id_detail int auto_increment primary key not null,
note_detail int not null,
materiel_oublie_detail tinyint(1) default 0 not null,
commentaire_detail varchar(255) not null,
id_eleve int not null,
id_seance int not null 
)engine=InnoDB;

create table utilisateur(
id_util int auto_increment primary key not null,
nom_util varchar(50)not null,
prenom_util varchar(50) not null,
login_util varchar(50) not null,
mdp_util varchar(50) not null,
id_role int not null
)engine=InnoDB;

create table role(
id_role int auto_increment primary key not null,
nom_role varchar(50)not null
)engine=InnoDB;

alter table participer; 
drop table participer ;

-- tables association


create table participer(
id_seance int not null,
id_eleve int not null,
presence tinyint(1) default 0,
primary key(id_seance, id_eleve)
)Engine=InnoDB;




-- constrainte foreign key

alter table detail 
add constraint fk_evaluer_eleve
foreign key(id_eleve)
references eleve(id_eleve);

alter table utilisateur 
add constraint fk_posseder_role
foreign key(id_role)
references role (id_role);

alter table detail 
add constraint fk_evaluer_eleve
foreign key(id_eleve)
references eleve(id_eleve);



alter table eleve 
add constraint fk_appartenir_classe
foreign key(id_classe)
references classe(id_classe);

alter table seance
add constraint fk_categoriser_type_seance
foreign key(id_type_seance)
references type_seance(id_type_seance);

alter table seance
add constraint fk_categoriser_type_seance
foreign key(id_type_seance)
references type_seance(id_type_seance);

alter table utilisateur
add constraint fk_categoriser_type_seance
foreign key(id_type_seance)
references type_seance(id_type_seance);

















