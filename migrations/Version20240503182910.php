<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503182910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, provider_id INT DEFAULT NULL, familly_id INT DEFAULT NULL, sub_familly_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, stock VARCHAR(255) DEFAULT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_BFDD3168A53A8AA (provider_id), INDEX IDX_BFDD31688D6893A3 (familly_id), INDEX IDX_BFDD3168A1A3006E (sub_familly_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familly (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instruments (id INT AUTO_INCREMENT NOT NULL, familly_id INT DEFAULT NULL, subfamilly_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_E350DE0B8D6893A3 (familly_id), INDEX IDX_E350DE0BD2F97400 (subfamilly_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE providers (id INT AUTO_INCREMENT NOT NULL, social_reason VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subfamilly (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A53A8AA FOREIGN KEY (provider_id) REFERENCES providers (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31688D6893A3 FOREIGN KEY (familly_id) REFERENCES familly (id)');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168A1A3006E FOREIGN KEY (sub_familly_id) REFERENCES subfamilly (id)');
        $this->addSql('ALTER TABLE instruments ADD CONSTRAINT FK_E350DE0B8D6893A3 FOREIGN KEY (familly_id) REFERENCES familly (id)');
        $this->addSql('ALTER TABLE instruments ADD CONSTRAINT FK_E350DE0BD2F97400 FOREIGN KEY (subfamilly_id) REFERENCES subfamilly (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A53A8AA');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31688D6893A3');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168A1A3006E');
        $this->addSql('ALTER TABLE instruments DROP FOREIGN KEY FK_E350DE0B8D6893A3');
        $this->addSql('ALTER TABLE instruments DROP FOREIGN KEY FK_E350DE0BD2F97400');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE familly');
        $this->addSql('DROP TABLE instruments');
        $this->addSql('DROP TABLE providers');
        $this->addSql('DROP TABLE subfamilly');
    }
}
