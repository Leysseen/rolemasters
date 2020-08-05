<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805153111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieux_scenario (lieux_id INT NOT NULL, scenario_id INT NOT NULL, INDEX IDX_D2630EA6A2C806AC (lieux_id), INDEX IDX_D2630EA6E04E49DF (scenario_id), PRIMARY KEY(lieux_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_scenario (personnage_id INT NOT NULL, scenario_id INT NOT NULL, INDEX IDX_496EE7765E315342 (personnage_id), INDEX IDX_496EE776E04E49DF (scenario_id), PRIMARY KEY(personnage_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lieux_scenario ADD CONSTRAINT FK_D2630EA6A2C806AC FOREIGN KEY (lieux_id) REFERENCES lieux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lieux_scenario ADD CONSTRAINT FK_D2630EA6E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_scenario ADD CONSTRAINT FK_496EE7765E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_scenario ADD CONSTRAINT FK_496EE776E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lieux ADD jdr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE2C292827 FOREIGN KEY (jdr_id) REFERENCES jdr (id)');
        $this->addSql('CREATE INDEX IDX_9E44A8AE2C292827 ON lieux (jdr_id)');
        $this->addSql('ALTER TABLE personnage ADD jdr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D2C292827 FOREIGN KEY (jdr_id) REFERENCES jdr (id)');
        $this->addSql('CREATE INDEX IDX_6AEA486D2C292827 ON personnage (jdr_id)');
        $this->addSql('ALTER TABLE scene DROP INDEX UNIQ_D979EFDAE04E49DF, ADD INDEX IDX_D979EFDAE04E49DF (scenario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lieux_scenario');
        $this->addSql('DROP TABLE personnage_scenario');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE2C292827');
        $this->addSql('DROP INDEX IDX_9E44A8AE2C292827 ON lieux');
        $this->addSql('ALTER TABLE lieux DROP jdr_id');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D2C292827');
        $this->addSql('DROP INDEX IDX_6AEA486D2C292827 ON personnage');
        $this->addSql('ALTER TABLE personnage DROP jdr_id');
        $this->addSql('ALTER TABLE scene DROP INDEX IDX_D979EFDAE04E49DF, ADD UNIQUE INDEX UNIQ_D979EFDAE04E49DF (scenario_id)');
    }
}
