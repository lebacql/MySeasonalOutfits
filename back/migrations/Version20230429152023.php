<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429152023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer VARCHAR(255) NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_user_answer (answer_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_7E81C13BAA334807 (answer_id), INDEX IDX_7E81C13BAAD3C5E3 (user_answer_id), PRIMARY KEY(answer_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer_user_answer ADD CONSTRAINT FK_7E81C13BAA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_user_answer ADD CONSTRAINT FK_7E81C13BAAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_user_answer DROP FOREIGN KEY FK_5C8B8E951E27F6BF');
        $this->addSql('ALTER TABLE question_user_answer DROP FOREIGN KEY FK_5C8B8E95AAD3C5E3');
        $this->addSql('DROP TABLE question_user_answer');
        $this->addSql('ALTER TABLE question DROP answer_a, DROP answer_b, DROP answer_c, DROP answer_d');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question_user_answer (question_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_5C8B8E951E27F6BF (question_id), INDEX IDX_5C8B8E95AAD3C5E3 (user_answer_id), PRIMARY KEY(question_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE question_user_answer ADD CONSTRAINT FK_5C8B8E951E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_user_answer ADD CONSTRAINT FK_5C8B8E95AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE answer_user_answer DROP FOREIGN KEY FK_7E81C13BAA334807');
        $this->addSql('ALTER TABLE answer_user_answer DROP FOREIGN KEY FK_7E81C13BAAD3C5E3');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE answer_user_answer');
        $this->addSql('ALTER TABLE question ADD answer_a VARCHAR(255) NOT NULL, ADD answer_b VARCHAR(255) NOT NULL, ADD answer_c VARCHAR(255) NOT NULL, ADD answer_d VARCHAR(255) DEFAULT NULL');
    }
}
