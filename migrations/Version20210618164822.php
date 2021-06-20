<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618164822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('ALTER TABLE registre_titre ADD actionnaire_id INT NOT NULL');
        //$this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193E1A79B503 FOREIGN KEY (actionnaire_id) REFERENCES `user` (id)');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_FD72193E1A79B503 ON registre_titre (actionnaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre DROP FOREIGN KEY FK_FD72193E1A79B503');
        $this->addSql('DROP INDEX UNIQ_FD72193E1A79B503 ON registre_titre');
       // $this->addSql('ALTER TABLE registre_titre DROP actionnaire_id');
    }
}
