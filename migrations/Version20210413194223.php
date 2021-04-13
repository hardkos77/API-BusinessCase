<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210413194223 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, photos_id INT NOT NULL, url VARCHAR(255) NOT NULL, sort_order SMALLINT NOT NULL, UNIQUE INDEX UNIQ_14B78418F47645AE (url), INDEX IDX_14B78418301EC62 (photos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418301EC62 FOREIGN KEY (photos_id) REFERENCES advert (id)');
        $this->addSql('ALTER TABLE advert DROP photos');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(50) NOT NULL, ADD last_name VARCHAR(50) NOT NULL, ADD siret VARCHAR(14) NOT NULL, ADD phone VARCHAR(16) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE advert ADD photos VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP siret, DROP phone');
    }
}
