<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230806042457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE axles (id INT AUTO_INCREMENT NOT NULL, resarchedata_id INT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, caracteristique VARCHAR(255) NOT NULL, INDEX IDX_5CB0ACB38C091ED3 (resarchedata_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resarchedata (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, modification_date DATETIME NOT NULL, trafic_statistique DOUBLE PRECISION NOT NULL, start_periode DATE NOT NULL, end_periode DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE axles ADD CONSTRAINT FK_5CB0ACB38C091ED3 FOREIGN KEY (resarchedata_id) REFERENCES resarchedata (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE axles DROP FOREIGN KEY FK_5CB0ACB38C091ED3');
        $this->addSql('DROP TABLE axles');
        $this->addSql('DROP TABLE resarchedata');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
