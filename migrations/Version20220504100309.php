<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504100309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add cities_id to countries table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE countries ADD cities_id INT NOT NULL');
//        $this->addSql('ALTER TABLE countries ADD CONSTRAINT FK_5D66EBADCAC75398 FOREIGN KEY (cities_id) REFERENCES cities (id)');
        $this->addSql('CREATE INDEX IDX_5D66EBADCAC75398 ON countries (cities_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE countries DROP FOREIGN KEY FK_5D66EBADCAC75398');
//        $this->addSql('DROP INDEX IDX_5D66EBADCAC75398 ON countries');
        $this->addSql('ALTER TABLE countries DROP cities_id');
    }
}
