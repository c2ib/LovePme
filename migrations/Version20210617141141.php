<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617141141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registre_titre (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, created_at DATETIME NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registre_titre_action (registre_titre_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_95649B986DBFB45F (registre_titre_id), INDEX IDX_95649B989D32F035 (action_id), PRIMARY KEY(registre_titre_id, action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registre_titre_user (registre_titre_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_15D19B6E6DBFB45F (registre_titre_id), INDEX IDX_15D19B6EA76ED395 (user_id), PRIMARY KEY(registre_titre_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registre_titre_action ADD CONSTRAINT FK_95649B986DBFB45F FOREIGN KEY (registre_titre_id) REFERENCES registre_titre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre_action ADD CONSTRAINT FK_95649B989D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre_user ADD CONSTRAINT FK_15D19B6E6DBFB45F FOREIGN KEY (registre_titre_id) REFERENCES registre_titre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre_user ADD CONSTRAINT FK_15D19B6EA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre_action DROP FOREIGN KEY FK_95649B986DBFB45F');
        $this->addSql('ALTER TABLE registre_titre_user DROP FOREIGN KEY FK_15D19B6E6DBFB45F');
        $this->addSql('DROP TABLE registre_titre');
        $this->addSql('DROP TABLE registre_titre_action');
        $this->addSql('DROP TABLE registre_titre_user');
    }
}
