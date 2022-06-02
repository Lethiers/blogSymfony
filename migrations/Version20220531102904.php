<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531102904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, write_by_id INT NOT NULL, title VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATE NOT NULL, updated_at DATE DEFAULT NULL, INDEX IDX_23A0E66DE6B05D5 (write_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (article_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_53A4EDAA7294869C (article_id), INDEX IDX_53A4EDAA12469DE2 (category_id), PRIMARY KEY(article_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DE6B05D5 FOREIGN KEY (write_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA7294869C');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA12469DE2');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DE6B05D5');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `user`');
    }
}