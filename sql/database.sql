CREATE TABLE `utilisateur`(
    `pseudonyme` VARCHAR(255) NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `mot_de_passe` VARCHAR(255) NOT NULL,
    `numero_telelephone` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `utilisateur` ADD PRIMARY KEY `utilisateur_pseudonyme_primary`(`pseudonyme`);
CREATE TABLE `ville`(
    `code_insee` VARCHAR(255) NOT NULL,
    `code_postal` VARCHAR(255) NOT NULL,
    `nom_ville` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `ville` ADD PRIMARY KEY `ville_code_insee_primary`(`code_insee`);
CREATE TABLE `site_Isen`(
    `nom_du_site` VARCHAR(255) NOT NULL,
    `code_insee` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `site_Isen` ADD PRIMARY KEY `site_isen_nom_du_site_primary`(`nom_du_site`);
CREATE TABLE `trajet`(
    `id_trajet` INT NOT NULL AUTO_INCREMENT,
    `nombre_place` SMALLINT NOT NULL,
    `nombre_place_restante` SMALLINT NOT NULL,
    `prix` INT NOT NULL,
    `adresse` VARCHAR(255) NOT NULL,
    `date_depart` DATETIME NOT NULL,
    `date_arrivee` DATETIME NOT NULL,
    `debute_isen` TINYINT(1) NOT NULL,
    `code_insee` VARCHAR(255) NOT NULL,
    `nom_du_site` VARCHAR(255) NOT NULL,
    `pseudonyme` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `trajet` ADD PRIMARY KEY `trajet_id_trajet_primary`(`id_trajet`);
CREATE TABLE `se_deplace`(
    `id_trajet` INT NOT NULL,
    `pseudonyme` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `se_deplace` ADD PRIMARY KEY `se_deplace_id_trajet_pseudonyme_primary`(`id_trajet`, `pseudonyme`);
ALTER TABLE
    `site_Isen` ADD CONSTRAINT `site_isen_code_insee_foreign` FOREIGN KEY(`code_insee`) REFERENCES `ville`(`code_insee`);
ALTER TABLE
    `trajet` ADD CONSTRAINT `trajet_code_insee_foreign` FOREIGN KEY(`code_insee`) REFERENCES `ville`(`code_insee`);
ALTER TABLE
    `trajet` ADD CONSTRAINT `trajet_nom_du_site_foreign` FOREIGN KEY(`nom_du_site`) REFERENCES `site_Isen`(`nom_du_site`);
ALTER TABLE
    `trajet` ADD CONSTRAINT `trajet_pseudonyme_foreign` FOREIGN KEY(`pseudonyme`) REFERENCES `utilisateur`(`pseudonyme`);
ALTER TABLE
    `se_deplace` ADD CONSTRAINT `se_deplace_id_trajet_foreign` FOREIGN KEY(`id_trajet`) REFERENCES `trajet`(`id_trajet`);
ALTER TABLE
    `se_deplace` ADD CONSTRAINT `se_deplace_pseudonyme_foreign` FOREIGN KEY(`pseudonyme`) REFERENCES `utilisateur`(`pseudonyme`);