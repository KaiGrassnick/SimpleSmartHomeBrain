<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180826094514 extends AbstractMigration
{

    /**
     * @param \Doctrine\DBAL\Schema\Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE LocationRoom (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, level_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E625B73264D218E (location_id), INDEX IDX_E625B7325FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Location (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_locationlevel (location_id INT NOT NULL, locationlevel_id INT NOT NULL, INDEX IDX_EDB0E24764D218E (location_id), INDEX IDX_EDB0E247C5BCB97E (locationlevel_id), PRIMARY KEY(location_id, locationlevel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE LocationLevel (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE DeviceType (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Device (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, lastSeen DATETIME NOT NULL, INDEX IDX_E83B3B8C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE DeviceValue (id INT AUTO_INCREMENT NOT NULL, device_id INT DEFAULT NULL, value JSON NOT NULL COMMENT \'(DC2Type:json_array)\', createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_8E365DC694A4C7D4 (device_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE LocationRoom ADD CONSTRAINT FK_E625B73264D218E FOREIGN KEY (location_id) REFERENCES Location (id)');
        $this->addSql('ALTER TABLE LocationRoom ADD CONSTRAINT FK_E625B7325FB14BA7 FOREIGN KEY (level_id) REFERENCES LocationLevel (id)');
        $this->addSql('ALTER TABLE location_locationlevel ADD CONSTRAINT FK_EDB0E24764D218E FOREIGN KEY (location_id) REFERENCES Location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_locationlevel ADD CONSTRAINT FK_EDB0E247C5BCB97E FOREIGN KEY (locationlevel_id) REFERENCES LocationLevel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Device ADD CONSTRAINT FK_E83B3B8C54C8C93 FOREIGN KEY (type_id) REFERENCES DeviceType (id)');
        $this->addSql('ALTER TABLE DeviceValue ADD CONSTRAINT FK_8E365DC694A4C7D4 FOREIGN KEY (device_id) REFERENCES Device (id)');
    }


    /**
     * @param \Doctrine\DBAL\Schema\Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE LocationRoom DROP FOREIGN KEY FK_E625B73264D218E');
        $this->addSql('ALTER TABLE location_locationlevel DROP FOREIGN KEY FK_EDB0E24764D218E');
        $this->addSql('ALTER TABLE LocationRoom DROP FOREIGN KEY FK_E625B7325FB14BA7');
        $this->addSql('ALTER TABLE location_locationlevel DROP FOREIGN KEY FK_EDB0E247C5BCB97E');
        $this->addSql('ALTER TABLE Device DROP FOREIGN KEY FK_E83B3B8C54C8C93');
        $this->addSql('ALTER TABLE DeviceValue DROP FOREIGN KEY FK_8E365DC694A4C7D4');
        $this->addSql('DROP TABLE LocationRoom');
        $this->addSql('DROP TABLE Location');
        $this->addSql('DROP TABLE location_locationlevel');
        $this->addSql('DROP TABLE LocationLevel');
        $this->addSql('DROP TABLE DeviceType');
        $this->addSql('DROP TABLE Device');
        $this->addSql('DROP TABLE DeviceValue');
    }
}
