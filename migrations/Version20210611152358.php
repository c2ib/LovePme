<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611152358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD turnover DOUBLE PRECISION NOT NULL, ADD creation DATETIME DEFAULT NULL, ADD business VARCHAR(255) NOT NULL, ADD main_picture VARCHAR(255) NOT NULL, ADD zipcode VARCHAR(20) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD created DATETIME DEFAULT NULL, ADD modified DATETIME DEFAULT NULL, ADD phone VARCHAR(50) NOT NULL, ADD fax VARCHAR(50) NOT NULL, ADD website VARCHAR(255) NOT NULL, ADD comment LONGTEXT DEFAULT NULL, ADD oldld INT NOT NULL, ADD face_value DOUBLE PRECISION NOT NULL, ADD double_voting_time INT NOT NULL, ADD activated TINYINT(1) NOT NULL, ADD has_quotation TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP turnover, DROP creation, DROP business, DROP main_picture, DROP zipcode, DROP city, DROP created, DROP modified, DROP phone, DROP fax, DROP website, DROP comment, DROP oldld, DROP face_value, DROP double_voting_time, DROP activated, DROP has_quotation');
    }
}
