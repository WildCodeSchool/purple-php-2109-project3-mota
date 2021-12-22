<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217150045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_64C19C1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_destination (category_id INT NOT NULL, destination_id INT NOT NULL, INDEX IDX_895D7CC112469DE2 (category_id), INDEX IDX_895D7CC1816C6140 (destination_id), PRIMARY KEY(category_id, destination_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, photo LONGTEXT NOT NULL, images LONGTEXT DEFAULT NULL, abstract LONGTEXT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_3EC63EAAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, destination_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, url LONGTEXT NOT NULL, INDEX IDX_8F7C2FC0A76ED395 (user_id), INDEX IDX_8F7C2FC0816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE category_destination ADD CONSTRAINT FK_895D7CC112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_destination ADD CONSTRAINT FK_895D7CC1816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_destination DROP FOREIGN KEY FK_895D7CC112469DE2');
        $this->addSql('ALTER TABLE category_destination DROP FOREIGN KEY FK_895D7CC1816C6140');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC0816C6140');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_destination');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE pictures');
    }
}
