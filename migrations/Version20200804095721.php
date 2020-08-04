<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200804095721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E44A8AE60BB6FE6 ON lieux (auteur_id)');
        $this->addSql('ALTER TABLE personnage ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486D60BB6FE6 ON personnage (auteur_id)');
        $this->addSql('ALTER TABLE scenario ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3E45C8D860BB6FE6 ON scenario (auteur_id)');
        $this->addSql('ALTER TABLE scene ADD scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scene ADD CONSTRAINT FK_D979EFDAE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D979EFDAE04E49DF ON scene (scenario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE60BB6FE6');
        $this->addSql('DROP INDEX UNIQ_9E44A8AE60BB6FE6 ON lieux');
        $this->addSql('ALTER TABLE lieux DROP auteur_id');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D60BB6FE6');
        $this->addSql('DROP INDEX UNIQ_6AEA486D60BB6FE6 ON personnage');
        $this->addSql('ALTER TABLE personnage DROP auteur_id');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D860BB6FE6');
        $this->addSql('DROP INDEX UNIQ_3E45C8D860BB6FE6 ON scenario');
        $this->addSql('ALTER TABLE scenario DROP auteur_id');
        $this->addSql('ALTER TABLE scene DROP FOREIGN KEY FK_D979EFDAE04E49DF');
        $this->addSql('DROP INDEX UNIQ_D979EFDAE04E49DF ON scene');
        $this->addSql('ALTER TABLE scene DROP scenario_id');
    }
}
