<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517154616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD link VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE book_review ADD company VARCHAR(255) NOT NULL, ADD review VARCHAR(255) NOT NULL, ADD language VARCHAR(2) NOT NULL, DROP review_fr, DROP review_nl, DROP review_en');
        $this->addSql('ALTER TABLE conference_review ADD company VARCHAR(255) NOT NULL, ADD review VARCHAR(255) NOT NULL, ADD language VARCHAR(2) NOT NULL, DROP review_fr, DROP review_nl, DROP review_en');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP link');
        $this->addSql('ALTER TABLE book_review ADD review_fr VARCHAR(255) NOT NULL, ADD review_nl VARCHAR(255) NOT NULL, ADD review_en VARCHAR(255) NOT NULL, DROP company, DROP review, DROP language');
        $this->addSql('ALTER TABLE conference_review ADD review_fr VARCHAR(255) NOT NULL, ADD review_nl VARCHAR(255) NOT NULL, ADD review_en VARCHAR(255) NOT NULL, DROP company, DROP review, DROP language');
    }
}
