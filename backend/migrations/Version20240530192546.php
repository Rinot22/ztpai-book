<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530192546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_role_id_seq CASCADE');
        $this->addSql('ALTER TABLE role_user DROP CONSTRAINT fk_332ca4ddd60322ac');
        $this->addSql('ALTER TABLE role_user DROP CONSTRAINT fk_332ca4dda76ed395');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT user_role_pkey');
        $this->addSql('ALTER TABLE user_role ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_role RENAME COLUMN id TO user_id');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES security_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('ALTER TABLE user_role ADD PRIMARY KEY (user_id, role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE user_role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(role_id, user_id))');
        $this->addSql('CREATE INDEX idx_332ca4dda76ed395 ON role_user (user_id)');
        $this->addSql('CREATE INDEX idx_332ca4ddd60322ac ON role_user (role_id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT fk_332ca4ddd60322ac FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT fk_332ca4dda76ed395 FOREIGN KEY (user_id) REFERENCES security_user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3A76ED395');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3D60322AC');
        $this->addSql('DROP INDEX IDX_2DE8C6A3A76ED395');
        $this->addSql('DROP INDEX IDX_2DE8C6A3D60322AC');
        $this->addSql('DROP INDEX user_role_pkey');
        $this->addSql('ALTER TABLE user_role ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE user_role DROP user_id');
        $this->addSql('ALTER TABLE user_role DROP role_id');
        $this->addSql('ALTER TABLE user_role ADD PRIMARY KEY (id)');
    }
}
