CREATE SCHEMA IF NOT EXISTS `cinema` DEFAULT CHARACTER SET utf8;
USE `cinema`;

CREATE TABLE IF NOT EXISTS `Cinema` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(100) NULL,
  `telephone` VARCHAR(15) NULL,
  `courriel` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Film` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NOT NULL,
  `synopsis` VARCHAR(350) NULL,
  `date_sortie` DATE NULL,
  `duree` VARCHAR(20) NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`genre_id`) REFERENCES Genre(`id`)
);

CREATE TABLE IF NOT EXISTS `Salle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `nbr_place` INT NULL,
  `cinema_id` INT NOT NULL,
  `film_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cinema_id`) REFERENCES `Cinema`(`id`)
);

CREATE TABLE IF NOT EXISTS `Film_has_Salle` (
  `film_id` INT,
  `salle_id` INT,
  PRIMARY KEY (`film_id`, `salle_id`),
  FOREIGN KEY (`film_id`) REFERENCES Film(`id`),
  FOREIGN KEY (`salle_id`) REFERENCES Salle(`id`)
);

CREATE TABLE IF NOT EXISTS `cinema`.`Acteur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `pays_origine` VARCHAR(45) NULL,
  `date_naissance` DATE NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `cinema`.`Film_has_Acteur` (
  `acteur_id` INT,
  `film_id` INT,
  PRIMARY KEY (`film_id`, `acteur_id`),
  FOREIGN KEY (`acteur_id`) REFERENCES Acteur(`id`),
  FOREIGN KEY (`film_id`) REFERENCES Film(`id`)
);

CREATE TABLE IF NOT EXISTS `cinema`.`Realisateur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `pays_origine` VARCHAR(45) NULL,
  `date_naissance` DATE NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `cinema`.`Realisateur_has_Film` (
  `realisateur_id` INT,
  `film_id` INT,
  PRIMARY KEY (`film_id`, `realisateur_id`),
  FOREIGN KEY (`realisateur_id`) REFERENCES Realisateur(`id`),
  FOREIGN KEY (`film_id`) REFERENCES Film(`id`)
);

CREATE TABLE IF NOT EXISTS `cinema`.`Genre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `cinema`.`Film` (`titre`, `synopsis`, `annee_parution`, `duree`) VALUES ('Hérésie', "Après avoir cogné à la mauvaise porte, deux jeunes missionnaires se voient forcées de prouver leur foi lorsqu’elles entrent chez M. Reed (Hugh Grant), un être diabolique qui les piège dans une partie mortelle de chat et de la souris.", '2024-11-08', '1h50');

INSERT INTO `cinema`.`Film` (`titre`, `synopsis`, `annee_parution`, `duree`) VALUES ('The Best Christmas Pageant Ever', "Les petits Herdman sont des enfants terribles. Ce Noël, ils prennent en charge le spectacle de leur église locale et pourraient bien, sans le vouloir, enseigner à la communauté le véritable sens de Noël.", '2024-11-08', '1h39');