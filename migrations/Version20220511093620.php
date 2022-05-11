<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511093620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference CHANGE `order` in_order INT NOT NULL');
        $this->addSql('ALTER TABLE business_workshop CHANGE `order` in_order INT NOT NULL');
        $this->addSql('ALTER TABLE private_retreat CHANGE `order` in_order INT NOT NULL');
        $this->addSql('ALTER TABLE private_workshop CHANGE `order` in_order INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference CHANGE in_order `order` INT NOT NULL');
        $this->addSql('ALTER TABLE business_workshop CHANGE in_order `order` INT NOT NULL');
        $this->addSql('ALTER TABLE private_retreat CHANGE in_order `order` INT NOT NULL');
        $this->addSql('ALTER TABLE private_workshop CHANGE in_order `order` INT NOT NULL');
    }
}
