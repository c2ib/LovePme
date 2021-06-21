<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617102900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD title_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094FA9F87BD ON company (title_id)');
        $this->addSql('ALTER TABLE title ADD typetitle_id INT NOT NULL, ADD created DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE title ADD CONSTRAINT FK_2B36786B56F60935 FOREIGN KEY (typetitle_id) REFERENCES type_title (id)');
        $this->addSql('CREATE INDEX IDX_2B36786B56F60935 ON title (typetitle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA9F87BD');
        $this->addSql('DROP INDEX IDX_4FBF094FA9F87BD ON company');
        $this->addSql('ALTER TABLE company DROP title_id');
        $this->addSql('ALTER TABLE title DROP FOREIGN KEY FK_2B36786B56F60935');
        $this->addSql('DROP INDEX IDX_2B36786B56F60935 ON title');
        $this->addSql('ALTER TABLE title DROP typetitle_id, DROP created');
    }
}
