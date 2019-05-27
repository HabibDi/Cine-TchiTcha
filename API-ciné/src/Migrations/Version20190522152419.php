<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190522152419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE seance RENAME INDEX idx_187c5fca48721ab9 TO IDX_DF7DFD0E48721AB9');
        $this->addSql('ALTER TABLE seance RENAME INDEX idx_187c5fca3c1be780 TO IDX_DF7DFD0E3C1BE780');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE seance RENAME INDEX idx_df7dfd0e3c1be780 TO IDX_187C5FCA3C1BE780');
        $this->addSql('ALTER TABLE seance RENAME INDEX idx_df7dfd0e48721ab9 TO IDX_187C5FCA48721AB9');
    }
}
