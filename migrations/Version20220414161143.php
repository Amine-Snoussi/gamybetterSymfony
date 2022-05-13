<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414161143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY id_actumatch');
        $this->addSql('ALTER TABLE actualite CHANGE id_match id_match INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_5492819794DE8435 FOREIGN KEY (id_match) REFERENCES game (id_match)');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY id_equipe1match');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY id_equipe2match');
        $this->addSql('ALTER TABLE game CHANGE date date VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C30B8EB96 FOREIGN KEY (id_equipe1) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA9B1BA2C FOREIGN KEY (id_equipe2) REFERENCES personne (id_personne)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_5492819794DE8435');
        $this->addSql('ALTER TABLE actualite CHANGE id_match id_match INT NOT NULL');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT id_actumatch FOREIGN KEY (id_match) REFERENCES game (id_match) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C30B8EB96');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA9B1BA2C');
        $this->addSql('ALTER TABLE game CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT id_equipe1match FOREIGN KEY (id_equipe1) REFERENCES personne (id_personne) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT id_equipe2match FOREIGN KEY (id_equipe2) REFERENCES personne (id_personne) ON DELETE CASCADE');
    }
}
