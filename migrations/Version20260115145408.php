<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260115145408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resource_access ADD CONSTRAINT FK_CE95C1AE40940615 FOREIGN KEY (shared_resources_id) REFERENCES shared_resources (id)');
        $this->addSql('ALTER TABLE resource_access ADD CONSTRAINT FK_CE95C1AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resource_access DROP FOREIGN KEY FK_CE95C1AE40940615');
        $this->addSql('ALTER TABLE resource_access DROP FOREIGN KEY FK_CE95C1AEA76ED395');
    }
}
