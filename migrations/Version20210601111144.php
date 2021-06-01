<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601111144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, logo VARCHAR(255) NOT NULL, rcs VARCHAR(255) NOT NULL, siret INT NOT NULL, form_legal VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, valeur_nominal DOUBLE PRECISION DEFAULT NULL, code_valeur VARCHAR(50) DEFAULT NULL, siteweb VARCHAR(255) NOT NULL, mot_du_president LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company');
    }
}
