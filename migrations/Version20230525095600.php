<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525095600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD id_us_id INT NOT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9F91FCAC2 FOREIGN KEY (id_us_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9F91FCAC2 ON projet (id_us_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9F91FCAC2');
        $this->addSql('DROP INDEX IDX_50159CA9F91FCAC2 ON projet');
        $this->addSql('ALTER TABLE projet DROP id_us_id');
    }
}
