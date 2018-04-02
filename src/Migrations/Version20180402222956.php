<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180402222956 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Location (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_level (location_id INT NOT NULL, level_id INT NOT NULL, INDEX IDX_ECB6893664D218E (location_id), INDEX IDX_ECB689365FB14BA7 (level_id), PRIMARY KEY(location_id, level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Level (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Room (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, level_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D2ADFEA564D218E (location_id), INDEX IDX_D2ADFEA55FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location_level ADD CONSTRAINT FK_ECB6893664D218E FOREIGN KEY (location_id) REFERENCES Location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_level ADD CONSTRAINT FK_ECB689365FB14BA7 FOREIGN KEY (level_id) REFERENCES Level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Room ADD CONSTRAINT FK_D2ADFEA564D218E FOREIGN KEY (location_id) REFERENCES Location (id)');
        $this->addSql('ALTER TABLE Room ADD CONSTRAINT FK_D2ADFEA55FB14BA7 FOREIGN KEY (level_id) REFERENCES Level (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE location_level DROP FOREIGN KEY FK_ECB6893664D218E');
        $this->addSql('ALTER TABLE Room DROP FOREIGN KEY FK_D2ADFEA564D218E');
        $this->addSql('ALTER TABLE location_level DROP FOREIGN KEY FK_ECB689365FB14BA7');
        $this->addSql('ALTER TABLE Room DROP FOREIGN KEY FK_D2ADFEA55FB14BA7');
        $this->addSql('DROP TABLE Location');
        $this->addSql('DROP TABLE location_level');
        $this->addSql('DROP TABLE Level');
        $this->addSql('DROP TABLE Room');
    }
}
