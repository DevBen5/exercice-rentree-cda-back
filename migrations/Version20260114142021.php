<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260114142021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ressource_access_user (ressource_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7235960C29A2EDBC (ressource_access_id), INDEX IDX_7235960CA76ED395 (user_id), PRIMARY KEY (ressource_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ressource_access_user ADD CONSTRAINT FK_7235960C29A2EDBC FOREIGN KEY (ressource_access_id) REFERENCES ressource_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_access_user ADD CONSTRAINT FK_7235960CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_access DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ressource_access_user DROP FOREIGN KEY FK_7235960C29A2EDBC');
        $this->addSql('ALTER TABLE ressource_access_user DROP FOREIGN KEY FK_7235960CA76ED395');
        $this->addSql('DROP TABLE ressource_access_user');
        $this->addSql('ALTER TABLE ressource_access ADD user_id INT NOT NULL');
    }
}
