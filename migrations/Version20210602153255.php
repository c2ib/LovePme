<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602153255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, code_action_id INT NOT NULL, iduser_id INT NOT NULL, quantite INT NOT NULL, copyqte INT NOT NULL, choix VARCHAR(255) NOT NULL, date_limite DATETIME NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_F65593E53177880D (code_action_id), INDEX IDX_F65593E5786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E53177880D FOREIGN KEY (code_action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5786A81FB FOREIGN KEY (iduser_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce');
    }
}
