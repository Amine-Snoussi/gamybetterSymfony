<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424050644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, email_sender VARCHAR(255) NOT NULL, INDEX IDX_CE6064045F15257A (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064045F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE personne ADD mot_de_passe VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD role VARCHAR(255) NOT NULL, ADD description VARCHAR(500) NOT NULL, ADD image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('ALTER TABLE personne DROP mot_de_passe, DROP email, DROP role, DROP description, DROP image');
    }
}
