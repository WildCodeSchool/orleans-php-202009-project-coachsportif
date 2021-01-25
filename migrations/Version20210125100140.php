<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125100140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE regulation (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE regulations');
        $this->addSql('ALTER TABLE home CHANGE picture picture VARCHAR(255) NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE opinion ADD page VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sport_adapte DROP picture');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD age INT DEFAULT NULL, ADD size INT DEFAULT NULL, ADD weight INT DEFAULT NULL, ADD fat_mass INT DEFAULT NULL, ADD body_water INT DEFAULT NULL, ADD muscle_mass INT DEFAULT NULL, ADD arm_circumference INT DEFAULT NULL, ADD waist_size INT DEFAULT NULL, ADD thigh_circumference INT DEFAULT NULL, ADD ruffier_dickston_test INT DEFAULT NULL, ADD three INT DEFAULT NULL, ADD pathology VARCHAR(255) DEFAULT NULL, ADD treatment VARCHAR(255) DEFAULT NULL, ADD prescription VARCHAR(255) DEFAULT NULL, ADD imc INT DEFAULT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE walking ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE regulations (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE regulation');
        $this->addSql('ALTER TABLE home CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE opinion DROP page');
        $this->addSql('ALTER TABLE sport_adapte ADD picture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP age, DROP size, DROP weight, DROP fat_mass, DROP body_water, DROP muscle_mass, DROP arm_circumference, DROP waist_size, DROP thigh_circumference, DROP ruffier_dickston_test, DROP three, DROP pathology, DROP treatment, DROP prescription, DROP imc, DROP is_verified');
        $this->addSql('ALTER TABLE walking DROP updated_at');
    }
}
