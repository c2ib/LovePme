<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620170139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64923D6A298');
        $this->addSql('ALTER TABLE registre_titre_action DROP FOREIGN KEY FK_95649B986DBFB45F');
        $this->addSql('DROP TABLE civil');
        $this->addSql('DROP TABLE registre_titre');
        $this->addSql('DROP TABLE registre_titre_action');
        $this->addSql('DROP INDEX IDX_8D93D64923D6A298 ON user');
        $this->addSql('ALTER TABLE user DROP civility_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE civil (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE registre_titre (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, stockholder_id INT DEFAULT NULL, quantity INT NOT NULL, created_at DATETIME NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, INDEX IDX_FD72193E60BB6FE6 (auteur_id), INDEX IDX_FD72193EBFE873F2 (stockholder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE registre_titre_action (registre_titre_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_95649B989D32F035 (action_id), INDEX IDX_95649B986DBFB45F (registre_titre_id), PRIMARY KEY(registre_titre_id, action_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193E60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193EBFE873F2 FOREIGN KEY (stockholder_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registre_titre_action ADD CONSTRAINT FK_95649B986DBFB45F FOREIGN KEY (registre_titre_id) REFERENCES registre_titre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre_action ADD CONSTRAINT FK_95649B989D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `user` ADD civility_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civil (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64923D6A298 ON `user` (civility_id)');
    }
}
