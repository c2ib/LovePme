<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620233226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registre (id INT AUTO_INCREMENT NOT NULL, action_id INT NOT NULL, stocholder_id INT NOT NULL, quantity INT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_D9A941459D32F035 (action_id), INDEX IDX_D9A94145EE1D47B0 (stocholder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registre ADD CONSTRAINT FK_D9A941459D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE registre ADD CONSTRAINT FK_D9A94145EE1D47B0 FOREIGN KEY (stocholder_id) REFERENCES `user` (id)');
       // $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64923D6A298 ON user (civility_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE registre');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
        $this->addSql('DROP INDEX IDX_8D93D64923D6A298 ON `user`');
    }
}
