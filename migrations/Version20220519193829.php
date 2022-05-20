<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519193829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE speaker_business_conference (speaker_id INT NOT NULL, business_conference_id INT NOT NULL, INDEX IDX_92AA1099D04A0F27 (speaker_id), INDEX IDX_92AA109932604999 (business_conference_id), PRIMARY KEY(speaker_id, business_conference_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_business_workshop (speaker_id INT NOT NULL, business_workshop_id INT NOT NULL, INDEX IDX_EC7EABC8D04A0F27 (speaker_id), INDEX IDX_EC7EABC85E183C14 (business_workshop_id), PRIMARY KEY(speaker_id, business_workshop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_private_retreat (speaker_id INT NOT NULL, private_retreat_id INT NOT NULL, INDEX IDX_49588F44D04A0F27 (speaker_id), INDEX IDX_49588F44D8DCE6DA (private_retreat_id), PRIMARY KEY(speaker_id, private_retreat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_private_workshop (speaker_id INT NOT NULL, private_workshop_id INT NOT NULL, INDEX IDX_7753FC25D04A0F27 (speaker_id), INDEX IDX_7753FC25D1B0C449 (private_workshop_id), PRIMARY KEY(speaker_id, private_workshop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA1099D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA109932604999 FOREIGN KEY (business_conference_id) REFERENCES business_conference (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_workshop ADD CONSTRAINT FK_EC7EABC8D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_workshop ADD CONSTRAINT FK_EC7EABC85E183C14 FOREIGN KEY (business_workshop_id) REFERENCES business_workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_retreat ADD CONSTRAINT FK_49588F44D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_retreat ADD CONSTRAINT FK_49588F44D8DCE6DA FOREIGN KEY (private_retreat_id) REFERENCES private_retreat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_workshop ADD CONSTRAINT FK_7753FC25D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_workshop ADD CONSTRAINT FK_7753FC25D1B0C449 FOREIGN KEY (private_workshop_id) REFERENCES private_workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker DROP conference_fr, DROP conference_nl, DROP conference_en');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE speaker_business_conference');
        $this->addSql('DROP TABLE speaker_business_workshop');
        $this->addSql('DROP TABLE speaker_private_retreat');
        $this->addSql('DROP TABLE speaker_private_workshop');
        $this->addSql('ALTER TABLE speaker ADD conference_fr LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD conference_nl LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD conference_en LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }
}
