<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726123455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_58DF0651F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_review (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, review VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, in_order INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_conference (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_51B63B63989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_workshop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_935F0C52989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference_review (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, review VARCHAR(255) NOT NULL, language VARCHAR(2) NOT NULL, in_order INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logo (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, in_order INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7E8585C8E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_coaching (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6D28D763989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_retreat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E7AD8461989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_workshop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, point LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', language VARCHAR(2) NOT NULL, in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3CF9DD69989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, status_fr VARCHAR(255) NOT NULL, status_nl VARCHAR(255) NOT NULL, status_en VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description_fr LONGTEXT NOT NULL, description_nl LONGTEXT NOT NULL, description_en LONGTEXT NOT NULL, language LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', in_order INT NOT NULL, is_visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_business_conference (speaker_id INT NOT NULL, business_conference_id INT NOT NULL, INDEX IDX_92AA1099D04A0F27 (speaker_id), INDEX IDX_92AA109932604999 (business_conference_id), PRIMARY KEY(speaker_id, business_conference_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_business_workshop (speaker_id INT NOT NULL, business_workshop_id INT NOT NULL, INDEX IDX_EC7EABC8D04A0F27 (speaker_id), INDEX IDX_EC7EABC85E183C14 (business_workshop_id), PRIMARY KEY(speaker_id, business_workshop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_private_retreat (speaker_id INT NOT NULL, private_retreat_id INT NOT NULL, INDEX IDX_49588F44D04A0F27 (speaker_id), INDEX IDX_49588F44D8DCE6DA (private_retreat_id), PRIMARY KEY(speaker_id, private_retreat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_private_workshop (speaker_id INT NOT NULL, private_workshop_id INT NOT NULL, INDEX IDX_7753FC25D04A0F27 (speaker_id), INDEX IDX_7753FC25D1B0C449 (private_workshop_id), PRIMARY KEY(speaker_id, private_workshop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker_private_coaching (speaker_id INT NOT NULL, private_coaching_id INT NOT NULL, INDEX IDX_2682F62FD04A0F27 (speaker_id), INDEX IDX_2682F62FD71C4B06 (private_coaching_id), PRIMARY KEY(speaker_id, private_coaching_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA1099D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_conference ADD CONSTRAINT FK_92AA109932604999 FOREIGN KEY (business_conference_id) REFERENCES business_conference (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_workshop ADD CONSTRAINT FK_EC7EABC8D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_business_workshop ADD CONSTRAINT FK_EC7EABC85E183C14 FOREIGN KEY (business_workshop_id) REFERENCES business_workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_retreat ADD CONSTRAINT FK_49588F44D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_retreat ADD CONSTRAINT FK_49588F44D8DCE6DA FOREIGN KEY (private_retreat_id) REFERENCES private_retreat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_workshop ADD CONSTRAINT FK_7753FC25D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_workshop ADD CONSTRAINT FK_7753FC25D1B0C449 FOREIGN KEY (private_workshop_id) REFERENCES private_workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_coaching ADD CONSTRAINT FK_2682F62FD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker_private_coaching ADD CONSTRAINT FK_2682F62FD71C4B06 FOREIGN KEY (private_coaching_id) REFERENCES private_coaching (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE speaker_business_conference DROP FOREIGN KEY FK_92AA109932604999');
        $this->addSql('ALTER TABLE speaker_business_workshop DROP FOREIGN KEY FK_EC7EABC85E183C14');
        $this->addSql('ALTER TABLE speaker_private_coaching DROP FOREIGN KEY FK_2682F62FD71C4B06');
        $this->addSql('ALTER TABLE speaker_private_retreat DROP FOREIGN KEY FK_49588F44D8DCE6DA');
        $this->addSql('ALTER TABLE speaker_private_workshop DROP FOREIGN KEY FK_7753FC25D1B0C449');
        $this->addSql('ALTER TABLE speaker_business_conference DROP FOREIGN KEY FK_92AA1099D04A0F27');
        $this->addSql('ALTER TABLE speaker_business_workshop DROP FOREIGN KEY FK_EC7EABC8D04A0F27');
        $this->addSql('ALTER TABLE speaker_private_retreat DROP FOREIGN KEY FK_49588F44D04A0F27');
        $this->addSql('ALTER TABLE speaker_private_workshop DROP FOREIGN KEY FK_7753FC25D04A0F27');
        $this->addSql('ALTER TABLE speaker_private_coaching DROP FOREIGN KEY FK_2682F62FD04A0F27');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_review');
        $this->addSql('DROP TABLE business_conference');
        $this->addSql('DROP TABLE business_workshop');
        $this->addSql('DROP TABLE conference_review');
        $this->addSql('DROP TABLE logo');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE private_coaching');
        $this->addSql('DROP TABLE private_retreat');
        $this->addSql('DROP TABLE private_workshop');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('DROP TABLE speaker_business_conference');
        $this->addSql('DROP TABLE speaker_business_workshop');
        $this->addSql('DROP TABLE speaker_private_retreat');
        $this->addSql('DROP TABLE speaker_private_workshop');
        $this->addSql('DROP TABLE speaker_private_coaching');
    }
}
