<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524082648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_user_answer DROP FOREIGN KEY FK_7E81C13BAAD3C5E3');
        $this->addSql('ALTER TABLE answer_user_answer DROP FOREIGN KEY FK_7E81C13BAA334807');
        $this->addSql('DROP TABLE answer_user_answer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer_user_answer (answer_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_7E81C13BAA334807 (answer_id), INDEX IDX_7E81C13BAAD3C5E3 (user_answer_id), PRIMARY KEY(answer_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE answer_user_answer ADD CONSTRAINT FK_7E81C13BAAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_user_answer ADD CONSTRAINT FK_7E81C13BAA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
    }
}
