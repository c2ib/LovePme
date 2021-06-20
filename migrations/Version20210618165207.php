<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618165207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('DROP TABLE registre_titre_user');
        //$this->addSql('ALTER TABLE registre_titre ADD CONSTRAINT FK_FD72193E1A79B503 FOREIGN KEY (actionnaire_id) REFERENCES `user` (id)');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_FD72193E1A79B503 ON registre_titre (actionnaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registre_titre_user (registre_titre_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_15D19B6EA76ED395 (user_id), INDEX IDX_15D19B6E6DBFB45F (registre_titre_id), PRIMARY KEY(registre_titre_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE registre_titre_user ADD CONSTRAINT FK_15D19B6E6DBFB45F FOREIGN KEY (registre_titre_id) REFERENCES registre_titre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre_user ADD CONSTRAINT FK_15D19B6EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registre_titre DROP FOREIGN KEY FK_FD72193E1A79B503');
        $this->addSql('DROP INDEX UNIQ_FD72193E1A79B503 ON registre_titre');
    }
}
