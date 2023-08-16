<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808085115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE axles DROP FOREIGN KEY FK_5CB0ACB38C091ED3');
        $this->addSql('CREATE TABLE resarche_data (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, modification_date DATETIME NOT NULL, trafic_statistique DOUBLE PRECISION NOT NULL, start_periode DATE NOT NULL, end_periode DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE resarchedata');
        $this->addSql('DROP INDEX IDX_5CB0ACB38C091ED3 ON axles');
        $this->addSql('ALTER TABLE axles DROP resarchedata_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resarchedata (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, creation_date DATETIME NOT NULL, modification_date DATETIME NOT NULL, trafic_statistique DOUBLE PRECISION NOT NULL, start_periode DATE NOT NULL, end_periode DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE resarche_data');
        $this->addSql('ALTER TABLE axles ADD resarchedata_id INT NOT NULL');
        $this->addSql('ALTER TABLE axles ADD CONSTRAINT FK_5CB0ACB38C091ED3 FOREIGN KEY (resarchedata_id) REFERENCES resarchedata (id)');
        $this->addSql('CREATE INDEX IDX_5CB0ACB38C091ED3 ON axles (resarchedata_id)');
    }
}
