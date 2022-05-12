<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512065724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference ADD point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP point1, DROP point2, DROP point3, DROP point4, DROP point5, DROP point6, DROP point7');
        $this->addSql('ALTER TABLE business_workshop ADD point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP point1, DROP point2, DROP point3, DROP point4, DROP point5, DROP point6, DROP point7');
        $this->addSql('ALTER TABLE private_retreat ADD point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP point1, DROP point2, DROP point3, DROP point4, DROP point5, DROP point6, DROP point7');
        $this->addSql('ALTER TABLE private_workshop ADD point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP point1, DROP point2, DROP point3, DROP point4, DROP point5, DROP point6, DROP point7');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference ADD point1 VARCHAR(255) NOT NULL, ADD point2 VARCHAR(255) NOT NULL, ADD point3 VARCHAR(255) NOT NULL, ADD point4 VARCHAR(255) DEFAULT NULL, ADD point5 VARCHAR(255) DEFAULT NULL, ADD point6 VARCHAR(255) DEFAULT NULL, ADD point7 VARCHAR(255) DEFAULT NULL, DROP point');
        $this->addSql('ALTER TABLE business_workshop ADD point1 VARCHAR(255) NOT NULL, ADD point2 VARCHAR(255) NOT NULL, ADD point3 VARCHAR(255) NOT NULL, ADD point4 VARCHAR(255) DEFAULT NULL, ADD point5 VARCHAR(255) DEFAULT NULL, ADD point6 VARCHAR(255) DEFAULT NULL, ADD point7 VARCHAR(255) DEFAULT NULL, DROP point');
        $this->addSql('ALTER TABLE private_retreat ADD point1 VARCHAR(255) NOT NULL, ADD point2 VARCHAR(255) NOT NULL, ADD point3 VARCHAR(255) NOT NULL, ADD point4 VARCHAR(255) DEFAULT NULL, ADD point5 VARCHAR(255) DEFAULT NULL, ADD point6 VARCHAR(255) DEFAULT NULL, ADD point7 VARCHAR(255) DEFAULT NULL, DROP point');
        $this->addSql('ALTER TABLE private_workshop ADD point1 VARCHAR(255) NOT NULL, ADD point2 VARCHAR(255) NOT NULL, ADD point3 VARCHAR(255) NOT NULL, ADD point4 VARCHAR(255) DEFAULT NULL, ADD point5 VARCHAR(255) DEFAULT NULL, ADD point6 VARCHAR(255) DEFAULT NULL, ADD point7 VARCHAR(255) DEFAULT NULL, DROP point');
    }
}
