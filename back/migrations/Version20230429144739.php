<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429144739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_32029601A76ED395');
        $this->addSql('DROP INDEX IDX_32029601A76ED395 ON outfit');
        $this->addSql('ALTER TABLE outfit DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outfit ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_32029601A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_32029601A76ED395 ON outfit (user_id)');
    }
}
