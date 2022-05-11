<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511094027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference CHANGE point4 point4 VARCHAR(255) DEFAULT NULL, CHANGE point5 point5 VARCHAR(255) DEFAULT NULL, CHANGE point6 point6 VARCHAR(255) DEFAULT NULL, CHANGE point7 point7 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE business_workshop CHANGE point4 point4 VARCHAR(255) DEFAULT NULL, CHANGE point5 point5 VARCHAR(255) DEFAULT NULL, CHANGE point6 point6 VARCHAR(255) DEFAULT NULL, CHANGE point7 point7 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE private_retreat CHANGE point4 point4 VARCHAR(255) DEFAULT NULL, CHANGE point5 point5 VARCHAR(255) DEFAULT NULL, CHANGE point6 point6 VARCHAR(255) DEFAULT NULL, CHANGE point7 point7 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE private_workshop CHANGE point4 point4 VARCHAR(255) DEFAULT NULL, CHANGE point5 point5 VARCHAR(255) DEFAULT NULL, CHANGE point6 point6 VARCHAR(255) DEFAULT NULL, CHANGE point7 point7 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference CHANGE point4 point4 VARCHAR(255) NOT NULL, CHANGE point5 point5 VARCHAR(255) NOT NULL, CHANGE point6 point6 VARCHAR(255) NOT NULL, CHANGE point7 point7 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE business_workshop CHANGE point4 point4 VARCHAR(255) NOT NULL, CHANGE point5 point5 VARCHAR(255) NOT NULL, CHANGE point6 point6 VARCHAR(255) NOT NULL, CHANGE point7 point7 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_retreat CHANGE point4 point4 VARCHAR(255) NOT NULL, CHANGE point5 point5 VARCHAR(255) NOT NULL, CHANGE point6 point6 VARCHAR(255) NOT NULL, CHANGE point7 point7 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_workshop CHANGE point4 point4 VARCHAR(255) NOT NULL, CHANGE point5 point5 VARCHAR(255) NOT NULL, CHANGE point6 point6 VARCHAR(255) NOT NULL, CHANGE point7 point7 VARCHAR(255) NOT NULL');
    }
}
