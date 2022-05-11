<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511081022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_conference (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, targeted_audience VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, point1 VARCHAR(255) NOT NULL, point2 VARCHAR(255) NOT NULL, point3 VARCHAR(255) NOT NULL, point4 VARCHAR(255) NOT NULL, point5 VARCHAR(255) NOT NULL, point6 VARCHAR(255) NOT NULL, point7 VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, `order` INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_51B63B63989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_workshop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, targeted_audience VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, point1 VARCHAR(255) NOT NULL, point2 VARCHAR(255) NOT NULL, point3 VARCHAR(255) NOT NULL, point4 VARCHAR(255) NOT NULL, point5 VARCHAR(255) NOT NULL, point6 VARCHAR(255) NOT NULL, point7 VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, `order` INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_935F0C52989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_retreat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, targeted_audience VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, point1 VARCHAR(255) NOT NULL, point2 VARCHAR(255) NOT NULL, point3 VARCHAR(255) NOT NULL, point4 VARCHAR(255) NOT NULL, point5 VARCHAR(255) NOT NULL, point6 VARCHAR(255) NOT NULL, point7 VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, `order` INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E7AD8461989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_workshop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, targeted_audience VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, point1 VARCHAR(255) NOT NULL, point2 VARCHAR(255) NOT NULL, point3 VARCHAR(255) NOT NULL, point4 VARCHAR(255) NOT NULL, point5 VARCHAR(255) NOT NULL, point6 VARCHAR(255) NOT NULL, point7 VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, `order` INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3CF9DD69989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE business_conference');
        $this->addSql('DROP TABLE business_workshop');
        $this->addSql('DROP TABLE private_retreat');
        $this->addSql('DROP TABLE private_workshop');
    }
}
