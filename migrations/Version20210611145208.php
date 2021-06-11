<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611145208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, valid_date DATETIME DEFAULT NULL, vote_modification_time INT NOT NULL, power_quantity DOUBLE PRECISION NOT NULL, vote_default_quantity DOUBLE PRECISION NOT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, emission_related INT NOT NULL, issue_value DOUBLE PRECISION NOT NULL, activated TINYINT(1) NOT NULL, isin VARCHAR(20) NOT NULL, payment_date DATETIME DEFAULT NULL, convertible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titlt (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE account');
        $this->addSql('ALTER TABLE document ADD company_id INT NOT NULL, ADD user_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD commentaire LONGTEXT NOT NULL, DROP name, DROP file, DROP created, DROP comment, CHANGE activated is_actived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76979B1AD6 ON document (company_id)');
        $this->addSql('CREATE INDEX IDX_D8698A76A76ED395 ON document (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, administrator VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, swift VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, iban VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, opened DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, comment LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, created DATETIME DEFAULT NULL, activated TINYINT(1) NOT NULL, holder VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, UNIQUE INDEX UNIQ_7D3656A4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE title');
        $this->addSql('DROP TABLE titlt');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76979B1AD6');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76A76ED395');
        $this->addSql('DROP INDEX IDX_D8698A76979B1AD6 ON document');
        $this->addSql('DROP INDEX IDX_D8698A76A76ED395 ON document');
        $this->addSql('ALTER TABLE document ADD file VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, ADD created DATETIME DEFAULT NULL, ADD comment LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, DROP company_id, DROP user_id, DROP commentaire, CHANGE nom name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE is_actived activated TINYINT(1) NOT NULL');
    }
}
