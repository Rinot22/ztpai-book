<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530202213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_user DROP CONSTRAINT fk_6276d6701ad5cdbf');
        $this->addSql('ALTER TABLE cart_user DROP CONSTRAINT fk_6276d670a76ed395');
        $this->addSql('DROP TABLE cart_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE cart_user (cart_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(cart_id, user_id))');
        $this->addSql('CREATE INDEX idx_6276d670a76ed395 ON cart_user (user_id)');
        $this->addSql('CREATE INDEX idx_6276d6701ad5cdbf ON cart_user (cart_id)');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT fk_6276d6701ad5cdbf FOREIGN KEY (cart_id) REFERENCES cart (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT fk_6276d670a76ed395 FOREIGN KEY (user_id) REFERENCES security_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
