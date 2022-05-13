<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512115107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference DROP title');
        $this->addSql('ALTER TABLE business_workshop DROP title');
        $this->addSql('ALTER TABLE private_retreat DROP title');
        $this->addSql('ALTER TABLE private_workshop DROP title');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE business_workshop ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_retreat ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_workshop ADD title VARCHAR(255) NOT NULL');
    }
}
