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

INSERT INTO ville VALUES
(90078, PETITE FONTAINE, 90360)
(90089, ROUGEMONT LE CHATEAU, 90110)
(90091, ST GERMAIN LE CHATELET, 90110)
(90093, SERMAMAGNY, 90300)
(90105, VILLARS LE SEC, 90100)
(91016, ANGERVILLE, 91670)
(91022, ARRANCOURT, 91690)
(91093, BOULLAY LES TROUX, 91470)
(91100, BOUVILLE, 91880)
(91109, BRIERES LES SCELLES, 91150)

(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)
(90078, PetiteFontaine, 90360)

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
        code_insee            Varchar (25) NOT NULL ,
        nom_du_site           Varchar (50) NOT NULL ,
        pseudonyme            Varchar (50) NOT NULL ,
        code_insee_ville      Varchar (25) NOT NULL
	,CONSTRAINT trajet_PK PRIMARY KEY (id_trajet)

	,CONSTRAINT trajet_ville_FK FOREIGN KEY (code_insee) REFERENCES ville(code_insee)
	,CONSTRAINT trajet_site_Isen0_FK FOREIGN KEY (nom_du_site) REFERENCES site_Isen(nom_du_site)
	,CONSTRAINT trajet_utilisateur1_FK FOREIGN KEY (pseudonyme) REFERENCES utilisateur(pseudonyme)
	,CONSTRAINT trajet_ville2_FK FOREIGN KEY (code_insee_ville) REFERENCES ville(code_insee)
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

