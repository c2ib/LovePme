<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618212705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD:migrations/Version20210618212705.php
        $this->addSql('ALTER TABLE registre_titre DROP actionnaire_id');
=======
       // $this->addSql('ALTER TABLE company ADD city VARCHAR(50) NOT NULL');
>>>>>>> 5bb005555c74dfbed583bc7762ecd99d32228700:migrations/Version20210615112226.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registre_titre ADD actionnaire_id INT NOT NULL');
    }
}
