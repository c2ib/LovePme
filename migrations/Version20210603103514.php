<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603103514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, INDEX IDX_47CC8C92FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_user (action_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FB726D479D32F035 (action_id), INDEX IDX_FB726D47A76ED395 (user_id), PRIMARY KEY(action_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, logo VARCHAR(255) NOT NULL, rcs VARCHAR(255) NOT NULL, siret INT NOT NULL, form_legal VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, valeur_nominal DOUBLE PRECISION DEFAULT NULL, code_valeur VARCHAR(50) DEFAULT NULL, siteweb VARCHAR(255) NOT NULL, mot_du_president LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, is_actived TINYINT(1) NOT NULL, modified DATETIME DEFAULT NULL, INDEX IDX_D8698A76979B1AD6 (company_id), INDEX IDX_D8698A76A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log_connect (id INT AUTO_INCREMENT NOT NULL, iduser_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_4C02C188786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordre (id INT AUTO_INCREMENT NOT NULL, id_societe_id INT NOT NULL, id_user_id INT NOT NULL, quantite INT NOT NULL, type VARCHAR(50) NOT NULL, etat TINYINT(1) NOT NULL, date_limite DATETIME DEFAULT NULL, INDEX IDX_737992C9597DF5D4 (id_societe_id), INDEX IDX_737992C979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92FCF77503 FOREIGN KEY (societe_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE action_user ADD CONSTRAINT FK_FB726D479D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_user ADD CONSTRAINT FK_FB726D47A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE log_connect ADD CONSTRAINT FK_4C02C188786A81FB FOREIGN KEY (iduser_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ordre ADD CONSTRAINT FK_737992C9597DF5D4 FOREIGN KEY (id_societe_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE ordre ADD CONSTRAINT FK_737992C979F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_user DROP FOREIGN KEY FK_FB726D479D32F035');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92FCF77503');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76979B1AD6');
        $this->addSql('ALTER TABLE ordre DROP FOREIGN KEY FK_737992C9597DF5D4');
        $this->addSql('ALTER TABLE action_user DROP FOREIGN KEY FK_FB726D47A76ED395');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76A76ED395');
        $this->addSql('ALTER TABLE log_connect DROP FOREIGN KEY FK_4C02C188786A81FB');
        $this->addSql('ALTER TABLE ordre DROP FOREIGN KEY FK_737992C979F37AE5');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_user');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE log_connect');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE `user`');
    }
}
