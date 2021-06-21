<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616144942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civilite DROP FOREIGN KEY FK_2C4C1BD6A76ED395');
        $this->addSql('DROP INDEX UNIQ_2C4C1BD6A76ED395 ON civilite');
        $this->addSql('ALTER TABLE civilite DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE civilite ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE civilite ADD CONSTRAINT FK_2C4C1BD6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2C4C1BD6A76ED395 ON civilite (user_id)');
    }
}
