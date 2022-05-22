<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220522182410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_7B85DB61989D9B62 ON speaker');
        $this->addSql('ALTER TABLE speaker ADD status_fr VARCHAR(255) NOT NULL, ADD status_nl VARCHAR(255) NOT NULL, ADD status_en VARCHAR(255) NOT NULL, DROP slug, DROP status');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speaker ADD slug VARCHAR(255) NOT NULL, ADD status VARCHAR(255) NOT NULL, DROP status_fr, DROP status_nl, DROP status_en');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B85DB61989D9B62 ON speaker (slug)');
    }
}
