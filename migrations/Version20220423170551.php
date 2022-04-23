<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423170551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id_actualite INT AUTO_INCREMENT NOT NULL, id_match INT DEFAULT NULL, id_personne INT DEFAULT NULL, image VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, INDEX id_actumatch (id_match), INDEX id_personneactu (id_personne), PRIMARY KEY(id_actualite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id_equipe INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id_equipe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id_match INT AUTO_INCREMENT NOT NULL, id_equipe1 INT DEFAULT NULL, id_equipe2 INT DEFAULT NULL, image VARCHAR(255) NOT NULL, score INT DEFAULT NULL, lien_streaming VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, gold VARCHAR(255) DEFAULT NULL, duree VARCHAR(255) DEFAULT NULL, date VARCHAR(255) DEFAULT NULL, INDEX id_equipe1match (id_equipe1), INDEX id_equipe2match (id_equipe2), PRIMARY KEY(id_match)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `match` (id_match INT AUTO_INCREMENT NOT NULL, id_equipe1 INT DEFAULT NULL, id_equipe INT DEFAULT NULL, score INT NOT NULL, lien_streaming VARCHAR(100) DEFAULT NULL, status VARCHAR(100) DEFAULT NULL, gold VARCHAR(50) DEFAULT NULL, duree VARCHAR(50) DEFAULT NULL, date DATE DEFAULT NULL, heros VARCHAR(100) NOT NULL, INDEX id_equipematch (id_equipe), INDEX match_equipeone (id_equipe1), PRIMARY KEY(id_match)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id_personne INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id_personne)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_5492819794DE8435 FOREIGN KEY (id_match) REFERENCES game (id_match)');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_549281975F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C30B8EB96 FOREIGN KEY (id_equipe1) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA9B1BA2C FOREIGN KEY (id_equipe2) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC50530B8EB96 FOREIGN KEY (id_equipe1) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC50527E0FF8 FOREIGN KEY (id_equipe) REFERENCES equipe (id_equipe)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C30B8EB96');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA9B1BA2C');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC50530B8EB96');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC50527E0FF8');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_5492819794DE8435');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_549281975F15257A');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE personne');
    }
}
