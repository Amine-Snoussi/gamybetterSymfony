<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423175548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, date DATE DEFAULT NULL, contCommentaire VARCHAR(50) NOT NULL, id_Publication INT DEFAULT NULL, INDEX id_Publication (id_Publication), INDEX id_personne (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, publication VARCHAR(255) NOT NULL, titre VARCHAR(50) NOT NULL, nbrCommentaire INT DEFAULT NULL, date DATE DEFAULT NULL, image VARCHAR(50) DEFAULT NULL, nbrLike INT DEFAULT NULL, INDEX id_personne (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC31B22559 FOREIGN KEY (id_Publication) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67795F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC31B22559');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE publication');
    }
}
