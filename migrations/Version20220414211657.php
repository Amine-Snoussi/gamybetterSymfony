<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414211657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY fk_com_pers');
        $this->addSql('ALTER TABLE commande CHANGE IDpersonne IDpersonne INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D68B70091 FOREIGN KEY (IDpersonne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_pan_com');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_pan_prod');
        $this->addSql('ALTER TABLE panier CHANGE id_produit id_produit INT DEFAULT NULL, CHANGE id_commande id_commande INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E314AE8 FOREIGN KEY (id_commande) REFERENCES commande (id_commande)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F7384557 FOREIGN KEY (id_produit) REFERENCES produit (id_produit)');
        $this->addSql('ALTER TABLE personne CHANGE nom_prenom_personne nom_prenom_personne VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D68B70091');
        $this->addSql('ALTER TABLE commande CHANGE IDpersonne IDpersonne INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT fk_com_pers FOREIGN KEY (IDpersonne) REFERENCES personne (id_personne) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E314AE8');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F7384557');
        $this->addSql('ALTER TABLE panier CHANGE id_commande id_commande INT NOT NULL, CHANGE id_produit id_produit INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_pan_com FOREIGN KEY (id_commande) REFERENCES commande (id_commande) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_pan_prod FOREIGN KEY (id_produit) REFERENCES produit (id_produit) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne CHANGE nom_prenom_personne nom_prenom_personne INT NOT NULL');
    }
}
