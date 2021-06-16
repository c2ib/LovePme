<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615154237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forme_legale (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, shortname VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD city VARCHAR(50) NOT NULL, DROP form_legal');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FE48191B FOREIGN KEY (forme_legale_id) REFERENCES forme_legale (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094FE48191B ON company (forme_legale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FE48191B');
        $this->addSql('DROP TABLE forme_legale');
        $this->addSql('DROP INDEX IDX_4FBF094FE48191B ON company');
        $this->addSql('ALTER TABLE company ADD form_legal VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP city');
    }
}
