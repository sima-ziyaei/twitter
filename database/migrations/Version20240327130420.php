<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240327130420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tweets (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, replied_to_id INT DEFAULT NULL, body VARCHAR(140) NOT NULL, created_at DATE NOT NULL, INDEX IDX_AA3840257E3C61F9 (owner_id), INDEX IDX_AA3840254C29D4D4 (replied_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes (tweet_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_49CA4E7D1041E39B (tweet_id), INDEX IDX_49CA4E7DA76ED395 (user_id), PRIMARY KEY(tweet_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(200) NOT NULL, password VARCHAR(64) NOT NULL, date_of_birth DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tweets ADD CONSTRAINT FK_AA3840257E3C61F9 FOREIGN KEY (owner_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tweets ADD CONSTRAINT FK_AA3840254C29D4D4 FOREIGN KEY (replied_to_id) REFERENCES tweets (id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D1041E39B FOREIGN KEY (tweet_id) REFERENCES tweets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tweets DROP FOREIGN KEY FK_AA3840257E3C61F9');
        $this->addSql('ALTER TABLE tweets DROP FOREIGN KEY FK_AA3840254C29D4D4');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D1041E39B');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DA76ED395');
        $this->addSql('DROP TABLE tweets');
        $this->addSql('DROP TABLE likes');
        $this->addSql('DROP TABLE users');
    }
}
