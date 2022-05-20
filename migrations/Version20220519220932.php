<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519220932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE speaker_business_conference (speaker_id INT NOT NULL, business_conference_id INT NOT NULL, INDEX IDX_92AA1099D04A0F27 (speaker_id), INDEX IDX_92AA109932604999 (business_conference_id), PRIMARY KEY(speaker_id, business_conference_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA1099D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA109932604999 FOREIGN KEY (business_conference_id) REFERENCES business_conference (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE business_conference_speaker');
        $this->addSql('DROP TABLE business_workshop_speaker');
        $this->addSql('DROP TABLE private_retreat_speaker');
        $this->addSql('DROP TABLE private_workshop_speaker');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_conference_speaker (business_conference_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_322D7AFF32604999 (business_conference_id), INDEX IDX_322D7AFFD04A0F27 (speaker_id), PRIMARY KEY(business_conference_id, speaker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE business_workshop_speaker (business_workshop_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_B41043315E183C14 (business_workshop_id), INDEX IDX_B4104331D04A0F27 (speaker_id), PRIMARY KEY(business_workshop_id, speaker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE private_retreat_speaker (private_retreat_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_50A34D27D8DCE6DA (private_retreat_id), INDEX IDX_50A34D27D04A0F27 (speaker_id), PRIMARY KEY(private_retreat_id, speaker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE private_workshop_speaker (private_workshop_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_5C31FE5FD1B0C449 (private_workshop_id), INDEX IDX_5C31FE5FD04A0F27 (speaker_id), PRIMARY KEY(private_workshop_id, speaker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE business_conference_speaker ADD CONSTRAINT FK_322D7AFF32604999 FOREIGN KEY (business_conference_id) REFERENCES business_conference (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE business_conference_speaker ADD CONSTRAINT FK_322D7AFFD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE business_workshop_speaker ADD CONSTRAINT FK_B41043315E183C14 FOREIGN KEY (business_workshop_id) REFERENCES business_workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE business_workshop_speaker ADD CONSTRAINT FK_B4104331D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE private_retreat_speaker ADD CONSTRAINT FK_50A34D27D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE private_retreat_speaker ADD CONSTRAINT FK_50A34D27D8DCE6DA FOREIGN KEY (private_retreat_id) REFERENCES private_retreat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE private_workshop_speaker ADD CONSTRAINT FK_5C31FE5FD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE private_workshop_speaker ADD CONSTRAINT FK_5C31FE5FD1B0C449 FOREIGN KEY (private_workshop_id) REFERENCES private_workshop (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE speaker_business_conference');
    }
}
