<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611154659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emission (id INT AUTO_INCREMENT NOT NULL, title_id INT NOT NULL, valid_date DATETIME DEFAULT NULL, emitted_quantity INT NOT NULL, issue_value DOUBLE PRECISION NOT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, published DATETIME DEFAULT NULL, acquired_quantity INT NOT NULL, converted_quantity INT NOT NULL, is_redemption TINYINT(1) NOT NULL, INDEX IDX_F0225CF4A9F87BD (title_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emission ADD CONSTRAINT FK_F0225CF4A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE emission');
    }
}
