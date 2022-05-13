<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512071126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speaker CHANGE conference_fr conference_fr LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE conference_nl conference_nl LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE conference_en conference_en LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speaker CHANGE conference_fr conference_fr LONGTEXT NOT NULL, CHANGE conference_nl conference_nl LONGTEXT NOT NULL, CHANGE conference_en conference_en LONGTEXT NOT NULL');
    }
}
