<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623213511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD typetransaction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F07D3C14 FOREIGN KEY (typetransaction_id) REFERENCES type_transaction (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5F07D3C14 ON annonce (typetransaction_id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F07D3C14');
        $this->addSql('DROP INDEX IDX_F65593E5F07D3C14 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP typetransaction_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
    }
}
