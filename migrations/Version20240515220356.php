<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515220356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_category (book_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(book_id, category_id))');
        $this->addSql('CREATE INDEX IDX_1FB30F9816A2B381 ON book_category (book_id)');
        $this->addSql('CREATE INDEX IDX_1FB30F9812469DE2 ON book_category (category_id)');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9816A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE news ADD publication_date DATE NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT FK_1FB30F9816A2B381');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT FK_1FB30F9812469DE2');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('ALTER TABLE "user" ADD roles TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN "user".roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE news DROP publication_date');
    }
}
