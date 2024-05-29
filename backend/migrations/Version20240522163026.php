<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522163026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book_author DROP CONSTRAINT fk_9478d34512469de2');
        $this->addSql('DROP INDEX idx_9478d34512469de2');
        $this->addSql('ALTER TABLE book_author DROP CONSTRAINT book_author_pkey');
        $this->addSql('ALTER TABLE book_author RENAME COLUMN category_id TO author_id');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9478D345F675F31B ON book_author (author_id)');
        $this->addSql('ALTER TABLE book_author ADD PRIMARY KEY (book_id, author_id)');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT fk_1fb30f98f675f31b');
        $this->addSql('DROP INDEX idx_1fb30f98f675f31b');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT book_category_pkey');
        $this->addSql('ALTER TABLE book_category RENAME COLUMN author_id TO category_id');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1FB30F9812469DE2 ON book_category (category_id)');
        $this->addSql('ALTER TABLE book_category ADD PRIMARY KEY (book_id, category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book_author DROP CONSTRAINT FK_9478D345F675F31B');
        $this->addSql('DROP INDEX IDX_9478D345F675F31B');
        $this->addSql('DROP INDEX book_author_pkey');
        $this->addSql('ALTER TABLE book_author RENAME COLUMN author_id TO category_id');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT fk_9478d34512469de2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9478d34512469de2 ON book_author (category_id)');
        $this->addSql('ALTER TABLE book_author ADD PRIMARY KEY (book_id, category_id)');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT FK_1FB30F9812469DE2');
        $this->addSql('DROP INDEX IDX_1FB30F9812469DE2');
        $this->addSql('DROP INDEX book_category_pkey');
        $this->addSql('ALTER TABLE book_category RENAME COLUMN category_id TO author_id');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT fk_1fb30f98f675f31b FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1fb30f98f675f31b ON book_category (author_id)');
        $this->addSql('ALTER TABLE book_category ADD PRIMARY KEY (book_id, author_id)');
    }
}
