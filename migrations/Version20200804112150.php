<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200804112150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario ADD jdr_id INT NOT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D82C292827 FOREIGN KEY (jdr_id) REFERENCES jdr (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D82C292827 ON scenario (jdr_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D82C292827');
        $this->addSql('DROP INDEX IDX_3E45C8D82C292827 ON scenario');
        $this->addSql('ALTER TABLE scenario DROP jdr_id');
    }
}
