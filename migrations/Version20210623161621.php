<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623161621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE annonce ADD etat_id INT DEFAULT NULL, ADD action_id INT NOT NULL, DROP etat');
      //  $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        //$this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E59D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        //$this->addSql('CREATE INDEX IDX_F65593E5D5E86FF ON annonce (etat_id)');
       // $this->addSql('CREATE INDEX IDX_F65593E59D32F035 ON annonce (action_id)');
       // $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64923D6A298 FOREIGN KEY (civility_id) REFERENCES civility (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5D5E86FF');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E59D32F035');
        $this->addSql('DROP INDEX IDX_F65593E5D5E86FF ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E59D32F035 ON annonce');
        $this->addSql('ALTER TABLE annonce ADD etat TINYINT(1) NOT NULL, DROP etat_id, DROP action_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64923D6A298');
    }
}
