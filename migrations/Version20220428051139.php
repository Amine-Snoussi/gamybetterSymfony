<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428051139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id_actualite INT AUTO_INCREMENT NOT NULL, id_match INT DEFAULT NULL, id_personne INT DEFAULT NULL, image VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, INDEX id_actumatch (id_match), INDEX id_personneactu (id_personne), PRIMARY KEY(id_actualite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id_commande INT AUTO_INCREMENT NOT NULL, date_commande DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, nom_personne VARCHAR(60) NOT NULL, address_personne VARCHAR(100) NOT NULL, email_personne VARCHAR(100) NOT NULL, prix_totale NUMERIC(6, 3) NOT NULL, discount INT NOT NULL, IDpersonne INT DEFAULT NULL, INDEX fk_com_pers (IDpersonne), PRIMARY KEY(id_commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, date DATE DEFAULT NULL, contCommentaire VARCHAR(50) NOT NULL, id_Publication INT DEFAULT NULL, INDEX id_Publication (id_Publication), INDEX id_personne (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, session_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, jeu VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, file_name VARCHAR(255) DEFAULT NULL, video VARCHAR(255) DEFAULT NULL, INDEX IDX_FDCA8C9CA76ED395 (user_id), INDEX IDX_FDCA8C9C613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_details (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_312062F17ECF78B0 (cours_id), INDEX IDX_312062F1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id_equipe INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, description_equipe VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_equipe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nb_eq INT DEFAULT NULL, nom_event VARCHAR(255) DEFAULT NULL, description_event VARCHAR(255) DEFAULT NULL, date_debut_event DATETIME DEFAULT NULL, date_fin_event DATETIME DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, etat INT DEFAULT NULL, liste_equipe VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id_match INT AUTO_INCREMENT NOT NULL, id_equipe1 INT DEFAULT NULL, id_equipe2 INT DEFAULT NULL, image VARCHAR(255) NOT NULL, score INT DEFAULT NULL, lien_streaming VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, gold VARCHAR(255) DEFAULT NULL, duree VARCHAR(255) DEFAULT NULL, date VARCHAR(255) DEFAULT NULL, INDEX id_equipe1match (id_equipe1), INDEX id_equipe2match (id_equipe2), PRIMARY KEY(id_match)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, id_produit INT DEFAULT NULL, id_commande INT DEFAULT NULL, quantite_ordered INT NOT NULL, prix_unitaire NUMERIC(6, 2) NOT NULL, INDEX FK_24CC0DF23E314AE8 (id_commande), INDEX IDX_24CC0DF2F7384557 (id_produit), UNIQUE INDEX uniq_panier_pro_com (id_produit, id_commande), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id_personne INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, contact INT NOT NULL, age INT NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id_personne)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id_produit INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, nom_produit VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, categorie VARCHAR(50) NOT NULL, quantite_stock INT NOT NULL, prix_unitair NUMERIC(6, 3) NOT NULL, discount INT NOT NULL, stars INT NOT NULL, PRIMARY KEY(id_produit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, publication VARCHAR(255) NOT NULL, titre VARCHAR(50) NOT NULL, nbrCommentaire INT DEFAULT NULL, date DATE DEFAULT NULL, image VARCHAR(50) DEFAULT NULL, nbrLike INT DEFAULT NULL, INDEX id_personne (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, id_personne INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, email_sender VARCHAR(255) NOT NULL, INDEX IDX_CE6064045F15257A (id_personne), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, duree TIME DEFAULT NULL, date DATE DEFAULT NULL, jeu VARCHAR(255) NOT NULL, categorie VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_D044D5D4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_5492819794DE8435 FOREIGN KEY (id_match) REFERENCES game (id_match)');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_549281975F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D68B70091 FOREIGN KEY (IDpersonne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC31B22559 FOREIGN KEY (id_Publication) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE cours_details ADD CONSTRAINT FK_312062F17ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE cours_details ADD CONSTRAINT FK_312062F1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C30B8EB96 FOREIGN KEY (id_equipe1) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA9B1BA2C FOREIGN KEY (id_equipe2) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F7384557 FOREIGN KEY (id_produit) REFERENCES produit (id_produit)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E314AE8 FOREIGN KEY (id_commande) REFERENCES commande (id_commande)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67795F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064045F15257A FOREIGN KEY (id_personne) REFERENCES personne (id_personne)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E314AE8');
        $this->addSql('ALTER TABLE cours_details DROP FOREIGN KEY FK_312062F17ECF78B0');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C30B8EB96');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA9B1BA2C');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_5492819794DE8435');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_549281975F15257A');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D68B70091');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC5F15257A');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67795F15257A');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064045F15257A');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F7384557');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC31B22559');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C613FECDF');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CA76ED395');
        $this->addSql('ALTER TABLE cours_details DROP FOREIGN KEY FK_312062F1A76ED395');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4A76ED395');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_details');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
    }
}
