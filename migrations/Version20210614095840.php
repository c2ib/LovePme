<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614095840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emission DROP FOREIGN KEY FK_F0225CF4A9F87BD');
        $this->addSql('CREATE TABLE market (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, shortcode VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE emission');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE title');
        $this->addSql('DROP TABLE userrole');
        $this->addSql('ALTER TABLE company DROP turnover, DROP creation, DROP business, DROP main_picture, DROP zipcode, DROP city, DROP created, DROP modified, DROP phone, DROP fax, DROP website, DROP comment, DROP oldld, DROP face_value, DROP double_voting_time, DROP activated, DROP has_quotation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, code3 VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, currency VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, market INT NOT NULL, zone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE emission (id INT AUTO_INCREMENT NOT NULL, title_id INT NOT NULL, valid_date DATETIME DEFAULT NULL, emitted_quantity INT NOT NULL, issue_value DOUBLE PRECISION NOT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, published DATETIME DEFAULT NULL, acquired_quantity INT NOT NULL, converted_quantity INT NOT NULL, is_redemption TINYINT(1) NOT NULL, INDEX IDX_F0225CF4A9F87BD (title_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, label VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, valid_date DATETIME DEFAULT NULL, vote_modification_time INT NOT NULL, power_quantity DOUBLE PRECISION NOT NULL, vote_default_quantity DOUBLE PRECISION NOT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, emission_related INT NOT NULL, issue_value DOUBLE PRECISION NOT NULL, activated TINYINT(1) NOT NULL, isin VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, payment_date DATETIME DEFAULT NULL, convertible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE userrole (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE emission ADD CONSTRAINT FK_F0225CF4A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('DROP TABLE market');
        $this->addSql('ALTER TABLE company ADD turnover DOUBLE PRECISION NOT NULL, ADD creation DATETIME DEFAULT NULL, ADD business VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD main_picture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD zipcode VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD created DATETIME NOT NULL, ADD modified DATETIME DEFAULT NULL, ADD phone VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD fax VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD website VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD comment LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD oldld INT NOT NULL, ADD face_value DOUBLE PRECISION NOT NULL, ADD double_voting_time INT NOT NULL, ADD activated TINYINT(1) NOT NULL, ADD has_quotation TINYINT(1) NOT NULL');
    }
}
