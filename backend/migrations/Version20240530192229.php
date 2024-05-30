<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530192229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE cart_book_id_seq CASCADE');
        $this->addSql('ALTER TABLE cart_book DROP CONSTRAINT cart_book_pkey');
        $this->addSql('ALTER TABLE cart_book DROP id');
        $this->addSql('ALTER TABLE cart_book ADD PRIMARY KEY (cart_id, book_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE cart_book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX cart_book_pkey');
        $this->addSql('ALTER TABLE cart_book ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE cart_book ADD PRIMARY KEY (id)');
    }
}
