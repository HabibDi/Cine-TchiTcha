<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190502171542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notation (id INT AUTO_INCREMENT NOT NULL, reservation_fk_id INT NOT NULL, film_fk_id INT NOT NULL, note INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_268BC95E608C977 (reservation_fk_id), INDEX IDX_268BC953C1BE780 (film_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE séance (id INT AUTO_INCREMENT NOT NULL, salle_fk_id INT NOT NULL, film_fk_id INT NOT NULL, date DATETIME NOT NULL, heure DATETIME NOT NULL, places_disponibles INT NOT NULL, INDEX IDX_187C5FCA48721AB9 (salle_fk_id), INDEX IDX_187C5FCA3C1BE780 (film_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_abo (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, synopsis LONGTEXT NOT NULL, durée INT NOT NULL, bande_annonce VARCHAR(255) DEFAULT NULL, date_de_sortie DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_langue (film_id INT NOT NULL, langue_id INT NOT NULL, INDEX IDX_F8A54884567F5183 (film_id), INDEX IDX_F8A548842AADBACD (langue_id), PRIMARY KEY(film_id, langue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_category (film_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_A4CBD6A8567F5183 (film_id), INDEX IDX_A4CBD6A812469DE2 (category_id), PRIMARY KEY(film_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, seance_fk_id INT NOT NULL, newsletter_abo_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, INDEX IDX_4DA239BA610A9C (seance_fk_id), INDEX IDX_4DA239D187F94F (newsletter_abo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC95E608C977 FOREIGN KEY (reservation_fk_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC953C1BE780 FOREIGN KEY (film_fk_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE séance ADD CONSTRAINT FK_187C5FCA48721AB9 FOREIGN KEY (salle_fk_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE séance ADD CONSTRAINT FK_187C5FCA3C1BE780 FOREIGN KEY (film_fk_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE film_langue ADD CONSTRAINT FK_F8A54884567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_langue ADD CONSTRAINT FK_F8A548842AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A8567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239BA610A9C FOREIGN KEY (seance_fk_id) REFERENCES séance (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239D187F94F FOREIGN KEY (newsletter_abo_id) REFERENCES newsletter_abo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A812469DE2');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239BA610A9C');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239D187F94F');
        $this->addSql('ALTER TABLE notation DROP FOREIGN KEY FK_268BC953C1BE780');
        $this->addSql('ALTER TABLE séance DROP FOREIGN KEY FK_187C5FCA3C1BE780');
        $this->addSql('ALTER TABLE film_langue DROP FOREIGN KEY FK_F8A54884567F5183');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A8567F5183');
        $this->addSql('ALTER TABLE film_langue DROP FOREIGN KEY FK_F8A548842AADBACD');
        $this->addSql('ALTER TABLE notation DROP FOREIGN KEY FK_268BC95E608C977');
        $this->addSql('DROP TABLE notation');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE séance');
        $this->addSql('DROP TABLE newsletter_abo');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_langue');
        $this->addSql('DROP TABLE film_category');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE reservations');
    }
}
