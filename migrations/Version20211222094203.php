<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222094203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, profil VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE category_destination ADD CONSTRAINT FK_895D7CC112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_destination ADD CONSTRAINT FK_895D7CC1816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP INDEX IDX_8F7C2FC0A76ED395 ON pictures');
        $this->addSql('ALTER TABLE pictures ADD user INT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1A76ED395');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAA76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE category_destination DROP FOREIGN KEY FK_895D7CC112469DE2');
        $this->addSql('ALTER TABLE category_destination DROP FOREIGN KEY FK_895D7CC1816C6140');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC0816C6140');
        $this->addSql('ALTER TABLE pictures ADD user_id INT DEFAULT NULL, DROP user');
        $this->addSql('CREATE INDEX IDX_8F7C2FC0A76ED395 ON pictures (user_id)');
    }
}
