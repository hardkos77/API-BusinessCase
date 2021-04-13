<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405213722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, siret VARCHAR(14) NOT NULL, phone VARCHAR(16) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advert ADD garage_id INT NOT NULL, ADD model_id INT NOT NULL');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40BC4FFF555 ON advert (garage_id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B7975B7E7 ON advert (model_id)');
        $this->addSql('ALTER TABLE garage ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9F26610BA76ED395 ON garage (user_id)');
        $this->addSql('ALTER TABLE model ADD brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_D79572D944F5D008 ON model (brand_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BA76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40BC4FFF555');
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40B7975B7E7');
        $this->addSql('DROP INDEX IDX_54F1F40BC4FFF555 ON advert');
        $this->addSql('DROP INDEX IDX_54F1F40B7975B7E7 ON advert');
        $this->addSql('ALTER TABLE advert DROP garage_id, DROP model_id');
        $this->addSql('DROP INDEX IDX_9F26610BA76ED395 ON garage');
        $this->addSql('ALTER TABLE garage DROP user_id');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('DROP INDEX IDX_D79572D944F5D008 ON model');
        $this->addSql('ALTER TABLE model DROP brand_id');
    }
}
