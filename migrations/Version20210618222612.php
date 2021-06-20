<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618222612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre ADD stockholder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193EBFE873F2 FOREIGN KEY (stockholder_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_FD72193EBFE873F2 ON registre_titre (stockholder_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre DROP FOREIGN KEY FK_FD72193EBFE873F2');
        $this->addSql('DROP INDEX IDX_FD72193EBFE873F2 ON registre_titre');
        $this->addSql('ALTER TABLE registre_titre DROP stockholder_id');
    }
}
