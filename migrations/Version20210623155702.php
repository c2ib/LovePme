<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623155702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
       // $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E53177880D');
       // $this->addSql('DROP INDEX IDX_F65593E53177880D ON annonce');
       // $this->addSql('ALTER TABLE annonce DROP code_action_id, DROP copyqte, DROP choix');
       // $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etat');
        //$this->addSql('ALTER TABLE annonce ADD code_action_id INT NOT NULL, ADD copyqte INT NOT NULL, ADD choix VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E53177880D FOREIGN KEY (code_action_id) REFERENCES action (id)');
        $this->addSql('CREATE INDEX IDX_F65593E53177880D ON annonce (code_action_id)');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
    }
}
