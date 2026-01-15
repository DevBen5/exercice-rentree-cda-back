<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260115144850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE resource_access_user');
        $this->addSql('ALTER TABLE resource_access ADD shared_resources_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE resource_access ADD CONSTRAINT FK_CE95C1AE40940615 FOREIGN KEY (shared_resources_id) REFERENCES shared_resources (id)');
        $this->addSql('ALTER TABLE resource_access ADD CONSTRAINT FK_CE95C1AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CE95C1AE40940615 ON resource_access (shared_resources_id)');
        $this->addSql('CREATE INDEX IDX_CE95C1AEA76ED395 ON resource_access (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resource_access_user (resource_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7FF18E1DA76ED395 (user_id), INDEX IDX_7FF18E1DE7233450 (resource_access_id), PRIMARY KEY (resource_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE resource_access DROP FOREIGN KEY FK_CE95C1AE40940615');
        $this->addSql('ALTER TABLE resource_access DROP FOREIGN KEY FK_CE95C1AEA76ED395');
        $this->addSql('DROP INDEX UNIQ_CE95C1AE40940615 ON resource_access');
        $this->addSql('DROP INDEX IDX_CE95C1AEA76ED395 ON resource_access');
        $this->addSql('ALTER TABLE resource_access DROP shared_resources_id, DROP user_id');
    }
}
