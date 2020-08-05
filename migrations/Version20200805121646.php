<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805121646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auth (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, commentaire LONGTEXT NOT NULL, created_at DATETIME NOT NULL, published TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE complement (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edito (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL, published TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_F2EC5FE060BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jdr (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, contexte LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_9E44A8AE60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, caracteristiques LONGTEXT NOT NULL, competences LONGTEXT NOT NULL, background LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_6AEA486D60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, jdr_id INT NOT NULL, titre VARCHAR(255) NOT NULL, pitch LONGTEXT DEFAULT NULL, published TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_3E45C8D860BB6FE6 (auteur_id), INDEX IDX_3E45C8D82C292827 (jdr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scene (id INT AUTO_INCREMENT NOT NULL, scenario_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, rang INT NOT NULL, UNIQUE INDEX UNIQ_D979EFDAE04E49DF (scenario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, auth_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, login VARCHAR(255) NOT NULL, passwd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6498082819C (auth_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE edito ADD CONSTRAINT FK_F2EC5FE060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D82C292827 FOREIGN KEY (jdr_id) REFERENCES jdr (id)');
        $this->addSql('ALTER TABLE scene ADD CONSTRAINT FK_D979EFDAE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498082819C FOREIGN KEY (auth_id) REFERENCES auth (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498082819C');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D82C292827');
        $this->addSql('ALTER TABLE scene DROP FOREIGN KEY FK_D979EFDAE04E49DF');
        $this->addSql('ALTER TABLE edito DROP FOREIGN KEY FK_F2EC5FE060BB6FE6');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE60BB6FE6');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D60BB6FE6');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D860BB6FE6');
        $this->addSql('DROP TABLE auth');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE complement');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE edito');
        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE jdr');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE scene');
        $this->addSql('DROP TABLE user');
    }
}
