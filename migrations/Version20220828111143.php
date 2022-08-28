<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220828111143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE speaker_business_coaching (speaker_id INT NOT NULL, business_coaching_id INT NOT NULL, INDEX IDX_BDAFA1C2D04A0F27 (speaker_id), INDEX IDX_BDAFA1C258B4B35B (business_coaching_id), PRIMARY KEY(speaker_id, business_coaching_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speaker_business_coaching ADD CONSTRAINT FK_BDAFA1C2D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_coaching ADD CONSTRAINT FK_BDAFA1C258B4B35B FOREIGN KEY (business_coaching_id) REFERENCES business_coaching (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE speaker_business_coaching');
    }
}
