<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504102329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add companies_id to cities table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE cities ADD companies_id INT NOT NULL');
//        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16B6AE4741E FOREIGN KEY (companies_id) REFERENCES companies (id)');
        $this->addSql('CREATE INDEX IDX_D95DB16B6AE4741E ON cities (companies_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16B6AE4741E');
//        $this->addSql('DROP INDEX IDX_D95DB16B6AE4741E ON cities');
        $this->addSql('ALTER TABLE cities DROP companies_id');
    }
}
