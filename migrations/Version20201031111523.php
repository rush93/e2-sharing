<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201031111523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, steam_id BIGINT NOT NULL, community_visibility_state INT NOT NULL, profile_state INT NOT NULL, profile_name VARCHAR(255) NOT NULL, last_log_off DATETIME NOT NULL, comment_permission INT NOT NULL, profile_url VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, persona_state INT NOT NULL, primary_clan_id BIGINT DEFAULT NULL, join_date DATETIME DEFAULT NULL, country_code VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
