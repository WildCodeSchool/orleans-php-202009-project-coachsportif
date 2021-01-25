<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122085324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar ADD title VARCHAR(255) NOT NULL, ADD start DATETIME NOT NULL, ADD end DATETIME NOT NULL, ADD description LONGTEXT NOT NULL, ADD background_color VARCHAR(7) NOT NULL, ADD text_color VARCHAR(7) NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME');
        $this->addSql('ALTER TABLE walking CHANGE updated_at updated_at DATETIME');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar DROP title, DROP start, DROP end, DROP description, DROP background_color, DROP text_color');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE walking CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
