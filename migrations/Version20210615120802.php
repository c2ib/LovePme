<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615120802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD forme_legale_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FE48191B FOREIGN KEY (forme_legale_id) REFERENCES forme_legale (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094FE48191B ON company (forme_legale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FE48191B');
        $this->addSql('DROP INDEX IDX_4FBF094FE48191B ON company');
        $this->addSql('ALTER TABLE company DROP forme_legale_id');
    }
}
