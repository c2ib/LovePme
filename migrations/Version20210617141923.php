<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617141923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193E60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_FD72193E60BB6FE6 ON registre_titre (auteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre DROP FOREIGN KEY FK_FD72193E60BB6FE6');
        $this->addSql('DROP INDEX IDX_FD72193E60BB6FE6 ON registre_titre');
        $this->addSql('ALTER TABLE registre_titre DROP auteur_id');
    }
}
