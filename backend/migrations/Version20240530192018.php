<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530192018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE cart_user_id_seq CASCADE');
        $this->addSql('ALTER TABLE cart_user DROP CONSTRAINT cart_user_pkey');
        $this->addSql('ALTER TABLE cart_user ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cart_user RENAME COLUMN id TO cart_id');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT FK_6276D6701AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT FK_6276D670A76ED395 FOREIGN KEY (user_id) REFERENCES security_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6276D6701AD5CDBF ON cart_user (cart_id)');
        $this->addSql('CREATE INDEX IDX_6276D670A76ED395 ON cart_user (user_id)');
        $this->addSql('ALTER TABLE cart_user ADD PRIMARY KEY (cart_id, user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE cart_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE cart_user DROP CONSTRAINT FK_6276D6701AD5CDBF');
        $this->addSql('ALTER TABLE cart_user DROP CONSTRAINT FK_6276D670A76ED395');
        $this->addSql('DROP INDEX IDX_6276D6701AD5CDBF');
        $this->addSql('DROP INDEX IDX_6276D670A76ED395');
        $this->addSql('DROP INDEX cart_user_pkey');
        $this->addSql('ALTER TABLE cart_user ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE cart_user DROP cart_id');
        $this->addSql('ALTER TABLE cart_user DROP user_id');
        $this->addSql('ALTER TABLE cart_user ADD PRIMARY KEY (id)');
    }
}
