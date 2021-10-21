<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021174028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE catalogue_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE genre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE inscrit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mediatheque_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE catalogue (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE employe (id INT NOT NULL, mediatheque_id INT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F804D3B9D4D39F21 ON employe (mediatheque_id)');
        $this->addSql('CREATE TABLE genre (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE inscrit (id INT NOT NULL, mediatheque_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prénom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_927FA365D4D39F21 ON inscrit (mediatheque_id)');
        $this->addSql('CREATE TABLE livre (id INT NOT NULL, genre_id INT NOT NULL, mediatheque_id INT NOT NULL, inscrit_id INT DEFAULT NULL, catalogue_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_de_parution VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC634F994296D31F ON livre (genre_id)');
        $this->addSql('CREATE INDEX IDX_AC634F99D4D39F21 ON livre (mediatheque_id)');
        $this->addSql('CREATE INDEX IDX_AC634F996DCD4FEE ON livre (inscrit_id)');
        $this->addSql('CREATE INDEX IDX_AC634F994A7843DC ON livre (catalogue_id)');
        $this->addSql('CREATE TABLE livre_employe (livre_id INT NOT NULL, employe_id INT NOT NULL, PRIMARY KEY(livre_id, employe_id))');
        $this->addSql('CREATE INDEX IDX_357797ED37D925CB ON livre_employe (livre_id)');
        $this->addSql('CREATE INDEX IDX_357797ED1B65292 ON livre_employe (employe_id)');
        $this->addSql('CREATE TABLE mediatheque (id INT NOT NULL, catalogue_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B49E7E74A7843DC ON mediatheque (catalogue_id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9D4D39F21 FOREIGN KEY (mediatheque_id) REFERENCES mediatheque (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE inscrit ADD CONSTRAINT FK_927FA365D4D39F21 FOREIGN KEY (mediatheque_id) REFERENCES mediatheque (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F994296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99D4D39F21 FOREIGN KEY (mediatheque_id) REFERENCES mediatheque (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F996DCD4FEE FOREIGN KEY (inscrit_id) REFERENCES inscrit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F994A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_employe ADD CONSTRAINT FK_357797ED37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_employe ADD CONSTRAINT FK_357797ED1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mediatheque ADD CONSTRAINT FK_2B49E7E74A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F994A7843DC');
        $this->addSql('ALTER TABLE mediatheque DROP CONSTRAINT FK_2B49E7E74A7843DC');
        $this->addSql('ALTER TABLE livre_employe DROP CONSTRAINT FK_357797ED1B65292');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F994296D31F');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F996DCD4FEE');
        $this->addSql('ALTER TABLE livre_employe DROP CONSTRAINT FK_357797ED37D925CB');
        $this->addSql('ALTER TABLE employe DROP CONSTRAINT FK_F804D3B9D4D39F21');
        $this->addSql('ALTER TABLE inscrit DROP CONSTRAINT FK_927FA365D4D39F21');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F99D4D39F21');
        $this->addSql('DROP SEQUENCE catalogue_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE genre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE inscrit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mediatheque_id_seq CASCADE');
        $this->addSql('DROP TABLE catalogue');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE inscrit');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_employe');
        $this->addSql('DROP TABLE mediatheque');
    }
}
