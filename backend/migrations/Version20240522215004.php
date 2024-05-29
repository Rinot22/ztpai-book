<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522215004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_books (cart_id INT NOT NULL, book_id INT NOT NULL, PRIMARY KEY(cart_id, book_id))');
        $this->addSql('CREATE INDEX IDX_15F1479A1AD5CDBF ON cart_books (cart_id)');
        $this->addSql('CREATE INDEX IDX_15F1479A16A2B381 ON cart_books (book_id)');
        $this->addSql('ALTER TABLE cart_books ADD CONSTRAINT FK_15F1479A1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cart_books ADD CONSTRAINT FK_15F1479A16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cart ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE cart DROP user_id');
        $this->addSql('ALTER TABLE cart DROP book_id');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B79D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA388B79D86650F ON cart (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cart_books DROP CONSTRAINT FK_15F1479A1AD5CDBF');
        $this->addSql('ALTER TABLE cart_books DROP CONSTRAINT FK_15F1479A16A2B381');
        $this->addSql('DROP TABLE cart_books');
        $this->addSql('ALTER TABLE cart DROP CONSTRAINT FK_BA388B79D86650F');
        $this->addSql('DROP INDEX UNIQ_BA388B79D86650F');
        $this->addSql('ALTER TABLE cart ADD book_id INT NOT NULL');
        $this->addSql('ALTER TABLE cart RENAME COLUMN user_id_id TO user_id');
    }
}
