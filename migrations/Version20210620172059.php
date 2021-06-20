<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620172059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre2 DROP FOREIGN KEY FK_1CBAA2539D32F035');
        $this->addSql('ALTER TABLE registre2 DROP FOREIGN KEY FK_1CBAA253BFE873F2');
        $this->addSql('ALTER TABLE registre2 DROP FOREIGN KEY FK_1CBAA253F675F31B');
        $this->addSql('DROP INDEX UNIQ_1CBAA253F675F31B ON registre2');
        $this->addSql('DROP INDEX UNIQ_1CBAA2539D32F035 ON registre2');
        $this->addSql('DROP INDEX UNIQ_1CBAA253BFE873F2 ON registre2');
        $this->addSql('ALTER TABLE registre2 DROP action_id, DROP stockholder_id, DROP author_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre2 ADD action_id INT NOT NULL, ADD stockholder_id INT NOT NULL, ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE registre2 ADD CONSTRAINT FK_1CBAA2539D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE registre2 ADD CONSTRAINT FK_1CBAA253BFE873F2 FOREIGN KEY (stockholder_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registre2 ADD CONSTRAINT FK_1CBAA253F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CBAA253F675F31B ON registre2 (author_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CBAA2539D32F035 ON registre2 (action_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CBAA253BFE873F2 ON registre2 (stockholder_id)');
    }
}
