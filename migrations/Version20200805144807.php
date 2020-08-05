<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805144807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux DROP INDEX UNIQ_9E44A8AE60BB6FE6, ADD INDEX IDX_9E44A8AE60BB6FE6 (auteur_id)');
        $this->addSql('ALTER TABLE personnage DROP INDEX UNIQ_6AEA486D60BB6FE6, ADD INDEX IDX_6AEA486D60BB6FE6 (auteur_id)');
        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D6498082819C, ADD INDEX IDX_8D93D6498082819C (auth_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux DROP INDEX IDX_9E44A8AE60BB6FE6, ADD UNIQUE INDEX UNIQ_9E44A8AE60BB6FE6 (auteur_id)');
        $this->addSql('ALTER TABLE personnage DROP INDEX IDX_6AEA486D60BB6FE6, ADD UNIQUE INDEX UNIQ_6AEA486D60BB6FE6 (auteur_id)');
        $this->addSql('ALTER TABLE user DROP INDEX IDX_8D93D6498082819C, ADD UNIQUE INDEX UNIQ_8D93D6498082819C (auth_id)');
    }
}
