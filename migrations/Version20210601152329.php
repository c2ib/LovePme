<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601152329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ordre (id INT AUTO_INCREMENT NOT NULL, id_societe_id INT NOT NULL, id_user_id INT NOT NULL, quantite INT NOT NULL, type VARCHAR(50) NOT NULL, etat TINYINT(1) NOT NULL, date_limite DATETIME DEFAULT NULL, INDEX IDX_737992C9597DF5D4 (id_societe_id), INDEX IDX_737992C979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ordre ADD CONSTRAINT FK_737992C9597DF5D4 FOREIGN KEY (id_societe_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE ordre ADD CONSTRAINT FK_737992C979F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ordre');
    }
}