#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        pseudonyme         Varchar (50) NOT NULL ,
        nom                Varchar (100) NOT NULL ,
        prenom             Varchar (100) NOT NULL ,
        email              Varchar (100) NOT NULL ,
        mot_de_passe       Varchar (100) NOT NULL ,
        numero_telelephone Varchar (50) NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (pseudonyme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ville
#------------------------------------------------------------

CREATE TABLE ville(
        code_insee  Varchar (25) NOT NULL ,
        code_postal Varchar (25) NOT NULL ,
        nom_ville   Varchar (50) NOT NULL
	,CONSTRAINT ville_PK PRIMARY KEY (code_insee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: site_Isen
#------------------------------------------------------------

CREATE TABLE site_Isen(
        nom_du_site Varchar (50) NOT NULL ,
        code_insee  Varchar (25) NOT NULL
	,CONSTRAINT site_Isen_PK PRIMARY KEY (nom_du_site)

	,CONSTRAINT site_Isen_ville_FK FOREIGN KEY (code_insee) REFERENCES ville(code_insee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: trajet
#------------------------------------------------------------

CREATE TABLE trajet(
        id_trajet             Int  Auto_increment  NOT NULL ,
        nombre_place          Smallint NOT NULL ,
        nombre_place_restante Smallint NOT NULL ,
        prix                  Int NOT NULL ,
        adresse               Varchar (100) NOT NULL ,
        date_depart           Datetime NOT NULL ,
        date_arrivee          Datetime NOT NULL ,
        debute_isen           Bool NOT NULL ,
        nom_du_site           Varchar (50) NOT NULL ,
        pseudonyme            Varchar (50) NOT NULL ,
        code_insee            Varchar (25) NOT NULL
	,CONSTRAINT trajet_PK PRIMARY KEY (id_trajet)

	,CONSTRAINT trajet_site_Isen_FK FOREIGN KEY (nom_du_site) REFERENCES site_Isen(nom_du_site)
	,CONSTRAINT trajet_utilisateur0_FK FOREIGN KEY (pseudonyme) REFERENCES utilisateur(pseudonyme)
	,CONSTRAINT trajet_ville1_FK FOREIGN KEY (code_insee) REFERENCES ville(code_insee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: se deplace
#------------------------------------------------------------

CREATE TABLE se_deplace(
        id_trajet  Int NOT NULL ,
        pseudonyme Varchar (50) NOT NULL
	,CONSTRAINT se_deplace_PK PRIMARY KEY (id_trajet,pseudonyme)

	,CONSTRAINT se_deplace_trajet_FK FOREIGN KEY (id_trajet) REFERENCES trajet(id_trajet)
	,CONSTRAINT se_deplace_utilisateur0_FK FOREIGN KEY (pseudonyme) REFERENCES utilisateur(pseudonyme)
)ENGINE=InnoDB;

