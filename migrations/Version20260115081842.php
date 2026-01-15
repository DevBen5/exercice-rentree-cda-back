<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260115081842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_resources (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, resource_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE resource_access (id INT AUTO_INCREMENT NOT NULL, access_type VARCHAR(255) NOT NULL, granted_at DATETIME NOT NULL, expires_at DATETIME NOT NULL, granted_by_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE resource_access_user (resource_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7FF18E1DE7233450 (resource_access_id), INDEX IDX_7FF18E1DA76ED395 (user_id), PRIMARY KEY (resource_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE resource_access_user ADD CONSTRAINT FK_7FF18E1DE7233450 FOREIGN KEY (resource_access_id) REFERENCES resource_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resource_access_user ADD CONSTRAINT FK_7FF18E1DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE event_ressources');
        $this->addSql('DROP TABLE ressource_access');
        $this->addSql('DROP TABLE ressource_access_user');
        $this->addSql('ALTER TABLE shared_resources ADD resource_access_id INT DEFAULT NULL, CHANGE ressource_type resource_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shared_resources ADD CONSTRAINT FK_4D54BE2DE7233450 FOREIGN KEY (resource_access_id) REFERENCES resource_access (id)');
        $this->addSql('CREATE INDEX IDX_4D54BE2DE7233450 ON shared_resources (resource_access_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_ressources (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, ressource_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ressource_access (id INT AUTO_INCREMENT NOT NULL, access_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, granted_at DATETIME NOT NULL, exprires_at DATETIME NOT NULL, ressource_id INT NOT NULL, granted_by_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ressource_access_user (ressource_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7235960C29A2EDBC (ressource_access_id), INDEX IDX_7235960CA76ED395 (user_id), PRIMARY KEY (ressource_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE resource_access_user DROP FOREIGN KEY FK_7FF18E1DE7233450');
        $this->addSql('ALTER TABLE resource_access_user DROP FOREIGN KEY FK_7FF18E1DA76ED395');
        $this->addSql('DROP TABLE event_resources');
        $this->addSql('DROP TABLE resource_access');
        $this->addSql('DROP TABLE resource_access_user');
        $this->addSql('ALTER TABLE shared_resources DROP FOREIGN KEY FK_4D54BE2DE7233450');
        $this->addSql('DROP INDEX IDX_4D54BE2DE7233450 ON shared_resources');
        $this->addSql('ALTER TABLE shared_resources DROP resource_access_id, CHANGE resource_type ressource_type VARCHAR(255) NOT NULL');
    }
}
