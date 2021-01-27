<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127082348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar ADD user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carousel CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE presentation CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE is_verified is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE walking CHANGE picture picture LONGTEXT DEFAULT NULL, CHANGE updated_at updated_at DATETIME NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar DROP user');
        $this->addSql('ALTER TABLE carousel CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE user CHANGE is_verified is_verified TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE walking CHANGE picture picture LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE description description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
