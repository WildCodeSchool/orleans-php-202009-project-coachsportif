<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118210247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64912C1842A');
        $this->addSql('DROP TABLE user_card');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D64912C1842A ON user');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) DEFAULT NULL, ADD lastname VARCHAR(255) DEFAULT NULL, ADD size INT DEFAULT NULL, ADD weight INT DEFAULT NULL, ADD fat_mass INT DEFAULT NULL, ADD body_water INT DEFAULT NULL, ADD muscle_mass INT DEFAULT NULL, ADD arm_circumference INT DEFAULT NULL, ADD waist_size INT DEFAULT NULL, ADD thigh_circumference INT DEFAULT NULL, ADD ruffier_dickston_test INT DEFAULT NULL, ADD three INT DEFAULT NULL, ADD pathology VARCHAR(255) DEFAULT NULL, ADD treatment VARCHAR(255) DEFAULT NULL, ADD prescription VARCHAR(255) DEFAULT NULL, ADD sexe VARCHAR(255) DEFAULT NULL, CHANGE user_card_id age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE walking CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_card (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, age INT DEFAULT NULL, size INT DEFAULT NULL, weight INT DEFAULT NULL, fat_mass INT DEFAULT NULL, body_water INT DEFAULT NULL, muscle_mass INT DEFAULT NULL, arm_circumference INT DEFAULT NULL, waist_size INT DEFAULT NULL, thigh_circumference INT DEFAULT NULL, ruffier_dickston_test INT DEFAULT NULL, three INT DEFAULT NULL, pathology VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, treatment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prescription VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sexe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE home CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD user_card_id INT DEFAULT NULL, DROP firstname, DROP lastname, DROP age, DROP size, DROP weight, DROP fat_mass, DROP body_water, DROP muscle_mass, DROP arm_circumference, DROP waist_size, DROP thigh_circumference, DROP ruffier_dickston_test, DROP three, DROP pathology, DROP treatment, DROP prescription, DROP sexe');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64912C1842A FOREIGN KEY (user_card_id) REFERENCES user_card (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64912C1842A ON user (user_card_id)');
        $this->addSql('ALTER TABLE walking CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
