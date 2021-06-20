<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210619163610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registre3 (id INT AUTO_INCREMENT NOT NULL, action_id INT NOT NULL, stockholder_id INT NOT NULL, author_id INT NOT NULL, quantity INT NOT NULL, prix_unik DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6BBD92C59D32F035 (action_id), INDEX IDX_6BBD92C5BFE873F2 (stockholder_id), INDEX IDX_6BBD92C5F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registre3 ADD CONSTRAINT FK_6BBD92C59D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE registre3 ADD CONSTRAINT FK_6BBD92C5BFE873F2 FOREIGN KEY (stockholder_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE registre3 ADD CONSTRAINT FK_6BBD92C5F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE registre3');
    }
}
