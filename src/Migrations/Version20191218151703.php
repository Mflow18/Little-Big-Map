<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218151703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iris (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, age_id INT NOT NULL, children_id INT NOT NULL, family_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649CC80CD12 (age_id), UNIQUE INDEX UNIQ_8D93D6493D3D2749 (children_id), INDEX IDX_8D93D649C35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_profession (user_id INT NOT NULL, profession_id INT NOT NULL, INDEX IDX_1DF4CB85A76ED395 (user_id), INDEX IDX_1DF4CB85FDEF8996 (profession_id), PRIMARY KEY(user_id, profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_category (user_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E6C1FDC1A76ED395 (user_id), INDEX IDX_E6C1FDC112469DE2 (category_id), PRIMARY KEY(user_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_iris (user_id INT NOT NULL, iris_id INT NOT NULL, INDEX IDX_37AD670AA76ED395 (user_id), INDEX IDX_37AD670AB1007CEE (iris_id), PRIMARY KEY(user_id, iris_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2E067F9312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE age (id INT AUTO_INCREMENT NOT NULL, age_range VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CC80CD12 FOREIGN KEY (age_id) REFERENCES age (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493D3D2749 FOREIGN KEY (children_id) REFERENCES children (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE user_profession ADD CONSTRAINT FK_1DF4CB85A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_profession ADD CONSTRAINT FK_1DF4CB85FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_category ADD CONSTRAINT FK_E6C1FDC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_category ADD CONSTRAINT FK_E6C1FDC112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_iris ADD CONSTRAINT FK_37AD670AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_iris ADD CONSTRAINT FK_37AD670AB1007CEE FOREIGN KEY (iris_id) REFERENCES iris (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_category DROP FOREIGN KEY FK_E6C1FDC112469DE2');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F9312469DE2');
        $this->addSql('ALTER TABLE user_iris DROP FOREIGN KEY FK_37AD670AB1007CEE');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C35E566A');
        $this->addSql('ALTER TABLE user_profession DROP FOREIGN KEY FK_1DF4CB85A76ED395');
        $this->addSql('ALTER TABLE user_category DROP FOREIGN KEY FK_E6C1FDC1A76ED395');
        $this->addSql('ALTER TABLE user_iris DROP FOREIGN KEY FK_37AD670AA76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493D3D2749');
        $this->addSql('ALTER TABLE user_profession DROP FOREIGN KEY FK_1DF4CB85FDEF8996');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CC80CD12');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE iris');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_profession');
        $this->addSql('DROP TABLE user_category');
        $this->addSql('DROP TABLE user_iris');
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE age');
    }
}
