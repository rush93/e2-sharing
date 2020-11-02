<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201031133653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expression (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_private TINYINT(1) NOT NULL, code LONGTEXT NOT NULL, INDEX IDX_D83056017E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expression_include (id INT AUTO_INCREMENT NOT NULL, expression_id INT NOT NULL, name VARCHAR(255) NOT NULL, code LONGTEXT NOT NULL, INDEX IDX_35B562D0ADBB65A1 (expression_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expression ADD CONSTRAINT FK_D83056017E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expression_include ADD CONSTRAINT FK_35B562D0ADBB65A1 FOREIGN KEY (expression_id) REFERENCES expression (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expression_include DROP FOREIGN KEY FK_35B562D0ADBB65A1');
        $this->addSql('DROP TABLE expression');
        $this->addSql('DROP TABLE expression_include');
    }
}
