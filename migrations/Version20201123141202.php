<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201123141202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, user_sender INT NOT NULL, user_recever INT NOT NULL, text VARCHAR(5000) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, url VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_match (id INT AUTO_INCREMENT NOT NULL, user_one INT NOT NULL, user_two INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, message_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE settings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, dist_max INT NOT NULL, orientation_search INT NOT NULL, age_min INT NOT NULL, age_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexual_orientation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD phone VARCHAR(255) NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD age INT NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD job VARCHAR(255) NOT NULL, ADD bio VARCHAR(5000) NOT NULL, ADD sexual_orientation_id INT NOT NULL, ADD gps_location VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE profil_match');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE settings');
        $this->addSql('DROP TABLE sexual_orientation');
        $this->addSql('ALTER TABLE `user` DROP phone, DROP name, DROP age, DROP city, DROP job, DROP bio, DROP sexual_orientation_id, DROP gps_location');
    }
}
