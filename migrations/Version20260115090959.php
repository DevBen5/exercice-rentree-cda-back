<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260115090959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resource_access_user ADD CONSTRAINT FK_7FF18E1DE7233450 FOREIGN KEY (resource_access_id) REFERENCES resource_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resource_access_user ADD CONSTRAINT FK_7FF18E1DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_4D54BE2DE7233450 ON shared_resources');
        $this->addSql('ALTER TABLE shared_resources DROP resource_access_id, CHANGE metadata metadata VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resource_access_user DROP FOREIGN KEY FK_7FF18E1DE7233450');
        $this->addSql('ALTER TABLE resource_access_user DROP FOREIGN KEY FK_7FF18E1DA76ED395');
        $this->addSql('ALTER TABLE shared_resources ADD resource_access_id INT DEFAULT NULL, CHANGE metadata metadata JSON NOT NULL');
        $this->addSql('CREATE INDEX IDX_4D54BE2DE7233450 ON shared_resources (resource_access_id)');
    }
}
