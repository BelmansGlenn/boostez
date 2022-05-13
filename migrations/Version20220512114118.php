<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512114118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference DROP targeted_audience');
        $this->addSql('ALTER TABLE business_workshop DROP targeted_audience');
        $this->addSql('ALTER TABLE private_retreat DROP targeted_audience');
        $this->addSql('ALTER TABLE private_workshop DROP targeted_audience');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_conference ADD targeted_audience VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE business_workshop ADD targeted_audience VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_retreat ADD targeted_audience VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_workshop ADD targeted_audience VARCHAR(255) NOT NULL');
    }
}
