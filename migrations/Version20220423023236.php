<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423023236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY fk_com_pers');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D68B70091 FOREIGN KEY (IDpersonne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E314AE8');
        $this->addSql('DROP INDEX fk_24cc0df23e314ae8 ON panier');
        $this->addSql('CREATE INDEX fk_pan_com ON panier (id_commande)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E314AE8 FOREIGN KEY (id_commande) REFERENCES commande (id_commande)');
        $this->addSql('ALTER TABLE produit ADD stars INT DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D68B70091');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT fk_com_pers FOREIGN KEY (IDpersonne) REFERENCES personne (id_personne) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E314AE8');
        $this->addSql('DROP INDEX fk_pan_com ON panier');
        $this->addSql('CREATE INDEX FK_24CC0DF23E314AE8 ON panier (id_commande)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E314AE8 FOREIGN KEY (id_commande) REFERENCES commande (id_commande)');
        $this->addSql('ALTER TABLE produit DROP stars');
    }
}
